<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
       public function index()
    {
        $cabinetDoors = CoreValue::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.Ourcores.index', compact('cabinetDoors'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'name_fr' => 'nullable|string|max:255',
            'desc_fr' => 'nullable|string',
            'name_de' => 'nullable|string|max:255',
            'desc_de' => 'nullable|string',
        ]);

        $cabinet = CoreValue::create($validated);

        return redirect()->back()->with('success', 'New Commitment created successfully.');
    }
    public function edit($id)
    {
        $cabinet = CoreValue::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $cabinet
        ]);
    }
    public function update(Request $request, $id)
    {
        $cabinet = CoreValue::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'name_fr' => 'nullable|string|max:255',
            'desc_fr' => 'nullable|string',
            'name_de' => 'nullable|string|max:255',
            'desc_de' => 'nullable|string',
    ]);


        $cabinet->update($validated);

        return redirect()->back()->with('success', 'About updated successfully.');
    }
    public function destroy($id)
    {
        $cabinetDoor = CoreValue::findOrFail($id);
        $cabinetDoor->delete();

        return redirect()->back()->with('success', 'About deleted successfully!');
    }
    public function changeStatus($id, $status)
    {
        $technology = CoreValue::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
