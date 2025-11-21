<?php

namespace App\Http\Controllers;

use App\Models\LandingType;
use App\Models\Service;
use App\Models\ServiceTechnology;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('serviceTechnologies.technology')->paginate(10);
        $technologies = Technology::all();
        $types = LandingType::all();
        return view('Admin.service.index', compact('services', 'technologies', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Hero Section
            'hero_title' => 'required|string',
            'hero_description' => 'required|string',
            'hero_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'type' => 'required',
            'landing_type_id' => 'nullable|integer',


            // Technology Section
            'name' => 'required|string',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif',

            'title1' => 'required|string',
            'description1' => 'required|string',
            'order_by' => 'nullable|integer',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif',

            // Content Section 2
            'title2' => 'required|string',
            'description2' => 'required|string',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif',
            'portfolio_description'=> 'nullable|string',
            'portfolio_title'=> 'nullable|string',

            // SEO Information
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'technologies' => 'required|string',
        ]);

        // Handle hero image upload
        $heroImageName = null;
        if ($request->hasFile('hero_image')) {
            $heroImageName = time() . '_hero.' . $request->hero_image->extension();
            $request->hero_image->move(public_path('images/services'), $heroImageName);
        }

        // Handle icon upload
        $iconName = null;
        if ($request->hasFile('icon')) {
            $iconName = time() . '_icon.' . $request->icon->extension();
            $request->icon->move(public_path('images/services'), $iconName);
        }

        // Handle hover icon upload
        // $hoverIconName = null;
        // if ($request->hasFile('hover_icon')) {
        //     $hoverIconName = time() . '_hover_icon.' . $request->hover_icon->extension();
        //     $request->hover_icon->move(public_path('images/services'), $hoverIconName);
        // }

        // Handle content section images
        $image1Name = null;
        if ($request->hasFile('image1')) {
            $image1Name = time() . '_content1.' . $request->image1->extension();
            $request->image1->move(public_path('images/services'), $image1Name);
        }

        $image2Name = null;
        if ($request->hasFile('image2')) {
            $image2Name = time() . '_content2.' . $request->image2->extension();
            $request->image2->move(public_path('images/services'), $image2Name);
        }

        // Create slug
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $counter = 1;

        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $service = Service::create([
            // Dutch (Default) fields
            'hero_title' => $request->hero_title,
            'hero_description' => $request->hero_description,
            'hero_image' => 'images/services/' . $heroImageName,
            'name' => $request->name,
            'description' => $request->description,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'order_by' => $request->order_by,
            'image1' => 'images/services/' . $image1Name,
            'title2' => $request->title2,
            'description2' => $request->description2,
            'image2' => 'images/services/' . $image2Name,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'slug' => $slug,
            'icon' => 'images/services/' . $iconName,
            // 'type' => $request->type,
            'landing_type_id' => $request->landing_type_id,
            
            // English translations
            'hero_title_en' => $request->hero_title_en,
            'hero_description_en' => $request->hero_description_en,
            'name_en' => $request->name_en,
            'description_en' => $request->description_en,
            'title1_en' => $request->title1_en,
            'description1_en' => $request->description1_en,
            'title2_en' => $request->title2_en,
            'description2_en' => $request->description2_en,
            'portfolio_title_en' => $request->portfolio_title_en,
            'portfolio_description_en' => $request->portfolio_description_en,
            'meta_title_en' => $request->meta_title_en,
            'meta_description_en' => $request->meta_description_en,
            'meta_keywords_en' => $request->meta_keywords_en,
            
            // French translations
            'hero_title_fr' => $request->hero_title_fr,
            'hero_description_fr' => $request->hero_description_fr,
            'name_fr' => $request->name_fr,
            'description_fr' => $request->description_fr,
            'title1_fr' => $request->title1_fr,
            'description1_fr' => $request->description1_fr,
            'title2_fr' => $request->title2_fr,
            'description2_fr' => $request->description2_fr,
            'portfolio_title_fr' => $request->portfolio_title_fr,
            'portfolio_description_fr' => $request->portfolio_description_fr,
            'meta_title_fr' => $request->meta_title_fr,
            'meta_description_fr' => $request->meta_description_fr,
            'meta_keywords_fr' => $request->meta_keywords_fr,
            
            // German translations
            'hero_title_de' => $request->hero_title_de,
            'hero_description_de' => $request->hero_description_de,
            'name_de' => $request->name_de,
            'description_de' => $request->description_de,
            'title1_de' => $request->title1_de,
            'description1_de' => $request->description1_de,
            'title2_de' => $request->title2_de,
            'description2_de' => $request->description2_de,
            'portfolio_title_de' => $request->portfolio_title_de,
            'portfolio_description_de' => $request->portfolio_description_de,
            'meta_title_de' => $request->meta_title_de,
            'meta_description_de' => $request->meta_description_de,
            'meta_keywords_de' => $request->meta_keywords_de,
        ]);

        // Save technologies
        $technologies = json_decode($request->technologies, true);
        if (is_array($technologies)) {
            foreach ($technologies as $technologyId) {
                ServiceTechnology::create([
                    'service_id' => $service->id,
                    'technology_id' => $technologyId
                ]);
            }
        }

        return redirect()->back()->with('success', 'Service added successfully.');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'hero_title' => 'required|string',
            'hero_description' => 'required|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'title1' => 'required|string',
            'description1' => 'required|string',
            'order_by' => 'nullable|integer',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'portfolio_title' => 'nullable|string',
            'portfolio_description' => 'nullable|string',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'technologies' => 'required|string',
            // 'type' => 'required',
            'landing_type_id' => 'nullable|integer',
        ]);

        $service = Service::where('slug', $slug)->firstOrFail();

        // Update slug only if name has changed
        if ($request->name !== $service->name) {
            $newSlug = Str::slug($request->name);
            $originalSlug = $newSlug;
            $counter = 1;
            while (Service::where('slug', $newSlug)->where('id', '!=', $service->id)->exists()) {
                $newSlug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $service->slug = $newSlug;
        }

        // Hero image
        if ($request->hasFile('hero_image')) {
            if ($service->hero_image && file_exists(public_path($service->hero_image))) {
                unlink(public_path($service->hero_image));
            }
            $heroImageName = time() . '_hero.' . $request->hero_image->extension();
            $request->hero_image->move(public_path('images/services'), $heroImageName);
            $service->hero_image = 'images/services/' . $heroImageName;
        }

        // Icon
        if ($request->hasFile('icon')) {
            $iconName = time() . '_icon.' . $request->icon->extension();
            $request->icon->move(public_path('images/services'), $iconName);
            $service->icon = 'images/services/' . $iconName;
        }

        // Hover Icon
        // if ($request->hasFile('hover_icon')) {
        //     if ($service->hover_icon && file_exists(public_path($service->hover_icon))) {
        //         unlink(public_path($service->hover_icon));
        //     }
        //     $hoverIconName = time() . '_hover_icon.' . $request->hover_icon->extension();
        //     $request->hover_icon->move(public_path('images/services'), $hoverIconName);
        //     $service->hover_icon = 'images/services/' . $hoverIconName;
        // }

        // Image 1
        if ($request->hasFile('image1')) {
            if ($service->image1 && file_exists(public_path($service->image1))) {
                unlink(public_path($service->image1));
            }
            $image1Name = time() . '_content1.' . $request->image1->extension();
            $request->image1->move(public_path('images/services'), $image1Name);
            $service->image1 = 'images/services/' . $image1Name;
        }

        // Image 2
        if ($request->hasFile('image2')) {
            if ($service->image2 && file_exists(public_path($service->image2))) {
                unlink(public_path($service->image2));
            }
            $image2Name = time() . '_content2.' . $request->image2->extension();
            $request->image2->move(public_path('images/services'), $image2Name);
            $service->image2 = 'images/services/' . $image2Name;
        }

        // Update service
        $service->update([
            // Dutch (Default) fields
            'hero_title' => $request->hero_title,
            'hero_description' => $request->hero_description,
            'name' => $request->name,
            'description' => $request->description,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'order_by' => $request->order_by,
            'title2' => $request->title2,
            'description2' => $request->description2,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'slug' => $service->slug,
            'icon' => $service->icon,
            'hero_image' => $service->hero_image,
            'image1' => $service->image1,
            'image2' => $service->image2,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            // 'type' => $request->type,
            'landing_type_id' => $request->landing_type_id,
            
            // English translations
            'hero_title_en' => $request->hero_title_en,
            'hero_description_en' => $request->hero_description_en,
            'name_en' => $request->name_en,
            'description_en' => $request->description_en,
            'title1_en' => $request->title1_en,
            'description1_en' => $request->description1_en,
            'title2_en' => $request->title2_en,
            'description2_en' => $request->description2_en,
            'portfolio_title_en' => $request->portfolio_title_en,
            'portfolio_description_en' => $request->portfolio_description_en,
            'meta_title_en' => $request->meta_title_en,
            'meta_description_en' => $request->meta_description_en,
            'meta_keywords_en' => $request->meta_keywords_en,
            
            // French translations
            'hero_title_fr' => $request->hero_title_fr,
            'hero_description_fr' => $request->hero_description_fr,
            'name_fr' => $request->name_fr,
            'description_fr' => $request->description_fr,
            'title1_fr' => $request->title1_fr,
            'description1_fr' => $request->description1_fr,
            'title2_fr' => $request->title2_fr,
            'description2_fr' => $request->description2_fr,
            'portfolio_title_fr' => $request->portfolio_title_fr,
            'portfolio_description_fr' => $request->portfolio_description_fr,
            'meta_title_fr' => $request->meta_title_fr,
            'meta_description_fr' => $request->meta_description_fr,
            'meta_keywords_fr' => $request->meta_keywords_fr,
            
            // German translations
            'hero_title_de' => $request->hero_title_de,
            'hero_description_de' => $request->hero_description_de,
            'name_de' => $request->name_de,
            'description_de' => $request->description_de,
            'title1_de' => $request->title1_de,
            'description1_de' => $request->description1_de,
            'title2_de' => $request->title2_de,
            'description2_de' => $request->description2_de,
            'portfolio_title_de' => $request->portfolio_title_de,
            'portfolio_description_de' => $request->portfolio_description_de,
            'meta_title_de' => $request->meta_title_de,
            'meta_description_de' => $request->meta_description_de,
            'meta_keywords_de' => $request->meta_keywords_de,
        ]);

        // Update technologies
        // First, delete existing technologies
        ServiceTechnology::where('service_id', $service->id)->delete();

        // Then, add new technologies
        $technologies = json_decode($request->technologies, true);
        if (is_array($technologies)) {
            foreach ($technologies as $technologyId) {
                ServiceTechnology::create([
                    'service_id' => $service->id,
                    'technology_id' => $technologyId
                ]);
            }
        }

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    public function delete($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        // Delete related Portfolioservice records
        \App\Models\Portfolioservice::where('service_id', $service->id)->delete();

        // Delete related Blog records
        // \App\Models\Blog::where('service_id', $service->id)->delete();

        // Delete hero image
        if ($service->hero_image && file_exists(public_path($service->hero_image))) {
            unlink(public_path($service->hero_image));
        }

        // Delete content section images
        if ($service->image1 && file_exists(public_path($service->image1))) {
            unlink(public_path($service->image1));
        }

        if ($service->image2 && file_exists(public_path($service->image2))) {
            unlink(public_path($service->image2));
        }

        // Delete icon image
        if ($service->icon && file_exists(public_path($service->icon))) {
            unlink(public_path($service->icon));
        }

        // Delete hover icon image
        // if ($service->hover_icon && file_exists(public_path($service->hover_icon))) {
        //     unlink(public_path($service->hover_icon));
        // }

        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
        public function changeStatus($id, $status)
    {
        $technology = Service::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}
