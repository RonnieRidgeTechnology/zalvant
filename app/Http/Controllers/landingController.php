<?php

namespace App\Http\Controllers;
use App\Models\action;
use App\Models\stat; 
use App\Models\banner;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function show(){
        $stat = stat::first();
        $actionData = action::first();
        $banner = banner::first();

        return view('web.landing', compact('stat','actionData','banner'));
    }
}
