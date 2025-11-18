<?php

namespace App\Http\Controllers;

use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function edit()
    {
        $termsAndCondition = TermsAndCondition::first(); // Fetch the first (or only) record
        return view('Admin.terms.edit', compact('termsAndCondition'));
    }

    public function updateOrCreate(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'title_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            'title_fr' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_fr' => 'nullable|string',
            'meta_keywords_fr' => 'nullable|string',
            'title_de' => 'nullable|string|max:255',
            'description_de' => 'nullable|string',
            'meta_title_de' => 'nullable|string|max:255',
            'meta_description_de' => 'nullable|string',
            'meta_keywords_de' => 'nullable|string',
        ]);

        // Find or create the PrivacyPolicy record
        $privacyPolicy = TermsAndCondition::firstOrNew([]);

        // Assign values from the request
        $privacyPolicy->fill($request->all());
        
        // Save the record
        $privacyPolicy->save();

        return redirect()->back()->with('success', 'Terms and conditions updated successfully!');
    }
}
