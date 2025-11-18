<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        //Admin
        public function loginform()
        {
            return view('Admin.Authenticate.login');
        }
        public function login(Request $request)
        {
           
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
               
                $request->session()->regenerate();
                if (auth()->check() && auth()->user()->is_user === 0) {

                    // Flash welcome message
                    session()->flash('success', 'Welcome back, ' . ucfirst(auth()->user()->name) . '!');

                    return redirect()->route('dashboard');
                    
                } else {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Access denied. Admins only or users with type.',
                    ]);
                }
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login');
        }

        public function dashboard()
        {
            $blogscount = Blog::count();
            $testimonialscount = Testimonial::count();
            $technologyscount = Technology::count();
            $appointmentscount = Appointment::count();
            $servicecount = Service::count();
            $portfolio = Portfolio::count();
            $commenycount = Comment::count();
            $appointments = Appointment::latest()->limit(5)->get();

            return view('Admin.Authenticate.dashboard', compact('blogscount', 'testimonialscount', 'technologyscount', 'appointmentscount', 'servicecount','portfolio','commenycount','appointments'));
        }
}
