<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.testimonials.index', compact('testimonials'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'name_en' => 'nullable|string',
            'message_en' => 'nullable|string',
            'name_fr' => 'nullable|string',
            'message_fr' => 'nullable|string',
            'name_de' => 'nullable|string',
            'message_de' => 'nullable|string',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'name_en' => 'nullable|string',
            'message_en' => 'nullable|string',
            'name_fr' => 'nullable|string',
            'message_fr' => 'nullable|string',
            'name_de' => 'nullable|string',
            'message_de' => 'nullable|string',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
    public function changeStatus($id, $status)
    {
        $technology = Testimonial::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
