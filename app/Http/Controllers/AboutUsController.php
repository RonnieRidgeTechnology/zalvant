<?php

namespace App\Http\Controllers;

use App\Models\AboutUpdate;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
   public function edit()
    {
        $aboutUpdate = AboutUpdate::first(); // Use AboutUpdate model
        return view('Admin.about.edit', compact('aboutUpdate'));
    }
      public function updateOrCreate(Request $request)
    {
        // Add validation rules for the new fields
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_desc' => 'nullable|string',
            'main_title' => 'nullable|string|max:255',
            'main_desc' => 'nullable|string',
            'journey_title' => 'nullable|string|max:255',
            'journey_desc' => 'nullable|string',
            'satisfied_clients' => 'nullable|integer',
            'finished_projects' => 'nullable|integer',
            'years_of_experience' => 'nullable|integer',
            'skilled_experts' => 'nullable|integer',
            'core_values_title' => 'nullable|string|max:255',
            'core_values_desc' => 'nullable|string',
            'why_choose_us_title' => 'nullable|string|max:255',
            'why_choose_us_desc' => 'nullable|string',
        ]);

        // Find or create the AboutUpdate record
        $aboutUpdate = AboutUpdate::first();

        if (!$aboutUpdate) {
            $aboutUpdate = new AboutUpdate();
        }

        // Assign all the values from the request to the model
        // Dutch (Default) fields
        $aboutUpdate->meta_title = $request->meta_title;
        $aboutUpdate->meta_keywords = $request->meta_keywords;
        $aboutUpdate->meta_desc = $request->meta_desc;
        $aboutUpdate->main_title = $request->main_title;
        $aboutUpdate->main_desc = $request->main_desc;
        $aboutUpdate->journey_title = $request->journey_title;
        $aboutUpdate->journey_desc = $request->journey_desc;
        $aboutUpdate->satisfied_clients = $request->satisfied_clients;
        $aboutUpdate->finished_projects = $request->finished_projects;
        $aboutUpdate->years_of_experience = $request->years_of_experience;
        $aboutUpdate->skilled_experts = $request->skilled_experts;
        $aboutUpdate->core_values_title = $request->core_values_title;
        $aboutUpdate->core_values_desc = $request->core_values_desc;
        $aboutUpdate->why_choose_us_title = $request->why_choose_us_title;
        $aboutUpdate->why_choose_us_desc = $request->why_choose_us_desc;

        // English translations
        $aboutUpdate->main_title_en = $request->main_title_en;
        $aboutUpdate->main_desc_en = $request->main_desc_en;
        $aboutUpdate->journey_title_en = $request->journey_title_en;
        $aboutUpdate->journey_desc_en = $request->journey_desc_en;
        $aboutUpdate->core_values_title_en = $request->core_values_title_en;
        $aboutUpdate->core_values_desc_en = $request->core_values_desc_en;
        $aboutUpdate->why_choose_us_title_en = $request->why_choose_us_title_en;
        $aboutUpdate->why_choose_us_desc_en = $request->why_choose_us_desc_en;
        $aboutUpdate->meta_title_en = $request->meta_title_en;
        $aboutUpdate->meta_keywords_en = $request->meta_keywords_en;
        $aboutUpdate->meta_desc_en = $request->meta_desc_en;

        // French translations
        $aboutUpdate->main_title_fr = $request->main_title_fr;
        $aboutUpdate->main_desc_fr = $request->main_desc_fr;
        $aboutUpdate->journey_title_fr = $request->journey_title_fr;
        $aboutUpdate->journey_desc_fr = $request->journey_desc_fr;
        $aboutUpdate->core_values_title_fr = $request->core_values_title_fr;
        $aboutUpdate->core_values_desc_fr = $request->core_values_desc_fr;
        $aboutUpdate->why_choose_us_title_fr = $request->why_choose_us_title_fr;
        $aboutUpdate->why_choose_us_desc_fr = $request->why_choose_us_desc_fr;
        $aboutUpdate->meta_title_fr = $request->meta_title_fr;
        $aboutUpdate->meta_keywords_fr = $request->meta_keywords_fr;
        $aboutUpdate->meta_desc_fr = $request->meta_desc_fr;

        // German translations
        $aboutUpdate->main_title_de = $request->main_title_de;
        $aboutUpdate->main_desc_de = $request->main_desc_de;
        $aboutUpdate->journey_title_de = $request->journey_title_de;
        $aboutUpdate->journey_desc_de = $request->journey_desc_de;
        $aboutUpdate->core_values_title_de = $request->core_values_title_de;
        $aboutUpdate->core_values_desc_de = $request->core_values_desc_de;
        $aboutUpdate->why_choose_us_title_de = $request->why_choose_us_title_de;
        $aboutUpdate->why_choose_us_desc_de = $request->why_choose_us_desc_de;
        $aboutUpdate->meta_title_de = $request->meta_title_de;
        $aboutUpdate->meta_keywords_de = $request->meta_keywords_de;
        $aboutUpdate->meta_desc_de = $request->meta_desc_de;

        // Save the updated or created AboutUpdate record
        $aboutUpdate->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'About Us section updated successfully!');
    }
}
