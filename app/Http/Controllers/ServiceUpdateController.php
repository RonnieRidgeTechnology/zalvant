<?php

namespace App\Http\Controllers;

use App\Models\ServiceUpdate;
use Illuminate\Http\Request;

class ServiceUpdateController extends Controller
{
    public function edit()
    {
        $serviceUpdate = ServiceUpdate::first();
        return view('Admin.service.update', compact('serviceUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'main_title' => 'nullable|string|max:255',
            'main_desc' => 'nullable|string',
            'offer_title' => 'nullable|string|max:255',
            'offer_desc' => 'nullable|string',
            'technology_title' => 'nullable|string|max:255',
            'technology_desc' => 'nullable|string',
            'deal_ai_title' => 'nullable|string|max:255',
            'deal_ai_desc' => 'nullable|string',
            'any_question_title' => 'nullable|string|max:255',
            'any_question_desc' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_keyword' => 'nullable|string|max:255',
        ]);

        $service = ServiceUpdate::first();

        if (!$service) {
            $service = new ServiceUpdate();
        }

        // Dutch (Default) fields
        $service->main_title = $request->main_title;
        $service->main_desc = $request->main_desc;
        $service->offer_title = $request->offer_title;
        $service->offer_desc = $request->offer_desc;
        $service->technology_title = $request->technology_title;
        $service->technology_desc = $request->technology_desc;
        $service->deal_ai_title = $request->deal_ai_title;
        $service->deal_ai_desc = $request->deal_ai_desc;
        $service->any_question_title = $request->any_question_title;
        $service->any_question_desc = $request->any_question_desc;
        $service->meta_title = $request->meta_title;
        $service->meta_desc = $request->meta_desc;
        $service->meta_keyword = $request->meta_keyword;

        // English translations
        $service->main_title_en = $request->main_title_en;
        $service->main_desc_en = $request->main_desc_en;
        $service->offer_title_en = $request->offer_title_en;
        $service->offer_desc_en = $request->offer_desc_en;
        $service->technology_title_en = $request->technology_title_en;
        $service->technology_desc_en = $request->technology_desc_en;
        $service->deal_ai_title_en = $request->deal_ai_title_en;
        $service->deal_ai_desc_en = $request->deal_ai_desc_en;
        $service->any_question_title_en = $request->any_question_title_en;
        $service->any_question_desc_en = $request->any_question_desc_en;
        $service->meta_title_en = $request->meta_title_en;
        $service->meta_desc_en = $request->meta_desc_en;
        $service->meta_keyword_en = $request->meta_keyword_en;

        // French translations
        $service->main_title_fr = $request->main_title_fr;
        $service->main_desc_fr = $request->main_desc_fr;
        $service->offer_title_fr = $request->offer_title_fr;
        $service->offer_desc_fr = $request->offer_desc_fr;
        $service->technology_title_fr = $request->technology_title_fr;
        $service->technology_desc_fr = $request->technology_desc_fr;
        $service->deal_ai_title_fr = $request->deal_ai_title_fr;
        $service->deal_ai_desc_fr = $request->deal_ai_desc_fr;
        $service->any_question_title_fr = $request->any_question_title_fr;
        $service->any_question_desc_fr = $request->any_question_desc_fr;
        $service->meta_title_fr = $request->meta_title_fr;
        $service->meta_desc_fr = $request->meta_desc_fr;
        $service->meta_keyword_fr = $request->meta_keyword_fr;

        // German translations
        $service->main_title_de = $request->main_title_de;
        $service->main_desc_de = $request->main_desc_de;
        $service->offer_title_de = $request->offer_title_de;
        $service->offer_desc_de = $request->offer_desc_de;
        $service->technology_title_de = $request->technology_title_de;
        $service->technology_desc_de = $request->technology_desc_de;
        $service->deal_ai_title_de = $request->deal_ai_title_de;
        $service->deal_ai_desc_de = $request->deal_ai_desc_de;
        $service->any_question_title_de = $request->any_question_title_de;
        $service->any_question_desc_de = $request->any_question_desc_de;
        $service->meta_title_de = $request->meta_title_de;
        $service->meta_desc_de = $request->meta_desc_de;
        $service->meta_keyword_de = $request->meta_keyword_de;

        $service->save();

        return redirect()->back()->with('success', 'Service Update saved successfully!');
    }
}
