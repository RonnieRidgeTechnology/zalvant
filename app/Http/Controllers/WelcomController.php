<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thank;

class WelcomController extends Controller
{
    public function index(){
        $thank = thank::first();
        return view('web.welcome', compact('thank'));
    }
}
