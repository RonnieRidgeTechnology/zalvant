<?php

namespace App\Http\Controllers;
use App\Models\thank;
use Illuminate\Http\Request;

class AdminWelcomeController extends Controller
{
    public function index(){
        $thank = thank::first();
        return view('Admin/thankyou/welcomePage',compact('thank'));
    }

    public function save(Request $request){
        thank::updateOrCreate(
            ['id' => 1],
            [
                // Dutch (default)
                'thank_title' => $request->thank_title,
                'thank_subtitle' => $request->thank_subtitle,
                'chip_1' => $request->chip_1,
                'chip_2' => $request->chip_2,
                'chip_3' => $request->chip_3,
                'button_text' => $request->button_text,
                // English
                'thank_title_en' => $request->thank_title_en,
                'thank_subtitle_en' => $request->thank_subtitle_en,
                'chip_1_en' => $request->chip_1_en,
                'chip_2_en' => $request->chip_2_en,
                'chip_3_en' => $request->chip_3_en,
                'button_text_en' => $request->button_text_en,
                // French
                'thank_title_fr' => $request->thank_title_fr,
                'thank_subtitle_fr' => $request->thank_subtitle_fr,
                'chip_1_fr' => $request->chip_1_fr,
                'chip_2_fr' => $request->chip_2_fr,
                'chip_3_fr' => $request->chip_3_fr,
                'button_text_fr' => $request->button_text_fr,
                // German
                'thank_title_de' => $request->thank_title_de,
                'thank_subtitle_de' => $request->thank_subtitle_de,
                'chip_1_de' => $request->chip_1_de,
                'chip_2_de' => $request->chip_2_de,
                'chip_3_de' => $request->chip_3_de,
                'button_text_de' => $request->button_text_de,
            ]
        );

        return redirect()->back()->with('success', 'Thank You Page Updated Successfully ✅');
    }
}
