<?php

namespace App\Http\Controllers;

use App\Models\LandingFormLabel;
use Illuminate\Http\Request;

class LandingFormLabelController extends Controller
{
    public function edit()
    {
        $formLabels = LandingFormLabel::first();
        return view('Admin.landing.form-labels', compact('formLabels'));
    }

    public function updateOrCreate(Request $request)
    {
        LandingFormLabel::updateOrCreate(
            ['id' => 1],
            [
                // Dutch (default)
                'required_note' => $request->required_note,
                'name_label' => $request->name_label,
                'email_label' => $request->email_label,
                'phone_label' => $request->phone_label,
                'service_label' => $request->service_label,
                'message_label' => $request->message_label,
                'name_placeholder' => $request->name_placeholder,
                'email_placeholder' => $request->email_placeholder,
                'phone_placeholder' => $request->phone_placeholder,
                'service_placeholder' => $request->service_placeholder,
                'message_placeholder' => $request->message_placeholder,
                'submit_button' => $request->submit_button,
                'success_message' => $request->success_message,
                
                // English
                'required_note_en' => $request->required_note_en,
                'name_label_en' => $request->name_label_en,
                'email_label_en' => $request->email_label_en,
                'phone_label_en' => $request->phone_label_en,
                'service_label_en' => $request->service_label_en,
                'message_label_en' => $request->message_label_en,
                'name_placeholder_en' => $request->name_placeholder_en,
                'email_placeholder_en' => $request->email_placeholder_en,
                'phone_placeholder_en' => $request->phone_placeholder_en,
                'service_placeholder_en' => $request->service_placeholder_en,
                'message_placeholder_en' => $request->message_placeholder_en,
                'submit_button_en' => $request->submit_button_en,
                'success_message_en' => $request->success_message_en,
                
                // French
                'required_note_fr' => $request->required_note_fr,
                'name_label_fr' => $request->name_label_fr,
                'email_label_fr' => $request->email_label_fr,
                'phone_label_fr' => $request->phone_label_fr,
                'service_label_fr' => $request->service_label_fr,
                'message_label_fr' => $request->message_label_fr,
                'name_placeholder_fr' => $request->name_placeholder_fr,
                'email_placeholder_fr' => $request->email_placeholder_fr,
                'phone_placeholder_fr' => $request->phone_placeholder_fr,
                'service_placeholder_fr' => $request->service_placeholder_fr,
                'message_placeholder_fr' => $request->message_placeholder_fr,
                'submit_button_fr' => $request->submit_button_fr,
                'success_message_fr' => $request->success_message_fr,
                
                // German
                'required_note_de' => $request->required_note_de,
                'name_label_de' => $request->name_label_de,
                'email_label_de' => $request->email_label_de,
                'phone_label_de' => $request->phone_label_de,
                'service_label_de' => $request->service_label_de,
                'message_label_de' => $request->message_label_de,
                'name_placeholder_de' => $request->name_placeholder_de,
                'email_placeholder_de' => $request->email_placeholder_de,
                'phone_placeholder_de' => $request->phone_placeholder_de,
                'service_placeholder_de' => $request->service_placeholder_de,
                'message_placeholder_de' => $request->message_placeholder_de,
                'submit_button_de' => $request->submit_button_de,
                'success_message_de' => $request->success_message_de,
            ]
        );

        return redirect()->back()->with('success', 'Landing Form Labels Updated Successfully ✅');
    }
}
