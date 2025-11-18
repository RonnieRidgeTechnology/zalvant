<?php

namespace App\Http\Controllers;

use App\Models\PortfolioUpdate;
use Illuminate\Http\Request;

class PortfolioUpdateController extends Controller
{
    public function edit()
    {
        $portfolioUpdate = PortfolioUpdate::first();
        return view('Admin.porfolio.edit', compact('portfolioUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'main_title' => 'nullable|string|max:255',
            'main_desc' => 'nullable|string',
            'section1_title' => 'nullable|string|max:255',
            'section1_desc' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            // English
            'main_title_en' => 'nullable|string|max:255',
            'main_desc_en' => 'nullable|string',
            'section1_title_en' => 'nullable|string|max:255',
            'section1_desc_en' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_en' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            // French
            'main_title_fr' => 'nullable|string|max:255',
            'main_desc_fr' => 'nullable|string',
            'section1_title_fr' => 'nullable|string|max:255',
            'section1_desc_fr' => 'nullable|string',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_desc_fr' => 'nullable|string',
            'meta_keywords_fr' => 'nullable|string',
            // German
            'main_title_de' => 'nullable|string|max:255',
            'main_desc_de' => 'nullable|string',
            'section1_title_de' => 'nullable|string|max:255',
            'section1_desc_de' => 'nullable|string',
            'meta_title_de' => 'nullable|string|max:255',
            'meta_desc_de' => 'nullable|string',
            'meta_keywords_de' => 'nullable|string',
        ]);

        $portfolio = PortfolioUpdate::first();

        if (!$portfolio) {
            $portfolio = new PortfolioUpdate();
        }

        // Dutch (default)
        $portfolio->main_title = $request->main_title;
        $portfolio->main_desc = $request->main_desc;
        $portfolio->section1_title = $request->section1_title;
        $portfolio->section1_desc = $request->section1_desc;
        $portfolio->meta_title = $request->meta_title;
        $portfolio->meta_desc = $request->meta_desc;
        $portfolio->meta_keywords = $request->meta_keywords;
        
        // English
        $portfolio->main_title_en = $request->main_title_en;
        $portfolio->main_desc_en = $request->main_desc_en;
        $portfolio->section1_title_en = $request->section1_title_en;
        $portfolio->section1_desc_en = $request->section1_desc_en;
        $portfolio->meta_title_en = $request->meta_title_en;
        $portfolio->meta_desc_en = $request->meta_desc_en;
        $portfolio->meta_keywords_en = $request->meta_keywords_en;
        
        // French
        $portfolio->main_title_fr = $request->main_title_fr;
        $portfolio->main_desc_fr = $request->main_desc_fr;
        $portfolio->section1_title_fr = $request->section1_title_fr;
        $portfolio->section1_desc_fr = $request->section1_desc_fr;
        $portfolio->meta_title_fr = $request->meta_title_fr;
        $portfolio->meta_desc_fr = $request->meta_desc_fr;
        $portfolio->meta_keywords_fr = $request->meta_keywords_fr;
        
        // German
        $portfolio->main_title_de = $request->main_title_de;
        $portfolio->main_desc_de = $request->main_desc_de;
        $portfolio->section1_title_de = $request->section1_title_de;
        $portfolio->section1_desc_de = $request->section1_desc_de;
        $portfolio->meta_title_de = $request->meta_title_de;
        $portfolio->meta_desc_de = $request->meta_desc_de;
        $portfolio->meta_keywords_de = $request->meta_keywords_de;

        $portfolio->save();

        return redirect()->back()->with('success', 'Portfolio Update saved successfully!');
    }
}
