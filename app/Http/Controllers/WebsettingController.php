<?php

namespace App\Http\Controllers;

use App\Models\Websetting;
use Illuminate\Http\Request;

class WebsettingController extends Controller
{
      public function edit()
    {
        $websetting = Websetting::first();
        return view('Admin.websetting.edit', compact('websetting'));
    }

   public function updateOrCreate(Request $request)
{
    $request->validate([
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'favicon_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'address' => 'nullable|string',
        'linkedin' => 'nullable|url',
        'insta' => 'nullable|url',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'tiktok' => 'nullable|url',
        'footer_desc' => 'nullable|string',
        'copyright' => 'nullable|string',
        'available_languages' => 'required|string|min:2', // At least one language (2 chars minimum)
    ]);

    // Find the existing Websetting or create a new one
    $websetting = Websetting::first();

    if (!$websetting) {
        $websetting = new Websetting();
    }

    // Handle Logo Image Upload
if ($request->hasFile('logo')) {
    // Delete old logo if it exists
    if ($websetting->logo && file_exists(public_path('uploads/websetting/' . $websetting->logo))) {
        unlink(public_path('uploads/websetting/' . $websetting->logo)); // Delete the old logo
    }

    // Store new logo
    $logoName = time() . '_logo.' . $request->logo->extension();
    $request->logo->move(public_path('uploads/websetting'), $logoName); // Move the file to uploads/websetting directory
    $websetting->logo = 'uploads/websetting/' . $logoName; // Store the file path in the database
}
// Handle OG Image Upload
if ($request->hasFile('og_image')) {
    // Delete old og_image if it exists
    if ($websetting->og_image && file_exists(public_path($websetting->og_image))) {
        unlink(public_path($websetting->og_image));
    }

    // Store new OG image
    $ogImageName = time() . '_og.' . $request->og_image->extension();
    $request->og_image->move(public_path('uploads/websetting'), $ogImageName);
    $websetting->og_image = 'uploads/websetting/' . $ogImageName;
}


// Handle Favicon Image Upload
if ($request->hasFile('favicon_logo')) {
    // Delete old favicon if it exists
    if ($websetting->favicon_logo && file_exists(public_path('uploads/websetting/' . $websetting->favicon_logo))) {
        unlink(public_path('uploads/websetting/' . $websetting->favicon_logo)); // Delete the old favicon
    }

    // Store new favicon
    $faviconName = time() . '_favicon.' . $request->favicon_logo->extension();
    $request->favicon_logo->move(public_path('uploads/websetting'), $faviconName); // Move the file to uploads/websetting directory
    $websetting->favicon_logo = 'uploads/websetting/' . $faviconName; // Store the file path in the database
}


    // Update other fields
    $websetting->phone = $request->phone;
    $websetting->email = $request->email;
    $websetting->address = $request->address;
    $websetting->linkedin = $request->linkedin;
    $websetting->insta = $request->insta;
    $websetting->facebook = $request->facebook;
    $websetting->twitter = $request->twitter;
    $websetting->tiktok = $request->tiktok;
    $websetting->footer_desc = $request->footer_desc;
    $websetting->copyright = $request->copyright;
    
    // Update multilingual fields (English)
    $websetting->address_en = $request->address_en;
    $websetting->copyright_en = $request->copyright_en;
    $websetting->footer_desc_en = $request->footer_desc_en;
    
    // Update multilingual fields (French)
    $websetting->address_fr = $request->address_fr;
    $websetting->copyright_fr = $request->copyright_fr;
    $websetting->footer_desc_fr = $request->footer_desc_fr;
    
    // Update multilingual fields (German)
    $websetting->address_de = $request->address_de;
    $websetting->copyright_de = $request->copyright_de;
    $websetting->footer_desc_de = $request->footer_desc_de;
    // Ensure Dutch (nl) is always included as it's the default language
    $languages = $request->available_languages ?? 'nl,en,fr,de';
    $languagesArray = array_map('trim', explode(',', $languages));
    
    // Always include 'nl' if not present
    if (!in_array('nl', $languagesArray)) {
        array_unshift($languagesArray, 'nl');
    }
    
    $websetting->available_languages = implode(',', $languagesArray);

    // Save the Websetting
    $websetting->save();

    return redirect()->back()->with('success', 'Websetting updated successfully!');
}

}
