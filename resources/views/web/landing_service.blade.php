@extends('layouts.web')
<style>
    /* Custom header navigation for landing service page */
    header:has(.landing-types-nav) {
        display: flex !important;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px !important;
        gap: 20px;
        position: relative;
        overflow: visible !important;
        min-height: 80px;
    }

    /* Ensure logo doesn't overlap navigation */
    header:has(.landing-types-nav) .logo {
        flex-shrink: 0;
        z-index: 1;
        position: relative;
        max-width: 250px;
        margin-right: 20px;
    }

    /* Ensure header-btn (language/consultation) doesn't overlap */
    header:has(.landing-types-nav) .header-btn {
        flex-shrink: 0;
        z-index: 10;
        position: relative;
    }

    /* Hide regular nav-menu completely when custom nav is present - multiple selectors to ensure it works */
    header:has(.landing-types-nav) .nav-menu,
    header .landing-types-nav~.nav-menu,
    body:has(.landing-types-nav) header .nav-menu,
    body:has(.landing-types-nav) .nav-menu,
    body.has-landing-types-nav header .nav-menu,
    body.has-landing-types-nav .nav-menu,
    .landing-types-nav~.nav-menu,
    header .landing-types-nav+.nav-menu,
    header .nav-menu:has(~ .landing-types-nav),
    header .nav-menu.hidden-on-landing-page {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        position: absolute !important;
        left: -9999px !important;
        width: 0 !important;
        height: 0 !important;
        overflow: hidden !important;
        pointer-events: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Additional override for any inline styles */
    header .landing-types-nav~.nav-menu {
        display: none !important;
    }

    /* Landing Types Navigation */
    .landing-types-nav {
        display: flex !important;
        align-items: center;
        gap: 12px;
        flex: 1 1 0;
        justify-content: center;
        margin: 0 15px;
        margin-left: 30px !important;
        margin-right: 30px !important;
        min-width: 0;
        overflow-x: auto;
        overflow-y: visible;
        position: relative;
        z-index: 10;
        padding-left: 475px;
    }

    /* Ensure all items in nav are visible */
    .landing-types-nav .landing-type-item {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        position: relative !important;
    }

    .landing-types-nav::-webkit-scrollbar {
        display: none;
    }

    .landing-type-item {
        position: relative;
        flex-shrink: 0;
        z-index: 10;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .landing-type-trigger {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        text-decoration: none;
        white-space: nowrap;
    }

    .landing-type-trigger:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .landing-type-trigger svg {
        transition: transform 0.3s ease;
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

    .landing-type-item.active .landing-type-trigger svg {
        transform: rotate(180deg);
    }

    /* Dropdown container - hidden, dropdowns are positioned absolutely */
    #landing-type-dropdowns-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 0;
        overflow: visible;
        pointer-events: none;
        z-index: 0;
    }

    /* Dropdown - positioned outside navbar using fixed positioning */
    .landing-type-dropdown {
        display: none;
        position: fixed;
        background: white;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        min-width: 220px;
        max-width: 300px;
        z-index: 10000;
        padding: 8px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
        max-height: 400px;
        overflow-y: auto;
        pointer-events: none;
        top: 105px !important;
    }

    .landing-type-dropdown.show {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
        pointer-events: auto !important;
    }

    .landing-type-dropdown ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .landing-type-dropdown li {
        margin: 0;
    }

    .landing-type-dropdown a {
        display: block;
        padding: 10px 16px;
        color: #333;
        text-decoration: none;
        transition: background 0.2s;
        font-size: 14px;
    }

    .landing-type-dropdown a:hover {
        background: #f5f5f5;
        color: #2950B1;
    }

    .landing-type-dropdown .no-services {
        padding: 12px 16px;
        color: #999;
        font-size: 13px;
        font-style: italic;
    }

    /* Mobile responsive */
    @media (max-width: 1024px) {
        .landing-types-nav {
            display: none !important;
        }

        header:has(.landing-types-nav) .nav-menu {
            display: block !important;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide regular nav-menu when landing-types-nav is present
        const landingNav = document.querySelector('.landing-types-nav');
        if (landingNav) {
            // Add class to body for CSS targeting
            document.body.classList.add('has-landing-types-nav');

            // Hide all nav-menu elements
            const navMenus = document.querySelectorAll('header .nav-menu');
            navMenus.forEach(function(navMenu) {
                navMenu.style.display = 'none';
                navMenu.style.visibility = 'hidden';
                navMenu.style.opacity = '0';
                navMenu.style.position = 'absolute';
                navMenu.style.left = '-9999px';
                navMenu.style.width = '0';
                navMenu.style.height = '0';
                navMenu.style.overflow = 'hidden';
                navMenu.style.pointerEvents = 'none';
                navMenu.style.margin = '0';
                navMenu.style.padding = '0';
            });

            // Also hide using class
            navMenus.forEach(function(navMenu) {
                navMenu.classList.add('hidden-on-landing-page');
            });
        }

        // Dropdown functionality with JavaScript - Hover based
        const dropdownTriggers = document.querySelectorAll('.landing-type-trigger[data-dropdown-id]');
        const dropdowns = document.querySelectorAll('.landing-type-dropdown');
        let activeDropdown = null;
        let activeTrigger = null;
        let hoverTimeout = null;
        let repositionHandlers = [];

        // Function to position dropdown relative to its trigger
        function positionDropdown(trigger, dropdown) {
            const triggerRect = trigger.getBoundingClientRect();

            // Position dropdown below the trigger with a small gap for easier mouse movement
            let top = triggerRect.bottom + 12;
            let left = triggerRect.left;

            // Set position first to get actual dimensions
            dropdown.style.top = top + 'px';
            dropdown.style.left = left + 'px';

            // Get dimensions after positioning
            const dropdownRect = dropdown.getBoundingClientRect();

            // Adjust if dropdown would go off screen to the right
            if (left + dropdownRect.width > window.innerWidth) {
                left = window.innerWidth - dropdownRect.width - 10;
            }

            // Adjust if dropdown would go off screen to the left
            if (left < 10) {
                left = 10;
            }

            // Adjust if dropdown would go off screen at the bottom
            if (top + dropdownRect.height > window.innerHeight) {
                top = triggerRect.top - dropdownRect.height - 8;
            }

            dropdown.style.top = top + 'px';
            dropdown.style.left = left + 'px';
        }

        // Function to remove reposition handlers
        function removeRepositionHandlers() {
            repositionHandlers.forEach(function(handler) {
                window.removeEventListener('scroll', handler, true);
                window.removeEventListener('resize', handler);
            });
            repositionHandlers = [];
        }

        // Function to close all dropdowns
        function closeAllDropdowns() {
            if (hoverTimeout) {
                clearTimeout(hoverTimeout);
                hoverTimeout = null;
            }
            dropdowns.forEach(function(dropdown) {
                dropdown.classList.remove('show');
            });
            document.querySelectorAll('.landing-type-item').forEach(function(item) {
                item.classList.remove('active');
            });
            removeRepositionHandlers();
            activeDropdown = null;
            activeTrigger = null;
        }

        // Function to show dropdown
        function showDropdown(trigger, dropdown, item) {
            // Clear any pending close timeout
            if (hoverTimeout) {
                clearTimeout(hoverTimeout);
                hoverTimeout = null;
            }

            // Close all other dropdowns
            if (activeDropdown !== dropdown) {
                closeAllDropdowns();
            }

            // Show and position the dropdown
            activeDropdown = dropdown;
            activeTrigger = trigger;
            item.classList.add('active');
            dropdown.classList.add('show');

            // Position the dropdown
            positionDropdown(trigger, dropdown);

            // Reposition on scroll or resize
            const reposition = function() {
                if (dropdown.classList.contains('show') && activeTrigger) {
                    positionDropdown(activeTrigger, dropdown);
                }
            };

            window.addEventListener('scroll', reposition, true);
            window.addEventListener('resize', reposition);
            repositionHandlers.push(reposition);
        }

        // Handle hover on triggers and items
        dropdownTriggers.forEach(function(trigger) {
            const dropdownId = trigger.getAttribute('data-dropdown-id');
            const dropdown = document.getElementById(dropdownId);
            const item = trigger.closest('.landing-type-item');

            if (!dropdown) return;

            // Show dropdown on hover over trigger/item
            item.addEventListener('mouseenter', function() {
                showDropdown(trigger, dropdown, item);
            });

            // Keep dropdown open when hovering over it
            dropdown.addEventListener('mouseenter', function() {
                if (hoverTimeout) {
                    clearTimeout(hoverTimeout);
                    hoverTimeout = null;
                }
                // Ensure dropdown stays open
                if (activeDropdown !== dropdown) {
                    showDropdown(trigger, dropdown, item);
                }
            });

            // Close dropdown when mouse leaves item
            item.addEventListener('mouseleave', function(e) {
                // Check if mouse is moving to dropdown
                const relatedTarget = e.relatedTarget;
                if (relatedTarget && dropdown.contains(relatedTarget)) {
                    return; // Don't close if moving to dropdown
                }

                // Small delay to allow moving to dropdown
                hoverTimeout = setTimeout(function() {
                    // Check if mouse is still over dropdown or item
                    if (!dropdown.matches(':hover') && !item.matches(':hover')) {
                        closeAllDropdowns();
                    }
                }, 150);
            });

            // Close dropdown when mouse leaves dropdown
            dropdown.addEventListener('mouseleave', function(e) {
                const relatedTarget = e.relatedTarget;
                // Check if moving back to item or trigger
                if (relatedTarget && (item.contains(relatedTarget) || trigger.contains(relatedTarget))) {
                    return; // Don't close if moving back to item
                }

                hoverTimeout = setTimeout(function() {
                    // Check if mouse is still over dropdown or item
                    if (!dropdown.matches(':hover') && !item.matches(':hover')) {
                        closeAllDropdowns();
                    }
                }, 150);
            });
        });
    });
</script>
@section('meta_title', $service->getLocalizedMetaTitle())
@section('meta_desc', $service->getLocalizedMetaDescription())
@section('meta_keyword', $service->getLocalizedMetaKeywords())

@push('custom-header-nav')
<div class="landing-types-nav">
    @if(isset($landingTypes) && $landingTypes->count() > 0)
    @foreach($landingTypes as $index => $landingType)
    <div class="landing-type-item" data-item-index="{{ $index }}">
        @if($landingType->services_list && $landingType->services_list->count() > 0)
        <a href="{{ route('landing.type', $landingType->slug) }}" class="landing-type-trigger" data-dropdown-id="dropdown-{{ $index }}">
            <span>{{ $landingType->getLocalizedName() }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </a>
        @else
        <a href="{{ route('landing.type', $landingType->slug) }}" class="landing-type-trigger">
            <span>{{ $landingType->getLocalizedName() }}</span>
        </a>
        @endif
    </div>
    @endforeach
    @endif
</div>
@endpush

{{-- Dropdowns placed outside navbar to avoid CSS conflicts --}}
<div id="landing-type-dropdowns-container">
    @if(isset($landingTypes) && $landingTypes->count() > 0)
    @foreach($landingTypes as $index => $landingType)
    @if($landingType->services_list && $landingType->services_list->count() > 0)
    <div class="landing-type-dropdown" id="dropdown-{{ $index }}" data-trigger-index="{{ $index }}">
        <ul>
            @foreach($landingType->services_list as $service)
            <li>
                <a href="{{ route('landing.service', $service->slug) }}">
                    {{ $service->getLocalizedName() }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @endforeach
    @endif
</div>

@section('content')

    <div class="service-banner2" style="padding: 120px 80px 236px 80px;">
        <div class="banner-text">
            <h1 class="banner-title">{{ $service->getLocalizedHeroTitle() }}</h1>
            <p class="banner-des">{{ $service->getLocalizedHeroDescription() }}</p>
        </div>
      <div class="banner-images">
           
             <div class="orbit-section">
       <div class="border1">
            <img src="{{ asset('assets/web/images/Vue.js_Logo_2 1.png') }}" class="vue small-icon" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/Node.js_logo_2015 1.png') }}" class=" small-icon node"
                alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/physics 2.png') }}" class="react small-icon" alt="Vue.js_Logo_2">
        </div>
        <div class="border2">
            <img src="{{ asset('assets/web/images/sass 1.png') }}" class="small-icon sass" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/NET_Core_Logo 1.png') }}" class="small-icon net" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/Angular_full_color_logo 1.png') }}" class="small-icon angular"
                alt="Vue.js_Logo_2">
        </div>
        <div class="border3">
            <img src="{{ asset('assets/web/images/php 2.png') }}" class=" small-icon php" alt="php 2">
            <img src="{{ asset('assets/web/images/python 1.png') }}" class=" small-icon python" alt="python 1">
            <img src="{{ asset('assets/web/images/java 1.png') }}" class=" small-icon java" alt="java 1">
        </div>
        <div class="border4">
        </div>
        <div class="center-circle">
            <img src="https://zalvant.com/assets/web/images/Group_1000006059-removebg-preview.png" alt="img29">
        </div>
    </div>
        </div>
    </div>

    <div class="body-contect-detail">
        <div class="bordershape-detail" style="top: -9px !important"></div>
        <div class="hero-container">
            <div class="content-wrapper">
                <div class="left-section">
                    <div class="services-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                        Our Top Services
                    </div>
                    <h1 class="hero-title">{{ $service->getLocalizedName() }}</h1>
                    <p class="hero-desc">
                        {{ $service->getLocalizedDescription() }}
                    </p>
                    <div class="tech-stack">
                        @foreach ($service->technologies as $tech)
                            <span class="tech-item">{{ $tech->name }}</span>
                        @endforeach
                    </div>
                    <div class="cta-section">
                        <a href="{{ route('appointment') }}" class="cta-btn">
                            Start Project
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M13 18l6 -6" />
                                <path d="M13 6l6 6" />
                            </svg>
                        </a>
                        <a href="{{ route('contact-us') }}" class="cta-btn secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9h8" />
                                <path d="M8 13h6" />
                                <path
                                    d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                            </svg>
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="right-section">

                    <div class="tech-grid">
                        @foreach ($service->technologies as $tech)
                            <div class="tech-card2">
                                <img src="{{ asset($tech->image) }}" alt="image">
                                <span class="tech-name">{{ $tech->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="customweb-main">
            <div class="ssbg">
                {{-- <img src="{{ asset('assets/web/images/ssbg.png') }}" alt=""> --}}
            </div>
            <div class="under-customweb-main">
                <div class="left-customwebText">
                    <div class="text-logo" style="width: fit-content;">
                        <img src="image/Rlogo.png" alt="Rlogo">
                        <p> Latest Technology</p>
                    </div>
                    <div class="tectcustoms">
                        <h1>{{ $service->getLocalizedTitle1() }}</h1>
                        <p>{{ $service->getLocalizedDescription1() }}</p>
                    </div>
                </div>
                <div class="left-customwebImage">
                    <div class="customwebImage">
                        <img src="{{ asset($service->image1) }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="customweb-main2">
            <div class="ssbg2">
                <img src="images/sswhitebg.png" alt="sswhitebg">
            </div>
            <div class="under-customweb-main2">
                <div class="left-customwebImage">
                    <div class="customwebImage">
                        <img src="{{ asset($service->image2) }}" alt="image">
                    </div>
                </div>
                <div class="left-customwebText">
                    <div class="text-logo2" style="width: fit-content;">
                        <img src="image/sswhitebg.png" alt="sswhitebg">
                        <p> Latest Technology</p>
                    </div>
                    <div class="tectcustoms2">
                        <h1>{{ $service->getLocalizedTitle2() }}</h1>
                        <p>{{ $service->getLocalizedDescription2() }}</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="offringai3">
            <div class="topaiservicrs">
                <div class="bannerTextMain2">
                    <div class="text-logo">
                        <img src="image/Rlogo.png" alt="Rlogo">
                        <p>Top Services</p>
                    </div>
                    <div class="bannerText">
                        <h1>{{ $service->getLocalizedPortfolioTitle() }}</h1>
                        <p style="line-height: 30px; margin: 0;">
                            {{ $service->getLocalizedPortfolioDescription() }}
                        </p>
                    </div>
                </div>
                <div class="blogs-card-main">
                    @foreach ($service->portfolios as $index => $portfolio)
                        <div class="blog-card-main2">
                            <a href="{{ route('portfolio.details', $portfolio->slug) }}">
                                <div class="buttonimages buttonimages1">
                                    <img src="{{ asset('assets/web/images/blackx.png') }}" alt="blackx">
                                </div>
                                <div class="buttonimages buttonimages2">
                                    <img src="{{ asset('assets/web/images/bluex.png') }}" alt="bluex">
                                </div>
                            </a>
                            <div class="blogs-card">
                                <a href="{{ route('portfolio.details', $portfolio->slug) }}">
                                    <div class="blog-text">
                                        <!-- <span>{{ $portfolio->home_page_order ?? 'N/A' }}</span> -->
                                        <h1>{{ $portfolio->main_title ?? 'N/A' }}</h1>
                                        <p>{{ \Illuminate\Support\Str::limit($portfolio->main_description, 100) }}</p>
                                    </div>
                                    <div class="blog-images">
                                        <img style="width: 100%;" src="{{ asset( $portfolio->banner_image) }}"
                                            alt="banner_image">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  <div class="faq-section">
        <div class="faq-head">
            <h1 class="faq-heading">{{ $homeupdate->faq_section_title }}</h1>
            <p class="faq-description">{{ $homeupdate->faq_section_title }}</p>
        </div>
        <div class="faq-details">
            <div class="customAccordion">
                @foreach ($faqs as $index => $faq)
                    <div class="faqque">
                        <div class="customAccordion-item" onclick="toggleAccordion(event, {{ $index + 1 }}, this)">
                            <div>{{ $faq->getLocalizedQuestion() }}</div>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6-6" />
                                </svg>
                            </div>
                        </div>
                        <div class="customAccordion-content" id="content{{ $index + 1 }}">
                            {{ $faq->getLocalizedAnswer() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
