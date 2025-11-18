<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmation;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required',
            'company'    => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'message'    => 'nullable|string',
        ]);

        $contact = Contact::create($request->all());
        Mail::to(env('RECEIVER_EMAIL'))->send(new ContactReceived($contact));
        Mail::to($contact->email)->send(new ContactConfirmation($contact));
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }

    public function contactlist()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.contact.list', compact('contacts'));
    }
    public function  contactdelete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully!');
    }
    public function contactSearch(Request $request)
    {
        $search = $request->input('search');
        $contacts = Contact::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })->orderBy('created_at', 'desc')->paginate(10);

        // If it's an AJAX request, return only the table partial
        if ($request->ajax()) {
            return view('Admin.Contact.partials.table', compact('contacts'))->render();
        }

        // For normal page load (if needed)
        return view('Admin.Contact.list', compact('contacts'));
    }
}
