<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\action; 

class ActionController extends Controller
{
    public function index() 
    {
        $action = action::first(); 
        return view('Admin/landing/action-update', compact('action'));
    }

    // Save or Update Form Data
    public function store(Request $request)
    {
        $request->validate([
            'eyebrow' => 'required',
            'heading' => 'required',
            'sub_text' => 'required',
            'chip_one' => 'required',
            'chip_two' => 'required',
            'chip_three' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'footer_note' => 'required',
            // English
            'eyebrow_en' => 'nullable|string',
            'heading_en' => 'nullable|string',
            'sub_text_en' => 'nullable|string',
            'chip_one_en' => 'nullable|string',
            'chip_two_en' => 'nullable|string',
            'chip_three_en' => 'nullable|string',
            'footer_note_en' => 'nullable|string',
            // French
            'eyebrow_fr' => 'nullable|string',
            'heading_fr' => 'nullable|string',
            'sub_text_fr' => 'nullable|string',
            'chip_one_fr' => 'nullable|string',
            'chip_two_fr' => 'nullable|string',
            'chip_three_fr' => 'nullable|string',
            'footer_note_fr' => 'nullable|string',
            // German
            'eyebrow_de' => 'nullable|string',
            'heading_de' => 'nullable|string',
            'sub_text_de' => 'nullable|string',
            'chip_one_de' => 'nullable|string',
            'chip_two_de' => 'nullable|string',
            'chip_three_de' => 'nullable|string',
            'footer_note_de' => 'nullable|string',
        ]);

        // ✅ Always update the same one record (id = 1)
        action::updateOrCreate(
            ['id' => 1],
            [
                // Dutch (default)
                'eyebrow'    => $request->eyebrow,
                'heading'    => $request->heading,
                'sub_text'   => $request->sub_text,
                'chip_one'   => $request->chip_one,
                'chip_two'   => $request->chip_two,
                'chip_three' => $request->chip_three,
                'phone'      => $request->phone,
                'email'      => $request->email,
                'footer_note'=> $request->footer_note,
                // English
                'eyebrow_en'    => $request->eyebrow_en,
                'heading_en'    => $request->heading_en,
                'sub_text_en'   => $request->sub_text_en,
                'chip_one_en'   => $request->chip_one_en,
                'chip_two_en'   => $request->chip_two_en,
                'chip_three_en' => $request->chip_three_en,
                'footer_note_en'=> $request->footer_note_en,
                // French
                'eyebrow_fr'    => $request->eyebrow_fr,
                'heading_fr'    => $request->heading_fr,
                'sub_text_fr'   => $request->sub_text_fr,
                'chip_one_fr'   => $request->chip_one_fr,
                'chip_two_fr'   => $request->chip_two_fr,
                'chip_three_fr' => $request->chip_three_fr,
                'footer_note_fr'=> $request->footer_note_fr,
                // German
                'eyebrow_de'    => $request->eyebrow_de,
                'heading_de'    => $request->heading_de,
                'sub_text_de'   => $request->sub_text_de,
                'chip_one_de'   => $request->chip_one_de,
                'chip_two_de'   => $request->chip_two_de,
                'chip_three_de' => $request->chip_three_de,
                'footer_note_de'=> $request->footer_note_de,
            ]
        );

        return back()->with('success', 'Hero Action Section Updated Successfully ✅');
    }
}
