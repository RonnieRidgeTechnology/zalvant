<?php

namespace App\Http\Controllers;

use App\Models\AboutUpdate;
use App\Models\AiDeal;
use App\Models\AppointmentUpdate;
use App\Models\Blog;
use App\Models\action;
use App\Models\stat; 
use App\Models\banner;
use App\Models\BlogCategory;
use App\Models\BlogUpdate;
use App\Models\ContactUpdate;
use App\Models\CoreValue;
use App\Models\Faq;
use App\Models\LandingFormLabel;
use App\Models\LandingPage;
use App\Models\HomeUpdate;
use App\Models\Portfolio;
use App\Models\PortfolioUpdate;
use App\Models\PrivacyPolicy;
use App\Models\Service;
use App\Models\ServiceUpdate;
use App\Models\Technology;
use App\Models\TermsAndCondition;
use App\Models\Testimonial;
use App\Models\Websetting;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function index()
    {
        $homeupdate = HomeUpdate::first();
        $testimonials = Testimonial::where('status', 1)->get();
        $aideals = AiDeal::where('status', 1)->latest()->get();
        $technologies = Technology::where('status', 1)->latest()->get();
        $faqs = Faq::where('status', 1)->latest()->get();
        $services = Service::where('status', 1)
            ->where('type', '!=', 'ai-development')
            ->orderBy('order_by', 'asc')
            ->get();
        $aidevelopment_services = Service::where('type', 'ai-development')->where('status', 1)->latest()->take(3)->get();

        $portfolio = Portfolio::with(['images', 'services', 'technologies'])->orderBy('id', 'desc')->get();
  
        return view('web.index', compact('homeupdate', 'testimonials', 'aideals', 'technologies', 'faqs', 'portfolio', 'services','aidevelopment_services'));
    }
    public function landingPage()
    {
        $homeupdate = HomeUpdate::first();
        $testimonials = Testimonial::where('status', 1)->get();
        $aideals = AiDeal::where('status', 1)->latest()->get();
        $technologies = Technology::where('status', 1)->latest()->get();
        $faqs = Faq::where('status', 1)->latest()->get();
        $services = Service::where('status', 1)
            ->where('type', '!=', 'ai-development')
            ->orderBy('order_by', 'asc')
            ->get();
        $aidevelopment_services = Service::where('type', 'ai-development')->where('status', 1)->latest()->take(3)->get();

        $portfolio = Portfolio::with(['images', 'services', 'technologies'])->orderBy('id', 'desc')->take(6)->get();
        $stat = stat::first();
        $actionData = action::first();
        $banner = banner::first();
        $formLabels = LandingFormLabel::first();
        return view('web.landing', compact('homeupdate', 'testimonials', 'aideals', 'technologies', 'faqs', 'portfolio', 'services','aidevelopment_services','stat','actionData','banner','formLabels'));
    }

    public function landingPageByService($slug)
    {
        // Find landing page by its slug
        $landingPage = LandingPage::where('slug', $slug)->with('services')->first();
        
        // If no landing page found, redirect to 404
        if (!$landingPage) {
            abort(404, 'Landing page not found.');
        }

        // Get current locale from cookie or default to 'nl'
        $locale = request()->cookie('locale', 'nl');
        
        $homeupdate = HomeUpdate::first();
        $testimonials = Testimonial::where('status', 1)->get();
        $aideals = AiDeal::where('status', 1)->latest()->get();
        $technologies = Technology::where('status', 1)->latest()->get();
        $faqs = Faq::where('status', 1)->latest()->get();
        $services = Service::where('status', 1)
            ->where('type', '!=', 'ai-development')
            ->orderBy('order_by', 'asc')
            ->get();
        $aidevelopment_services = Service::where('type', 'ai-development')->where('status', 1)->latest()->take(3)->get();

        // Get service IDs from landing page
        $landingPageServiceIds = $landingPage->services->pluck('id')->toArray();
        
        // Filter portfolios that are associated with any of the landing page's services
        $portfolio = Portfolio::with(['images', 'services', 'technologies'])
            ->whereHas('services', function ($query) use ($landingPageServiceIds) {
                $query->whereIn('services.id', $landingPageServiceIds);
            })
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        
        $stat = stat::first();
        $actionData = action::first();
        $banner = banner::first();
        $formLabels = LandingFormLabel::first();
        
        return view('web.landing_pages', compact(
            'homeupdate', 
            'testimonials', 
            'aideals', 
            'technologies', 
            'faqs', 
            'portfolio', 
            'services',
            'aidevelopment_services',
            'stat',
            'actionData',
            'banner',
            'formLabels',
            'landingPage',
            'locale'
        ));
    }
    

 
    public function sitemap()
{
    $urls = [
        route('home.index'),
        route('contact-us'),
        route('about-us'),
        route('appointment'),
        route('portfolio'),
        route('service'),
        route('blog'),
        route('privacy'),
        route('term'),
    ];

    // Add dynamic blog detail pages
    $blogs = \App\Models\Blog::all();
    foreach ($blogs as $blog) {
        $urls[] = route('blog.details', $blog->slug);
    }

    // Add dynamic service detail pages
    $services = \App\Models\Service::all();
    foreach ($services as $service) {
        $urls[] = route('service.details', $service->slug);
    }

    // Add dynamic portfolio detail pages
    $portfolios = \App\Models\Portfolio::all();
    foreach ($portfolios as $portfolio) {
        $urls[] = route('portfolio.details', $portfolio->slug);
    }

    // XML root
    $xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' .
                  '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';

    $xml = new \SimpleXMLElement($xmlContent);

    foreach ($urls as $url) {
        $urlTag = $xml->addChild('url');
        $urlTag->addChild('loc', htmlspecialchars($url, ENT_QUOTES, 'UTF-8'));
        $urlTag->addChild('lastmod', now()->toAtomString());
        $urlTag->addChild('changefreq', 'daily');
        $urlTag->addChild('priority', '1.0');
    }

    // Save file in /public/sitemap.xml
    $filePath = public_path('sitemap.xml');
    $xml->asXML($filePath);

    // Return XML response
    return response(file_get_contents($filePath), 200)
        ->header('Content-Type', 'application/xml');
}


    public function about()
    {

        $aboutus = AboutUpdate::first();
        $core_values = CoreValue::where('status', 1)->get();
        $why_choose_us = WhyChooseUs::where('status', 1)->get();
        return view('web.about', compact('aboutus', 'core_values', 'why_choose_us'));
    }
    public function contact()
    {
        $contactupdate = ContactUpdate::first();
        $websetting = Websetting::first();
        $services = Service::where('status', 1)->get();
        return view('web.contact', compact('websetting', 'services', 'contactupdate'));
    }

