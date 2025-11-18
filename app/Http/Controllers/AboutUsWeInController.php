<?php

namespace App\Http\Controllers;

use App\Models\AboutUsWeIn;
use App\Models\AiDeal;
use Illuminate\Http\Request;

class AboutUsWeInController extends Controller
{
      public function index()
    {
        $cabinetDoors = AiDeal::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.Ai.who', compact('cabinetDoors'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable',
            // English
            'name_en' => 'nullable|string|max:255',
            'desc_en' => 'nullable',
            // French
            'name_fr' => 'nullable|string|max:255',
            'desc_fr' => 'nullable',
            // German
            'name_de' => 'nullable|string|max:255',
            'desc_de' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutwe'), $imageName);
            $validated['image'] = 'uploads/aboutwe/' . $imageName;
        }

        $cabinet = AiDeal::create($validated);

        return redirect()->back()->with('success', 'New About created successfully.');
    }
    public function edit($id)
    {
        $cabinet = AiDeal::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $cabinet
        ]);
    }
    public function update(Request $request, $id)
    {
        $cabinet = AiDeal::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable',
            // English
            'name_en' => 'nullable|string|max:255',
            'desc_en' => 'nullable',
            // French
            'name_fr' => 'nullable|string|max:255',
            'desc_fr' => 'nullable',
            // German
            'name_de' => 'nullable|string|max:255',
            'desc_de' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cabinet->image && file_exists(public_path($cabinet->image))) {
                unlink(public_path($cabinet->image));
            }

            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutwe'), $imageName);
            $validated['image'] = 'uploads/aboutwe/' . $imageName;
        }

        $cabinet->update($validated);

        return redirect()->back()->with('success', 'About updated successfully.');
    }
    public function destroy($id)
    {
        $cabinetDoor = AiDeal::findOrFail($id);

        if ($cabinetDoor->image && file_exists(public_path($cabinetDoor->image))) {
            unlink(public_path($cabinetDoor->image));
        }

        $cabinetDoor->delete();

        return redirect()->back()->with('success', 'About deleted successfully!');
    }
    public function changeStatus($id, $status)
    {
        $technology = AiDeal::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
