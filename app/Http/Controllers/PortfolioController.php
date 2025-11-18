<?php

namespace App\Http\Controllers;

use App\Models\CoreTechnology;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Portfolioservice;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\PortfolioImage;
use App\Models\Technology;
use App\Models\PortfolioTechnology;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('portfolioTechnologies.technology')->orderBy('home_page_order', 'asc')->paginate(10);
        $services = Service::with('servicePortfolios.technology')->get();
        $technologies = Technology::all();
        return view('Admin.porfolio.index', compact('portfolios', 'services', 'technologies'));
    }

public function store(Request $request)
{
    $request->validate([
        'main_title' => 'nullable|string',
        'main_description' => 'nullable|string',
        'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        'main_image_alt' => 'nullable|string|max:255',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        'banner_image_alt' => 'nullable|string|max:255',
        'meta_title' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'technologies' => 'required|string',
        'home_page_order' => 'nullable|string',
        // English
        'main_title_en' => 'nullable|string',
        'main_description_en' => 'nullable|string',
        'meta_title_en' => 'nullable|string',
        'meta_description_en' => 'nullable|string',
        'meta_keywords_en' => 'nullable|string',
        // French
        'main_title_fr' => 'nullable|string',
        'main_description_fr' => 'nullable|string',
        'meta_title_fr' => 'nullable|string',
        'meta_description_fr' => 'nullable|string',
        'meta_keywords_fr' => 'nullable|string',
        // German
        'main_title_de' => 'nullable|string',
        'main_description_de' => 'nullable|string',
        'meta_title_de' => 'nullable|string',
        'meta_description_de' => 'nullable|string',
        'meta_keywords_de' => 'nullable|string',
    ]);

    $portfolio = new Portfolio();
    // Dutch (default)
    $portfolio->main_title = $request->main_title;
    $portfolio->main_description = $request->main_description;
    $portfolio->meta_title = $request->meta_title;
    $portfolio->meta_description = $request->meta_description;
    $portfolio->meta_keywords = $request->meta_keywords;
    $portfolio->home_page_order = $request->home_page_order;
    $portfolio->slug = Str::slug($request->main_title);
    $portfolio->main_image_alt = $request->main_image_alt;
    $portfolio->banner_image_alt = $request->banner_image_alt;

    // English
    $portfolio->main_title_en = $request->main_title_en;
    $portfolio->main_description_en = $request->main_description_en;
    $portfolio->meta_title_en = $request->meta_title_en;
    $portfolio->meta_description_en = $request->meta_description_en;
    $portfolio->meta_keywords_en = $request->meta_keywords_en;
    
    // French
    $portfolio->main_title_fr = $request->main_title_fr;
    $portfolio->main_description_fr = $request->main_description_fr;
    $portfolio->meta_title_fr = $request->meta_title_fr;
    $portfolio->meta_description_fr = $request->meta_description_fr;
    $portfolio->meta_keywords_fr = $request->meta_keywords_fr;
    
    // German
    $portfolio->main_title_de = $request->main_title_de;
    $portfolio->main_description_de = $request->main_description_de;
    $portfolio->meta_title_de = $request->meta_title_de;
    $portfolio->meta_description_de = $request->meta_description_de;
    $portfolio->meta_keywords_de = $request->meta_keywords_de;

    // Handle main image
    if ($request->hasFile('main_image')) {
        $mainImage = $request->file('main_image');
        $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('uploads/portfolio'), $mainImageName);
        $portfolio->main_image = 'uploads/portfolio/' . $mainImageName;
    }

    // Handle banner image
    if ($request->hasFile('banner_image')) {
        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
        $bannerImage->move(public_path('uploads/portfolio'), $bannerImageName);
        $portfolio->banner_image = 'uploads/portfolio/' . $bannerImageName;
    }

    $portfolio->save();

    // Handle technologies
    if ($request->has('technologies')) {
        $technologies = json_decode($request->technologies, true);
        if (is_array($technologies)) {
            foreach ($technologies as $techId) {
                PortfolioTechnology::create([
                    'portfolio_id' => $portfolio->id,
                    'technology_id' => $techId
                ]);
            }
        }
    }

    // Handle services
    if ($request->has('services')) {
        // Delete existing services
        Portfolioservice::where('portfolio_id', $portfolio->id)->delete();

        // Convert string to array if needed
        $services = $request->services;
        if (is_string($services)) {
            $services = json_decode($services, true);
        }

        // Create new services
        if (is_array($services)) {
            foreach ($services as $serviceId) {
                Portfolioservice::create([
                    'portfolio_id' => $portfolio->id,
                    'service_id' => $serviceId
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Portfolio created successfully.');
}


    public function delete($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();

        if (!$portfolio) {
            return redirect()->back()->with('error', 'Portfolio not found.');
        }

        Portfolioservice::where('portfolio_id', $portfolio->id)->delete();

        if ($portfolio->main_image && file_exists(public_path($portfolio->main_image))) {
            unlink(public_path($portfolio->main_image));
        }
        if ($portfolio->image && file_exists(public_path($portfolio->image))) {
            unlink(public_path($portfolio->image));
        }

        $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio deleted successfully!');
    }

public function update(Request $request, $slug)
{
    $portfolio = Portfolio::where('slug', $slug)->firstOrFail();

    $request->validate([
        'main_title' => 'nullable|string',
        'main_description' => 'nullable|string',
        'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        'main_image_alt' => 'nullable|string|max:255',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        'banner_image_alt' => 'nullable|string|max:255',
        'meta_title' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'technologies' => 'required|string',
        'home_page_order' => 'nullable|string',
        // English
        'main_title_en' => 'nullable|string',
        'main_description_en' => 'nullable|string',
        'meta_title_en' => 'nullable|string',
        'meta_description_en' => 'nullable|string',
        'meta_keywords_en' => 'nullable|string',
        // French
        'main_title_fr' => 'nullable|string',
        'main_description_fr' => 'nullable|string',
        'meta_title_fr' => 'nullable|string',
        'meta_description_fr' => 'nullable|string',
        'meta_keywords_fr' => 'nullable|string',
        // German
        'main_title_de' => 'nullable|string',
        'main_description_de' => 'nullable|string',
        'meta_title_de' => 'nullable|string',
        'meta_description_de' => 'nullable|string',
        'meta_keywords_de' => 'nullable|string',
    ]);

    // Dutch (default)
    $portfolio->main_title = $request->main_title;
    $portfolio->main_description = $request->main_description;
    $portfolio->meta_title = $request->meta_title;
    $portfolio->meta_description = $request->meta_description;
    $portfolio->meta_keywords = $request->meta_keywords;
    $portfolio->home_page_order = $request->home_page_order;
    $portfolio->main_image_alt = $request->main_image_alt;
    $portfolio->banner_image_alt = $request->banner_image_alt;

    // English
    $portfolio->main_title_en = $request->main_title_en;
    $portfolio->main_description_en = $request->main_description_en;
    $portfolio->meta_title_en = $request->meta_title_en;
    $portfolio->meta_description_en = $request->meta_description_en;
    $portfolio->meta_keywords_en = $request->meta_keywords_en;
    
    // French
    $portfolio->main_title_fr = $request->main_title_fr;
    $portfolio->main_description_fr = $request->main_description_fr;
    $portfolio->meta_title_fr = $request->meta_title_fr;
    $portfolio->meta_description_fr = $request->meta_description_fr;
    $portfolio->meta_keywords_fr = $request->meta_keywords_fr;
    
    // German
    $portfolio->main_title_de = $request->main_title_de;
    $portfolio->main_description_de = $request->main_description_de;
    $portfolio->meta_title_de = $request->meta_title_de;
    $portfolio->meta_description_de = $request->meta_description_de;
    $portfolio->meta_keywords_de = $request->meta_keywords_de;

    // Handle slug
    $existingPortfolio = Portfolio::where('slug', Str::slug($request->main_title))->first();
    if ($existingPortfolio && $existingPortfolio->id !== $portfolio->id) {
        $portfolio->slug = Str::slug($request->main_title) . '-' . uniqid();
    } else {
        $portfolio->slug = Str::slug($request->main_title);
    }

    // Handle main image
    if ($request->hasFile('main_image')) {
        if ($portfolio->main_image && file_exists(public_path($portfolio->main_image))) {
            unlink(public_path($portfolio->main_image));
        }
        $mainImage = $request->file('main_image');
        $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('uploads/portfolio'), $mainImageName);
        $portfolio->main_image = 'uploads/portfolio/' . $mainImageName;
    }

    // Handle banner image
    if ($request->hasFile('banner_image')) {
        if ($portfolio->banner_image && file_exists(public_path($portfolio->banner_image))) {
            unlink(public_path($portfolio->banner_image));
        }
        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
        $bannerImage->move(public_path('uploads/portfolio'), $bannerImageName);
        $portfolio->banner_image = 'uploads/portfolio/' . $bannerImageName;
    }

    $portfolio->save();

    // Handle technologies
    if ($request->has('technologies')) {
        PortfolioTechnology::where('portfolio_id', $portfolio->id)->delete();
        $technologies = $request->technologies;
        if (is_string($technologies)) {
            $technologies = json_decode($technologies, true);
        }
        if (is_array($technologies)) {
            foreach ($technologies as $techId) {
                PortfolioTechnology::create([
                    'portfolio_id' => $portfolio->id,
                    'technology_id' => $techId,
                ]);
            }
        }
    } else {
        PortfolioTechnology::where('portfolio_id', $portfolio->id)->delete();
    }

    // Handle services
    if ($request->has('services')) {
        Portfolioservice::where('portfolio_id', $portfolio->id)->delete();
        $services = $request->services;
        if (is_string($services)) {
            $services = json_decode($services, true);
        }
        if (is_array($services)) {
            foreach ($services as $serviceId) {
                Portfolioservice::create([
                    'portfolio_id' => $portfolio->id,
                    'service_id' => $serviceId
                ]);
            }
        }
    } else {
        Portfolioservice::where('portfolio_id', $portfolio->id)->delete();
    }

    return redirect()->back()->with('success', 'Portfolio updated successfully.');
}

    public function destroy($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();

        // // Delete hero image
        // if ($portfolio->hero_image && file_exists(public_path($portfolio->hero_image))) {
        //     unlink(public_path($portfolio->hero_image));
        // }

        // Delete main image
        if ($portfolio->main_image && file_exists(public_path($portfolio->main_image))) {
            unlink(public_path($portfolio->main_image));
        }

        // Delete banner image
        if ($portfolio->banner_image && file_exists(public_path($portfolio->banner_image))) {
            unlink(public_path($portfolio->banner_image));
        }

        // Delete additional images
        // foreach ($portfolio->images as $image) {
        //     if (file_exists(public_path($image->image_path))) {
        //         unlink(public_path($image->image_path));
        //     }
        //     $image->delete();
        // }

        // Delete portfolio services
        Portfolioservice::where('portfolio_id', $portfolio->id)->delete();

        // Delete portfolio technologies
        PortfolioTechnology::where('portfolio_id', $portfolio->id)->delete();

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }

    public function deleteImage(Request $request)
    {
        try {
            $imagePath = $request->input('image_path');

            // Find the portfolio image record
            $portfolioImage = PortfolioImage::where('image_path', $imagePath)->first();

            if ($portfolioImage) {
                // Delete the physical file
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }

                // Delete only this specific image record
                $portfolioImage->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Image deleted successfully',
                    'remaining_images' => PortfolioImage::where('portfolio_id', $portfolioImage->portfolio_id)
                        ->pluck('image_path')
                        ->toArray()
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Image not found'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting image: ' . $e->getMessage()
            ], 500);
        }
    }
}
