<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('Admin.Authenticate.profille', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'profile' => ['nullable', 'image', 'max:10024'], // Max 10MB
        ]);

        $data = $request->only(['name', 'email']);

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Create the directory if it doesn't exist
            $uploadPath = public_path('uploads/adminprofile');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            // Delete old image if exists
            if (!empty($user->profile)) {
                $oldImagePath = $uploadPath . '/' . $user->profile;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image->move($uploadPath, $imageName);
            $data['profile'] = $imageName;
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Password updated successfully');
    }
}
