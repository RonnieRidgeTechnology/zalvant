<?php

namespace App\Http\Controllers;

use App\Models\HomeUpdate;
use Illuminate\Http\Request;

class HomeUpdateController extends Controller
{
    public function edit()
    {
        $homeUpdate = HomeUpdate::first(); // Fetch the first (or only) record
        return view('Admin.home.edit', compact('homeUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        // Validation for all fields including multilingual
        $rules = [];
        $fields = [
            'main_title', 'main_desc', 'offer_title', 'offer_desc',
            'real_stories_title', 'real_stories_desc', 'ai_section_title', 'ai_section_desc',
            'technology_section_title', 'technology_section_desc',
            'generative_ai_excellence_title', 'generative_ai_excellence_desc',
            'portfolio_section_title', 'portfolio_section_desc',
            'faq_section_title', 'faq_section_desc',
            'any_question_title', 'any_question_desc',
            'meta_title', 'meta_desc', 'meta_keyword',
        ];

        // Build validation rules for each language
        foreach ($fields as $field) {
            $rules[$field] = 'nullable|string';
            $rules[$field . '_en'] = 'nullable|string';
            $rules[$field . '_fr'] = 'nullable|string';
            $rules[$field . '_de'] = 'nullable|string';
            
            if (str_contains($field, 'title') || str_contains($field, 'meta_title') || str_contains($field, 'meta_keyword')) {
                $rules[$field] = 'nullable|string|max:255';
                $rules[$field . '_en'] = 'nullable|string|max:255';
                $rules[$field . '_fr'] = 'nullable|string|max:255';
                $rules[$field . '_de'] = 'nullable|string|max:255';
            }
        }

        $request->validate($rules);

        // Find or create the HomeUpdate record
        $homeUpdate = HomeUpdate::firstOrNew([]);

        // Use fill to assign all fields
        $homeUpdate->fill($request->all());

        // Save data
        $homeUpdate->save();

        return redirect()->back()->with('success', 'Home page content updated successfully!');
    }
}
