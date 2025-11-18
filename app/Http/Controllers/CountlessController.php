<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stat; // Model import

class CountlessController extends Controller
{
    public function index(){
        $stat = stat::first(); // only one record
        return view('Admin.landing.Countless', compact('stat'));
    }

    public function save(Request $request)
    {
        stat::updateOrCreate(
            ['id' => 1], // always update single record
            [
                // Counts (non-translatable)
                'happy_clients' => $request->happy_clients,
                'tours_completed' => $request->tours_completed,
                'awards' => $request->awards,
                'experience_years' => $request->experience_years,
                
                // Dutch labels (default)
                'client_label' => $request->client_label,
                'completed_label' => $request->completed_label,
                'awards_label' => $request->awards_label,
                'experience_label' => $request->experience_label,
                
                // English labels
                'client_label_en' => $request->client_label_en,
                'completed_label_en' => $request->completed_label_en,
                'awards_label_en' => $request->awards_label_en,
                'experience_label_en' => $request->experience_label_en,
                
                // French labels
                'client_label_fr' => $request->client_label_fr,
                'completed_label_fr' => $request->completed_label_fr,
                'awards_label_fr' => $request->awards_label_fr,
                'experience_label_fr' => $request->experience_label_fr,
                
                // German labels
                'client_label_de' => $request->client_label_de,
                'completed_label_de' => $request->completed_label_de,
                'awards_label_de' => $request->awards_label_de,
                'experience_label_de' => $request->experience_label_de,
            ]
        );

        return redirect()->back()->with('success', 'Statistics Updated Successfully ✅');
    }
}

