<?php

namespace App\Http\Controllers;

use App\Models\BlogUpdate;
use Illuminate\Http\Request;

class BlogUpdateController extends Controller
{
    public function edit()
    {
        $blogUpdate = BlogUpdate::first(); // Use BlogUpdate model
        return view('Admin.blog.update', compact('blogUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_desc' => 'nullable|string',
            'main_title' => 'nullable|string|max:255',
            'main_desc' => 'nullable|string',
            // English
            'main_title_en' => 'nullable|string|max:255',
            'main_desc_en' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_en' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            // French
            'main_title_fr' => 'nullable|string|max:255',
            'main_desc_fr' => 'nullable|string',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_desc_fr' => 'nullable|string',
            'meta_keywords_fr' => 'nullable|string',
            // German
            'main_title_de' => 'nullable|string|max:255',
            'main_desc_de' => 'nullable|string',
            'meta_title_de' => 'nullable|string|max:255',
            'meta_desc_de' => 'nullable|string',
            'meta_keywords_de' => 'nullable|string',
        ]);
        $blogUpdate = BlogUpdate::first();

        if (!$blogUpdate) {
            $blogUpdate = new BlogUpdate();
        }

        // Dutch (default)
        $blogUpdate->meta_title = $request->meta_title;
        $blogUpdate->meta_keywords = $request->meta_keywords;
        $blogUpdate->meta_desc = $request->meta_desc;
        $blogUpdate->main_title = $request->main_title;
        $blogUpdate->main_desc = $request->main_desc;

        // English
        $blogUpdate->main_title_en = $request->main_title_en;
        $blogUpdate->main_desc_en = $request->main_desc_en;
        $blogUpdate->meta_title_en = $request->meta_title_en;
        $blogUpdate->meta_desc_en = $request->meta_desc_en;
        $blogUpdate->meta_keywords_en = $request->meta_keywords_en;

        // French
        $blogUpdate->main_title_fr = $request->main_title_fr;
        $blogUpdate->main_desc_fr = $request->main_desc_fr;
        $blogUpdate->meta_title_fr = $request->meta_title_fr;
        $blogUpdate->meta_desc_fr = $request->meta_desc_fr;
        $blogUpdate->meta_keywords_fr = $request->meta_keywords_fr;

        // German
        $blogUpdate->main_title_de = $request->main_title_de;
        $blogUpdate->main_desc_de = $request->main_desc_de;
        $blogUpdate->meta_title_de = $request->meta_title_de;
        $blogUpdate->meta_desc_de = $request->meta_desc_de;
        $blogUpdate->meta_keywords_de = $request->meta_keywords_de;

        $blogUpdate->save();
        return redirect()->back()->with('success', 'Blog section updated successfully!');
    }
}
