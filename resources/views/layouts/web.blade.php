<!DOCTYPE html>
<html lang="en">
@php
$webset = \App\Models\Websetting::first();
@endphp

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTHWG57X');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTHWG57X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager�(noscript)�-->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PCMTW05KW6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PCMTW05KW6');
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', ' - ')</title>
    <link rel="stylesheet" href="{{ asset('assets/web/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/responsive.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset($webset->favicon_logo) }}">
    <meta name="description"
        content="@yield('meta_desc', '-')">
    <meta name="keywords"
        content="@yield('meta_keyword', '-')">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $metaName ?? 'Zalvant' }}">
    <meta property="og:title" content="@yield('meta_title', ' - ')">
    <meta property="og:description"
        content="@yield('meta_desc', '-')">
    <meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $webset->og_image ? asset($webset->og_image) : asset('images/Mask group.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Zalvant">
    <meta name="twitter:title" content="@yield('meta_title', '- ')">
    <meta name="twitter:description"
        content="@yield('meta_desc', '-')">
    <meta name="twitter:image" content="{{ $metaImage ?? asset('images/Mask group.png') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "u1u6ztdbzw");
</script>

    
    
    <style>
        .toast {
            position: fixed;
            top: 70px;
            right: 20px;
            min-width: 300px;
            max-width: 400px;
            padding: 12px 18px;
            color: #fff;
            border-radius: 10px;
            z-index: 9999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            animation: slideIn 0.4s ease, fadeOut 0.4s ease 2.6s forwards;
        }

        .toast.success {
            background: linear-gradient(135deg, #2950B1, #2950B1);
        }

        .toast.error {
            background: linear-gradient(135deg, #dc3545, #c82333);
        }

        .toast .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .toast .close-btn:hover {
            opacity: 0.7;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }
    </style>
    <style>
        /* Language Dropdown Styles */
        .language-menu {
            position: relative;
        }
        
        .language-trigger:hover {
            background: rgba(41, 80, 177, 0.1);
        }
        
        .language-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            min-width: 180px;
            z-index: 1000;
            padding: 8px 0;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
        
        .language-dropdown.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .language-dropdown li {
            list-style: none;
        }
        
        .language-dropdown li a {
            display: block;
            padding: 10px 16px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
            font-size: 14px;
        }
        
        .language-dropdown li a:hover {
            background: #f5f5f5;
        }
        
        .language-dropdown li a.active {
            background: #2950B1;
            color: white;
            font-weight: 600;
        }
        
        .chevron-icon {
            transition: transform 0.2s ease;
        }
        
        .language-menu.active .chevron-icon {
            transform: rotate(180deg);
        }
        
        /* Mobile Language Switcher */
        .mobile-language-switcher a.active-lang {
            color: #2950B1 !important;
            font-weight: 600;
        }
        
        /* Hide desktop language menu on mobile */
        @media (max-width: 1024px) {
            .header-btn {
                gap: 10px;
            }
            .header-btn .language-menu {
                display: block;
            }
            .language-menu {
                margin-left: 0;
            }
        }
        
        .technologies-wrapper {
            overflow: hidden;
            position: relative;
        }

        .tech-row {
            display: flex;
            gap: 20px;
            animation-duration: 20s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .tech-row-left {
            animation-name: slideLeft;
        }

        .tech-row-right {
            animation-name: slideRight;
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes slideRight {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .tech-card {
            flex-shrink: 0;
        }
        
         .wh-btn {
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 60px;
    height: 60px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    z-index: 9999;
    transition: .2s;
    box-shadow: 0 6px 18px rgba(0,0,0,0.18);
  }

  .wh-btn:hover {
    transform: translateY(-4px);
  }

  .wh-icon {
    width: 34px;
    height: 34px;
  }

  .wh-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(37,211,102,0.18);
    border-radius: 50%;
    animation: pulse 2.4s infinite;
    z-index: -1;
  }

  @keyframes pulse {
    0%   { transform: scale(.9); opacity: .7; }
    70%  { transform: scale(1.8); opacity: 0; }
    100% { transform: scale(1.8); opacity: 0; }
  }
    </style>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1233270205500258');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1233270205500258&ev=PageView&noscript=1"
/></noscript>
</head>

<body>
    <!-- WhatsApp Floating Button -->
<a href="https://wa.me/31687879704?text=Hello!%20I%20visited%20your%20website."
   class="wh-btn"
   target="_blank">

  <span class="wh-pulse"></span>

  <!-- REAL WhatsApp Official Icon -->
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
       alt="WhatsApp"
       class="wh-icon">
</a>
    <header>
        <div class="logo" style="margin-top: 20px;">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($webset->logo) }}" alt="">
            </a>
        </div>
        <div class="nav-menu">
            <ul>
                <li class="menu-item active">
                    <a href="{{ route('home.index') }}">{{ __('web.nav.home') }}</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('about-us') }}">{{ __('web.nav.about') }}</a>
                </li>
                <!-- <li class="menu-item">
                    <a href="{{ route('service') }}">Our Services</a>
                </li> -->
                <li class="menu-item services-menu">
                    <a href="{{ route('service') }}">{{ __('web.nav.services') }}</a>
                    <div class="mega-menu">
                        <div class="column">
                            <h4><a href="{{ route('service', 'web-development') }}">{{ __('web.services_menu.web_development') }}</a></h4>

                            <ul>
                                @php
                                $webServices = \App\Models\Service::whereIn('type', ['service', 'api-solution'])->get();
                                @endphp
                                @foreach($webServices as $service)
                                <li>
                                    <a href="{{ route('service.details', [ 'slug' => $service->slug]) }}">
                                        {{ $service->getLocalizedName() }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="column">
<h4><a href="{{ route('service', 'mobile-development') }}">{{ __('web.services_menu.mobile_app') }}</a></h4>
                            <ul>
                                @php
                                $mobileServices = \App\Models\Service::where('type', 'mobile-development')->get();
                                @endphp
                                @foreach($mobileServices as $service)
                                <li>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        {{ $service->getLocalizedName() }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="column">
<h4><a href="{{ route('service', 'graphic-designing') }}">{{ __('web.services_menu.graphic_design') }}</a></h4>
                            <ul>
                                @php
                                $graphicServices = \App\Models\Service::where('type', 'graphic-designing')->get();
                                @endphp
                                @foreach($graphicServices as $service)
                                <li>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        {{ $service->getLocalizedName() }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="column">
<h4><a href="{{ route('service', 'ai-development') }}">{{ __('web.services_menu.ai_development') }}</a></h4>
                            <ul>
                                @php
                                $aiServices = \App\Models\Service::where('type', 'ai-development')->get();
                                @endphp
                                @foreach($aiServices as $service)
                                <li>
                                    <a href="{{ route('service.details', [ 'slug' => $service->slug]) }}">
                                        {{ $service->getLocalizedName() }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="column">
<h4><a href="{{ route('service', 'digital-marketing') }}">{{ __('web.services_menu.digital_marketing') }}</a></h4>
                            <ul>
                                @php
                                $digitalMarketingServices = \App\Models\Service::where('type', 'digital-marketing')->get();
                                @endphp
                                @foreach($digitalMarketingServices as $service)
                                <li>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        {{ $service->getLocalizedName() }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="menu-item">
                    <a href="{{ route('portfolio') }}">{{ __('web.nav.portfolio') }}</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('blog') }}">{{ __('web.nav.blog') }}</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('home.landing') }}">{{ __('web.nav.contact') }}</a>
                </li>
            </ul>
        </div>
        <div class="header-btn" style="display: flex; align-items: center; gap: 15px;">
            @php
                $availableLanguages = $webset->available_languages_array ?? ['nl', 'en', 'fr', 'de'];
                $languageNames = [
                    'nl' => '🇳🇱 Nederlands',
                    'en' => '🇬🇧 English',
                    'fr' => '🇫🇷 Français',
                    'de' => '🇩🇪 Deutsch',
                ];
            @endphp
            @if(count($availableLanguages) > 1)
            <div class="language-menu">
                <button class="language-trigger" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 5px; padding: 8px 12px; border-radius: 8px; transition: background 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span style="font-weight: 600; color: #ffffffff;">{{ strtoupper(app()->getLocale()) }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="chevron-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <ul class="language-dropdown">
                    @foreach($availableLanguages as $langCode)
                        @if(isset($languageNames[$langCode]))
                            <li>
                                <a href="{{ route('language.switch', $langCode) }}" 
                                   class="{{ app()->getLocale() == $langCode ? 'active' : '' }}">
                                    {{ $languageNames[$langCode] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
            <a class="mobile-consl" href="{{ route('home.landing') }}" class="button">{{ __('web.buttons.get_free_consultation') }}</a>
        </div>
        
        <div class="Mobile-headers">
            <!-- Mobile Menu Button -->
            <div class="mobilmenus">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </div>
            <!-- Sidebar -->
            <div class="mobile-sidebar" id="mobileSidebar">
                <div class="close-btn" id="closeSidebar">✕</div>
                <ul>
                    <li><a href="{{ route('home.index') }}">{{ __('web.nav.home') }}</a></li>
                    <li><a href="{{ route('about-us') }}">{{ __('web.nav.about') }}</a></li>
                    <li><a href="{{ route('service') }}">{{ __('web.nav.services') }}</a></li>
                    <li><a href="{{ route('portfolio') }}">{{ __('web.nav.portfolio') }}</a></li>
                    <li><a href="{{ route('blog') }}">{{ __('web.nav.blog') }}</a></li>
                    <li><a href="{{ route('home.landing') }}">{{ __('web.nav.contact') }}</a></li>
                </ul>
                <div class="banner-btns" style="margin-top: 30px;">
                    <a href="{{ route('home.landing') }}" class="button">{{ __('web.buttons.get_free_consultation') }}</a>
                </div>
            </div>
        </div>


    </header>
    @yield('content')
    <footer>
        <img src="{{ asset('assets/web/images/Group 1000004724.png') }}" class="line-img1" alt="">
        <img src="{{ asset('assets/web/images/Group 1000004724.png') }}" class="line-img2" alt="">
        <div class="footer">
            <div class="ai-header">
                <h1 class="ai-section-heading">{{ __('web.footer.question') }}</h1>
                <p class="ai-section-text">{{ __('web.footer.question_desc') }}</p>
                <a href="{{ route('contact-us') }}" class="button">{{ __('web.buttons.contact_us') }}</a>
            </div>

            <div class="footer-links">
                <div class="links-container">
                    <div class="footer-logo">
                        <img src="{{ asset($webset->logo) }}" alt="">
                    </div>
                    <p>{{ $webset->getLocalizedFooterDesc() }}</p>
                </div>
                @php
                $api = \App\Models\Service::where('type', 'api-solution')->get();
                @endphp
                <!--<div class="links-container">-->
                <!--    <h4 class="links-title"> API oplossingen</h4>-->
                <!--    <ul class="links">-->
                <!--        @foreach($api as $api)-->
                <!--        <li>-->
                <!--            <a href="{{ route('service.details', ['type' => 'api-solution', 'slug' => $api->slug]) }}">-->
                <!--                {{ $api->name }}-->
                <!--            </a>-->
                <!--        </li>-->
                <!--        @endforeach-->
                <!--    </ul>-->
                <!--</div>-->
                @php
                $services = \App\Models\Service::where('type', 'service')->get();
                @endphp
              

                <div class="links-container">
                    @php
                    $development = \App\Models\Service::all();
                    @endphp
                    <h4 class="links-title">{{ __('web.footer.ai_development') }}</h4>
                    <ul class="links">
                        @foreach($development->where('type', 'ai-development') as $service)
                        <li>
            <a href="{{ route('service.ai-development', $service->slug) }}">

                                {{ $service->getLocalizedName() }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="links-container">
                    <h4 class="links-title">{{ __('web.footer.others') }}</h4>
                    <ul class="links">
                     <li>
    <a href="{{ route('service') }}">
        {{ __('web.footer.services') }}
    </a>
</li>
<li>
    <a href="#">
        {{ __('web.footer.ai_development') }}
    </a>
</li>
<li>
    <a href="{{ route('blog') }}">
        {{ __('web.footer.blogs') }}
    </a>
</li>
<li>
    <a href="{{ route('about-us') }}">
        {{ __('web.footer.about_us') }}
    </a>
</li>
<li>
    <a href="{{ route('appointment') }}">
        {{ __('web.footer.appointment') }}
    </a>
</li>
<li>
    <a href="{{ route('contact-us') }}">
        {{ __('web.footer.contact') }}
    </a>
</li>
<li>
    <a href="{{ route('sitemap') }}">
        {{ __('web.footer.sitemap') }}
    </a>
</li>


                    </ul>
                </div>
                 <div class="links-container">
                    <h4 class="links-title">{{ __('web.footer.services') }}</h4>
                    <ul class="links">
                        @foreach($services as $service)
                        <li>
                            <a href="{{ route('service.details', ['type' => 'service', 'slug' => $service->slug]) }}">
                                {{ $service->getLocalizedName() }}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="right">
                <p>{{ $webset->getLocalizedCopyright() }}</p>
            </div>
            <ul class="social-icons">
                <li>
                    <a href="{{ $webset->linkedin }}" class="media-icon">
                        <svg width="20" height="20" stroke="rgba(255, 255, 255, 0.8)" fill="rgba(255, 255, 255, 0.8)"
                            stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $webset->insta }}" class="media-icon">
                        <svg width="20" height="20" stroke="rgba(255, 255, 255, 0.8)" fill="rgba(255, 255, 255, 0.8)"
                            stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $webset->twitter }}" class="media-icon">
                        <svg width="20" height="20" stroke="rgba(255, 255, 255, 0.8)" fill="rgba(255, 255, 255, 0.8)"
                            stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $webset->facebook }}" class="media-icon">
                        <svg width="20" height="20" stroke="rgba(255, 255, 255, 0.8)" fill="rgba(255, 255, 255, 0.8)"
                            stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ $webset->tiktok }}" class="media-icon">
                        <svg width="20" height="20" viewBox="0 0 448 512" fill="rgba(255,255,255,0.8)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M448 209.9v125.1c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-97.2 78.8-176 176-176h48v48h-48c-70.7 0-128 57.3-128 128s57.3 128 128 128 128-57.3 128-128V209.9c-23.6-3.5-46.1-12.2-65.6-25.7V320c0 44.2-35.8 80-80 80s-80-35.8-80-80 35.8-80 80-80h16v48h-16c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32V32h48c0 61.9 50.1 112 112 112z" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="footer-pages">
                <a href="{{ route('privacy') }}">{{ __('web.footer.privacy_policy') }}</a>
                <a href="{{ route('term') }}">{{ __('web.footer.terms_conditions') }}</a>
            </div>
        </div>
    </footer>
    @if (session('success') || $errors->any())
    <script>
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                    <span>${message}</span>
                    <button class="close-btn" onclick="this.parentElement.remove()">×</button>
                `;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        // Trigger success toast
        @if(session('success'))
        showToast("{{ session('success') }}", "success");
        @endif

        // Trigger error toast
        @if($errors -> any())
        showToast("{{ $errors->first() }}", "error");
        @endif
    </script>
    @endif
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const row = document.getElementById("testimonialRow");
    let speed = 1; // pixels per frame
    let offset = 0;

    function animate() {
        offset -= speed;
        row.style.transform = `translateX(${offset}px)`;

        const firstCard = row.children[0];
        const firstCardWidth = firstCard.offsetWidth + 24; // card width + gap

        if (Math.abs(offset) >= firstCardWidth) {
            row.appendChild(firstCard);
            offset += firstCardWidth;
        }

        requestAnimationFrame(animate);
    }

    animate();
});
</script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentPage = window.location.pathname.split("/").pop(); // e.g., "About.html"
            const menuItems = document.querySelectorAll(".nav-menu .menu-item");

            menuItems.forEach(item => {
                const link = item.querySelector("a");
                const linkHref = link.getAttribute("href");

                if (linkHref === currentPage) {
                    item.classList.add("active");
                } else {
                    item.classList.remove("active");
                }
            });
        });
    </script>
   <script>
document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("carouselTrack");
    if (!track) return;

    const cards = Array.from(track.children);
    let currentIndex = 0;

    cards.forEach(card => {
        const clone = card.cloneNode(true);
        track.appendChild(clone);
    });

    function slideCarousel() {
        currentIndex++;
        const cardWidth = cards[0].offsetWidth + 20;
        track.style.transform = `translateX(-${cardWidth * currentIndex}px)`;

        if (currentIndex >= cards.length) {
            setTimeout(() => {
                track.style.transition = "none";
                track.style.transform = "translateX(0)";
                currentIndex = 0;
                setTimeout(() => {
                    track.style.transition = "transform 0.5s ease";
                }, 20);
            }, 500);
        }
    }

    setInterval(slideCarousel, 3000);
});
</script>

    <script>
        function toggleAccordion(event, itemNumber, element) {
            console.log(itemNumber, element);

            event.preventDefault(); // Now event is properly received

            const contents = document.querySelectorAll('.customAccordion-content');
            const items = document.querySelectorAll('.customAccordion-item');

            contents.forEach((content, index) => {
                if (index === itemNumber - 1) {
                    content.classList.toggle('active');
                    items[index].classList.toggle('active');
                } else {
                    content.classList.remove('active');
                    items[index].classList.remove('active');
                }
            });
        }
    </script>
    <script>
        const menuBtn = document.querySelector('.mobilmenus');
        const sidebar = document.getElementById('mobileSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.add('active'); // open sidebar
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active'); // close sidebar
        });
    </script>

    <script>
        // Language Dropdown Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const languageMenu = document.querySelector('.language-menu');
            const languageTrigger = document.querySelector('.language-trigger');
            const languageDropdown = document.querySelector('.language-dropdown');

            if (languageTrigger && languageDropdown) {
                // Toggle dropdown on click
                languageTrigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    languageMenu.classList.toggle('active');
                    languageDropdown.classList.toggle('show');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!languageMenu.contains(e.target)) {
                        languageMenu.classList.remove('active');
                        languageDropdown.classList.remove('show');
                    }
                });

                // Prevent dropdown from closing when clicking inside
                languageDropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>
    

    <script>
        // IntersectionObserver for scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.service-row').forEach(row => {
                observer.observe(row);
            });
        });
    </script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    function setupInfiniteScroll(rowId, direction = "left", speed = 0.5) {
        const row = document.getElementById(rowId);

        // Clone content once for seamless scrolling
        row.innerHTML += row.innerHTML;

        const totalWidth = row.scrollWidth / 2;
        let offset = (direction === "right") ? -totalWidth : 0;

        function animate() {
            offset += (direction === "left" ? -speed : speed);

            if (direction === "left" && Math.abs(offset) >= totalWidth) {
                offset = 0;
            } 
            else if (direction === "right" && offset >= 0) {
                offset = -totalWidth;
            }

            row.style.transform = `translateX(${offset}px)`;
            requestAnimationFrame(animate);
        }

        animate();
    }

    // Top row scrolls left
    setupInfiniteScroll("techRowLeft", "left", 0.6);

    // Bottom row scrolls right
    setupInfiniteScroll("techRowRight", "right", 0.6);

});
</script>

</body>

</html>