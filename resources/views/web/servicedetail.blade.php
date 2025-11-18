@extends('layouts.web')
@section('meta_title', $service->getLocalizedMetaTitle())
@section('meta_desc', $service->getLocalizedMetaDescription())
@section('meta_keyword', $service->getLocalizedMetaKeywords())
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
                                        <span>{{ $portfolio->home_page_order ?? 'N/A' }}</span>
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
