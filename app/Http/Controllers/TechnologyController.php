<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $cabinetDoors = Technology::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.Technology.index', compact('cabinetDoors'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/technology'), $imageName);
            $validated['image'] = 'uploads/technology/' . $imageName;
        }

        $cabinet = Technology::create($validated);

        return redirect()->back()->with('success', 'New Technology created successfully.');
    }
    public function edit($id)
    {
        $cabinet = Technology::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $cabinet
        ]);
    }
    public function update(Request $request, $id)
    {
        $cabinet = Technology::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cabinet->image && file_exists(public_path($cabinet->image))) {
                unlink(public_path($cabinet->image));
            }

            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/technology'), $imageName);
            $validated['image'] = 'uploads/technology/' . $imageName;
        }

        $cabinet->update($validated);

        return redirect()->back()->with('success', 'Technology updated successfully.');
    }
    public function destroy($id)
    {
        $cabinetDoor = Technology::findOrFail($id);

        if ($cabinetDoor->image && file_exists(public_path($cabinetDoor->image))) {
            unlink(public_path($cabinetDoor->image));
        }

        $cabinetDoor->delete();

        return redirect()->back()->with('success', 'Technology deleted successfully!');
    }
    public function changeStatus($id, $status)
    {
        $technology = Technology::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
