<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;

class BannerController extends Controller
{
    public function index(){
        $banner = banner::first();
        return view('Admin.landing.Banner', compact('banner'));
    }

    public function save(Request $request){
        banner::updateOrCreate(
            ['id' => 1],
            [
                // Dutch (default)
                'banner_head_title' => $request->banner_head_title,
                'banner_head_para' => $request->banner_head_para,
                'banner_footer_title' => $request->banner_footer_title,
                'banner_footer_para' => $request->banner_footer_para,
                // English
                'banner_head_title_en' => $request->banner_head_title_en,
                'banner_head_para_en' => $request->banner_head_para_en,
                'banner_footer_title_en' => $request->banner_footer_title_en,
                'banner_footer_para_en' => $request->banner_footer_para_en,
                // French
                'banner_head_title_fr' => $request->banner_head_title_fr,
                'banner_head_para_fr' => $request->banner_head_para_fr,
                'banner_footer_title_fr' => $request->banner_footer_title_fr,
                'banner_footer_para_fr' => $request->banner_footer_para_fr,
                // German
                'banner_head_title_de' => $request->banner_head_title_de,
                'banner_head_para_de' => $request->banner_head_para_de,
                'banner_footer_title_de' => $request->banner_footer_title_de,
                'banner_footer_para_de' => $request->banner_footer_para_de,
            ]
        );

        return redirect()->back()->with('success', 'Banner Updated Successfully ✅');
    }
}