public function services($type = null)
{
    $servicesupdate = ServiceUpdate::first();
    $aideals = AiDeal::where('status', 1)->latest()->get();
    $technologies = Technology::where('status', 1)->latest()->get();

    $query = Service::where('status', 1);

    if ($type) {
        if ($type == 'web-development') {
            $query->where('type', 'service')
                  ->orWhere('type', 'api-solution');
        } elseif ($type == 'mobile-development') {
            $query->where('type', 'mobile-development');
        } elseif ($type == 'graphic-designing') {
            $query->where('type', 'graphic-designing');
        } elseif ($type == 'ai-development') {
            $query->where('type', 'ai-development');
        }elseif ($type == 'digital-marketing') {
            $query->where('type', 'digital-marketing');
        }
    }

    $services = $query->latest()->get();

    if ($type == 'dmm-services') {
        $services = DmmService::all();
    }

    return view('web.serivce', compact('servicesupdate', 'technologies', 'aideals', 'services'));
}

    public function serviceDetails($slug)
    {

        $homeupdate = HomeUpdate::first();
        $service = Service::with(['technologies', 'portfolios'])->where('slug', $slug)->firstOrFail();
        $faqs = Faq::where('status', 1)->latest()->get();

        return view('web.servicedetail', compact('service', 'faqs', 'homeupdate'));
    }


    public function blog(Request $request)
    {
        $category_slug = $request->get('category');
        $query = null;
        $query = Blog::query();
        if ($category_slug) {
            $category = BlogCategory::where('slug', $category_slug)->first();
            $query->where('blogcategories_id', $category->id);
        }

        $search = $request->get('q');
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }
        $blogs = $query->where('status', 1)->latest()->paginate(5);

        $blogupdate = BlogUpdate::first();
        $recent_blogs = Blog::where('status', 1)->latest()->take(4)->get();
        $categories = BlogCategory::where('status', 1)->get(); // Fetch active categories
        $all_tags = Blog::where('status', 1)->pluck('tags')->flatten()->filter()->map(fn($tag) => strtolower(trim($tag)))->countBy()->sortDesc()->take(10);

        return view('web.blog', compact('query', 'blogupdate', 'blogs', 'recent_blogs', 'categories', 'all_tags', 'category_slug', 'search'));
    }


    public function blogDetails($slug)
    {

        $blogupdate = BlogUpdate::first();

        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recent_blogs = Blog::where('status', 1)->latest()->take(4)->get();
        $categories = BlogCategory::where('status', 1)->get();
        $all_tags = Blog::where('status', 1)->pluck('tags')->flatten()->filter()->map(fn($tag) => strtolower(trim($tag)))->countBy()->sortDesc()->take(10);

        return view('web.blogdetail', compact('blog', 'recent_blogs', 'categories', 'blogupdate', 'all_tags'));
    }
    //blog search
    // public function blogSearch(Request $request)
    // {
    //     $query = $request->get('query');
    //     $blogupdate = BlogUpdate::first();
    //     $recent_blogs = Blog::where('status', 1)->latest()->take(4)->get();
    //     $categories = BlogCategory::where('status', 1)->get();
    //     $all_tags = Blog::where('status', 1)->pluck('tags')->flatten()->filter()->map(fn($tag) => strtolower(trim($tag)))->countBy()->sortDesc()->take(10);

    //     $blog = Blog::where('status', 1)
    //         ->where(function ($q) use ($query) {
    //             $q->where('title', 'like', "%{$query}%")
    //               ->orWhere('desc', 'like', "%{$query}%");
    //         })
    //         ->latest()
    //         ->get();

    //     return view('web.blog', compact('blogupdate', 'blog', 'recent_blogs', 'categories', 'all_tags', 'query'));
    // }

    public function appointment()
    {
        $appointmentupdate = AppointmentUpdate::first();
        $services = Service::all();
        return view('web.appointment', compact('appointmentupdate', 'services'));
    }
    public function portfolio()
    {
        $portfolioupdate = PortfolioUpdate::first();
        $portfolios = Portfolio::with(['images', 'services', 'technologies'])->orderBy('id', 'desc')->get();
        return view('web.portfolio', compact('portfolioupdate', 'portfolios'));
    }
    public function portfolioDetails($slug)
    {
        $portfolio = Portfolio::with(['images', 'services', 'technologies'])->where('slug', $slug)->firstOrFail();
        $banner = banner::first();
        return view('web.portfoliodetail', compact('portfolio','banner'));
    }

    public function privacy()
    {
        $privacy = PrivacyPolicy::first();
        return view('web.privacy', compact('privacy'));
    }
    public function term()
    {
        $term = TermsAndCondition::first();
        return view('web.term', compact('term'));
    }

    public function switchLanguage($locale)
    {
        // Get available languages from database
        $websetting = Websetting::first();
        $availableLanguages = $websetting && $websetting->available_languages 
            ? array_map('trim', explode(',', $websetting->available_languages))
            : ['nl', 'en', 'fr', 'de'];
        
        // Ensure Dutch is always available (failsafe)
        if (!in_array('nl', $availableLanguages)) {
            $availableLanguages[] = 'nl';
        }
        
        // Validate locale against available languages
        if (!in_array($locale, $availableLanguages)) {
            $locale = 'nl'; // Default to Dutch if requested language is not available
        }
        
        // Set cookie for 1 year
        return redirect()->back()->cookie('locale', $locale, 525600);
    }
}
