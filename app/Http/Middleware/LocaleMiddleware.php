<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get available languages from database
        $websetting = \App\Models\Websetting::first();
        $availableLanguages = $websetting && $websetting->available_languages 
            ? array_map('trim', explode(',', $websetting->available_languages))
            : ['nl', 'en', 'fr', 'de'];
        
        // Ensure Dutch is always available (failsafe)
        if (!in_array('nl', $availableLanguages)) {
            $availableLanguages[] = 'nl';
        }
        
        // Get locale from cookie, fallback to default 'nl'
        $locale = $request->cookie('locale', config('app.locale', 'nl'));
        
        // Validate locale against available languages
        if (!in_array($locale, $availableLanguages)) {
            $locale = 'nl'; // Auto-switch to Dutch if current language is not available
            
            // Update the cookie to Dutch
            Cookie::queue('locale', 'nl', 525600); // 1 year
        }
        
        // Set the application locale
        App::setLocale($locale);
        
        return $next($request);
    }
}

