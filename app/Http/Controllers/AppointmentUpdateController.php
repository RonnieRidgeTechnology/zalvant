<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirmationMail;
use App\Mail\AppointmentReceivedMail;
use App\Models\Appointment;
use App\Models\AppointmentSetting;
use App\Models\AppointmentUpdate;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AppointmentUpdateController extends Controller
{
    public function edit()
    {
        $appointmentUpdate = AppointmentUpdate::first();
        return view('Admin.appointment.edit', compact('appointmentUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'main_title' => 'nullable|string',
            'main_desc' => 'nullable|string',
            'main_title_en' => 'nullable|string',
            'main_desc_en' => 'nullable|string',
            'main_title_fr' => 'nullable|string',
            'main_desc_fr' => 'nullable|string',
            'main_title_de' => 'nullable|string',
            'main_desc_de' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'meta_title' => 'nullable|string',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_title_en' => 'nullable|string',
            'meta_desc_en' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            'meta_title_fr' => 'nullable|string',
            'meta_desc_fr' => 'nullable|string',
            'meta_keywords_fr' => 'nullable|string',
            'meta_title_de' => 'nullable|string',
            'meta_desc_de' => 'nullable|string',
            'meta_keywords_de' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $appointment = AppointmentUpdate::first() ?? new AppointmentUpdate();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($appointment->image && file_exists(public_path($appointment->image))) {
                unlink(public_path($appointment->image));
            }

            $imageName = time() . '_appointment.' . $request->image->extension();
            $request->image->move(public_path('uploads/appointment'), $imageName);
            $appointment->image = 'uploads/appointment/' . $imageName;
        }

        // Update all fields using fill
        $appointment->fill($request->all());
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment Update saved successfully!');
    }
    //Appointment Setting
    public function index()
    {
        $settings = AppointmentSetting::all();
        return view('Admin.appointment.setting', compact('settings'));
    }
    public function updateStatus(Request $request)
    {
        try {
            $setting = AppointmentSetting::find($request->id);

            if ($setting) {
                $setting->status = $request->status ? 1 : 0;
                $setting->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Setting not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the status'
            ], 500);
        }
    }
    //Appointment
    public function store(Request $request)
    {
        // dd(env('RECEIVER_EMAIL'));
        $request->validate([
            'date' => 'required|date',
            'slot' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
            'services' => 'required|array'
        ]);

        try {
            DB::beginTransaction();

            // Create the appointment
            $appointment = Appointment::create([
                'date' => $request->date,
                'slot' => $request->slot,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]);

            // Attach services
            $serviceIds = Service::whereIn('name', $request->services)->pluck('id');
            $appointment->services()->attach($serviceIds);

            DB::commit();
            Mail::to(env('RECEIVER_EMAIL'))->send(new AppointmentReceivedMail($appointment));

            // Send email to user
            Mail::to($appointment->email)->send(new AppointmentConfirmationMail($appointment));
            return response()->json([
                'message' => 'Appointment created successfully',
                'appointment' => $appointment
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create appointment',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getSettings()
    {
        $settings = AppointmentSetting::all()->pluck('status', 'day');
        return response()->json($settings);
    }

    //Appointment calendar

    public function appointmentIndex()
    {
        return view('Admin.appointment.index');
    }
    public function getEvents()
    {
        try {
            $appointments = Appointment::with('services')->get();

            $events = $appointments->map(function ($appointment) {
                // Use only the date (no time) for event start to show it as an all-day event
                $startDate = $appointment->date;

                // Format date and day label for event title, e.g. "Monday, 2025-05-15 - John Doe"
                $dateObj = \Carbon\Carbon::parse($startDate);
                $dayName = $dateObj->format('l'); // Monday, Tuesday, etc.
                $formattedDate = $dateObj->format('Y-m-d');

                // Generate a random color here for each event
                $colors = ['#042954', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEEAD', '#D4A5A5', '#9B59B6', '#042954', '#2ECC71', '#F1C40F', '#E67E22', '#7F8C8D'];
                $randomColor = $colors[array_rand($colors)];

                return [
                    'title' => "{$dayName}, {$formattedDate} - {$appointment->name}",
                    'start' => $startDate,
                    'email' => $appointment->email,
                    'timeSlot' => $appointment->slot,
                    'services' => $appointment->services->pluck('name')->join(', '),
                    'message' => $appointment->message,
                    'backgroundColor' => $randomColor,
                    'borderColor' => $randomColor,
                    'allDay' => true, // Show as all day event so it appears on the whole date
                ];
            });

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch appointments',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function appointmentList()
    {
        $appointments = Appointment::with('services')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.appointment.list', compact('appointments'));
    }

    public function appointmentSearch(Request $request)
    {
        $query = Appointment::with('services');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $appointments = $query->orderByDesc('id')->paginate(10);

        return view('Admin.appointment.list', compact('appointments'));
    }
}
