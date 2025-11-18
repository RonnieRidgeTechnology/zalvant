<?php

namespace App\Http\Controllers;

use App\Models\ContactUpdate;
use Illuminate\Http\Request;

class ContactUpdateController extends Controller
{
    public function edit()
    {
        $contactUpdate = ContactUpdate::first();
        return view('Admin.contact.edit', compact('contactUpdate'));
    }
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $contact = ContactUpdate::first();

        if (!$contact) {
            $contact = new ContactUpdate();
        }

        // Dutch (Default) fields
        $contact->name = $request->name;
        $contact->desc = $request->desc;
        $contact->meta_title = $request->meta_title;
        $contact->meta_description = $request->meta_description;
        $contact->meta_keywords = $request->meta_keywords;

        // English translations
        $contact->name_en = $request->name_en;
        $contact->desc_en = $request->desc_en;
        $contact->meta_title_en = $request->meta_title_en;
        $contact->meta_description_en = $request->meta_description_en;
        $contact->meta_keywords_en = $request->meta_keywords_en;

        // French translations
        $contact->name_fr = $request->name_fr;
        $contact->desc_fr = $request->desc_fr;
        $contact->meta_title_fr = $request->meta_title_fr;
        $contact->meta_description_fr = $request->meta_description_fr;
        $contact->meta_keywords_fr = $request->meta_keywords_fr;

        // German translations
        $contact->name_de = $request->name_de;
        $contact->desc_de = $request->desc_de;
        $contact->meta_title_de = $request->meta_title_de;
        $contact->meta_description_de = $request->meta_description_de;
        $contact->meta_keywords_de = $request->meta_keywords_de;

        $contact->save();

        return redirect()->back()->with('success', 'Contact Update saved successfully!');
    }
}
