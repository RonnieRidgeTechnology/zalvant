@extends('layouts.web')
<style>
    @keyframes social {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(80px, -50px);
    }
}

@keyframes digital {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(-100px, -50px);
    }
}

@keyframes design {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(270px, -120px);
    }
}

@keyframes ui {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(175px, -155px);
    }
}

@keyframes mobile {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(-270px, -120px);
    }
}

@keyframes development {
    0% {
        transform: translate(0);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: translate(-175px, -155px);
    }
}
@keyframes web {
    0% {
        transform: scale(1);
        transition: all .35s linear;
    }

    100% {
        transition: all .35s linear;
        transform: scale(1.1);
    }
}
.banner {
    margin-top: 20px;
}

.banner-header {
    border-top-right-radius: 80px;
    border-top-left-radius: 80px;
    background: linear-gradient(to bottom, rgba(0, 102, 234, 1), rgba(3, 0, 80, 0));
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: auto;
    text-align: center;
    color: white;
    padding: 80px;
}

.contact-banner .banner-header {
    padding: 80px 250px !important;
}

.banner-header .banner-title {
    font-size: 48px;
    margin: 0;
}

.banner-header .banner-des {
    line-height: 30px;
    font-size: 18px;
}

.banner-btns {
    display: flex;
    gap: 20px;
}

.avatar-group {
    display: flex;
    align-items: center;
}

.avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 2px solid #fff;
    object-fit: cover;
    margin-left: -16px;
    box-shadow: 0 0 0 1px #ddd;
    background-color: #f0f0f0;
}

.avatar:first-child {
    margin-left: 0;
}

.avatar.count {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0;
    color: #444;
    font-weight: 600;
    font-size: 14px;
}

.border-line {
    width: 1200px;
    height: 600px;
}

.border-line2 {
    width: 1000px;
    position: absolute;
    top: 17%;
    height: 250px;
}

.border-line3 {
    position: absolute;
    width: 800px;
    top: 34%;
    height: 150px;
}

.border-line img {
    width: 100%;
}

.border-line2 img {
    width: 100%;
    top: 100px;
}

.border-line3 img {
    top: 200px;
    width: 100%;
}

.banner-services {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}
.service-banner .small-service,
.banner-services .small-service {
    display: flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(to left, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.08));
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    position: absolute;
    padding: 5px 10px;
    font-size: 12px;
    color: white;
}

.service-banner .small-service .service-icon img,
.banner-services .small-service .service-icon img {
    height: 100%;
    width: 100%;
    object-fit: contain;
}

.service-banner .small-service .service-icon,
.banner-services .small-service .service-icon {
    height: 32px;
    width: 32px;
}

.banner-services .border-line .web-design {
    left: 16%;
    top: 17%;
    animation: design 5s alternate infinite;
    transition: all .35s linear;

}

.banner-services .border-line .mobile-app {
    right: 16%;
    top: 17%;
    animation: mobile 5s alternate infinite;
    transition: all .35s linear;
}

.banner-services .border-line .app {
    bottom: 50%;
    right: 2%;
    animation: development 5s alternate infinite;
    transition: all .35s linear;
}

.banner-services .border-line .ui-design {
    bottom: 50%;
    animation: ui 5s alternate infinite;
    transition: all .35s linear;
}

.banner-services .border-line2 .web-development {
    top: -16px;
    left: 41%;
    animation: web 2s alternate infinite;
    transition: all .35s linear;
}

.banner-services .border-line3 .social-media {
    top: 58px;
    left: 7%;
    animation: social 3s alternate infinite;
    transition: all .35s linear;
}

.banner-services .border-line3 .digital-marketing {
    top: 58px;
    right: 7%;
    animation: digital 3s alternate infinite;
    transition: all .35s linear;
}

.banner-services::before {
    position: absolute;
    content: "";
    background-image: url(images/Line\ 22.png);
    width: 80%;
    height: 1px;
    bottom: 35%;
}

.banner-services .work-flow {
    display: flex;
    gap: 35px;
    align-items: center;
    position: absolute;
    bottom: 20%;
}

.banner-services .work-flow p {
    color: white;
}
@keyframes slide {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-100%);
    }
}

@keyframes slideReverse {
    from {
        transform: translateX(-100%);
    }

    to {
        transform: translateX(0);
    }
}
@keyframes round {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
@keyframes heightPulse {

    0%,
    100% {
        height: 100px;
        opacity: 0.3;
    }

    50% {
        height: 300px;
        opacity: 1;
    }
}
.orbit-section{
        top: 133px;
        width: 49%;
}


.borders5{
    width: 80px;
    position: absolute;
    top: 43%;
    left: 39%;
    height: 80px;
}
.borders5 img{
    width: 100%;
    height: 100%;
}



</style>
@section('meta_title', $homeupdate->getLocalizedMetaTitle())
@section('meta_desc', $homeupdate->getLocalizedMetaDesc())
@section('meta_keyword', $homeupdate->getLocalizedMetaKeyword())
@section('content')

<div class="banner">
        <div class="banner-header">
            <div class="avatar-group">
               <img src="{{ asset('assets/web/images/Ellipse 37.png') }}" alt="Avatar 1" class="avatar">
<img src="{{ asset('assets/web/images/Ellipse 38.png') }}" alt="Avatar 2" class="avatar">
<img src="{{ asset('assets/web/images/Ellipse 41.png') }}" alt="Avatar 3" class="avatar">
<img src="{{ asset('assets/web/images/Ellipse 42.png') }}" alt="Avatar 4" class="avatar">
<img src="{{ asset('assets/web/images/unsplash_RGKdWJOUFH0.png') }}" alt="Avatar 5" class="avatar">
<img src="{{ asset('assets/web/images/unsplash_u0TFS_wnqPE.png') }}" alt="Avatar 6" class="avatar">

                <div class="avatar count">200+</div>
            </div>

           <h1 class="banner-title">{{ __('web.banner.title') }}</h1>
            <p class="banner-des">{{ __('web.banner.description') }}</p>
            <div class="banner-btns" style="margin-top: 30px;">
                      <a href="{{ route('home.landing') }}" class="button">{{ __('web.buttons.get_free_consultation') }}</a>
                     <a href="{{ route('portfolio') }}" class="button2">{{ __('web.buttons.our_portfolio') }}</a>

            </div>
        </div>
      <div class="banner-services">
    <div class="border-line">
        <img src="{{ asset('assets/web/images/Ellipse 236.png') }}" alt="Ellipse 236">
        <a href="#">
            <div class="small-service web-design">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/desktop.png') }}" alt="desktop">
                </div>
                {{ __('web.services_cards.web_design') }}
            </div>
        </a>
        <a href="#">
            <div class="small-service ui-design">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Edit 3.png') }}" alt="Edit 3">
                </div>
               {{ __('web.services_cards.ui_design') }}
            </div>
        </a>
        <a href="#">
            <div class="small-service mobile-app">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Mobile.png') }}" alt="Mobile">
                </div>
                {{ __('web.services_cards.mobile_app') }}
            </div>
        </a>
        <a href="#">
            <div class="small-service app">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Laptop.png') }}" alt="Laptop">
                </div>
               {{ __('web.services_cards.app_development') }}
            </div>
        </a>
    </div>

    <div class="border-line2">
        <img src="{{ asset('assets/web/images/Ellipse 237.png') }}" alt="Ellipse 237">
        <a href="#">
            <div class="small-service web-development">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Devices.png') }}" alt="Devices">
                </div>
                {{ __('web.services_cards.web_development') }}
            </div>
        </a>
    </div>

    <div class="border-line3">
        <img src="{{ asset('assets/web/images/Ellipse 238.png') }}" alt="Ellipse 238">
        <a href="#">
            <div class="small-service social-media">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Rocket.png') }}" alt="Rocket">
                </div>
                {{ __('web.services_cards.social_media') }}
            </div>
        </a>
        <a href="#">
            <div class="small-service digital-marketing">
                <div class="service-icon">
                    <img src="{{ asset('assets/web/images/Group 1000004734.png') }}" alt="Group 1000004734">
                </div>
               {{ __('web.services_cards.digital_marketing') }}
            </div>
        </a>
    </div>

    <div class="work-flow">
        <p>{{ __('web.workflow.idea') }}</p>
        <div class="work-flow-arrow">
            <img src="{{ asset('assets/web/images/Arrow 1.png') }}" alt="Arrow 1">
        </div>
        <p>{{ __('web.workflow.design') }}</p>
        <div class="work-flow-arrow">
            <img src="{{ asset('assets/web/images/Arrow 1.png') }}" alt="Arrow 1">
        </div>
        <p>{{ __('web.workflow.build') }}</p>
        <div class="work-flow-arrow">
            <img src="{{ asset('assets/web/images/Arrow 1.png') }}" alt="Arrow 1">
        </div>
        <p>{{ __('web.workflow.test') }}</p>
        <div class="work-flow-arrow">
            <img src="{{ asset('assets/web/images/Arrow 1.png') }}" alt="Arrow 1">
        </div>
        <p>{{ __('web.workflow.launch') }}</p>
    </div>
</div>

<section class="about-section">
    
    {{-- Left Column: Description (Sticky while scrolling this section) --}}
    <div class="description">
        <h1>{{ $homeupdate->getLocalizedOfferTitle() }}</h1>
        <p>{{ $homeupdate->getLocalizedOfferDesc() }}</p>
    </div>

    {{-- Right Column: Tall content to enable scroll --}}
    <div class="about-cards-container" style="flex: 2;">
        @foreach ($services->chunk(2) as $serviceRow)
            <div class="service-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                @foreach ($serviceRow as $service)
                    <div class="about-card" style="flex: 1;">
                        <a href="{{ route('service.details', ['type' => $service->type, 'slug' => $service->slug]) }}">
                            <div class="icon">
                                <img src="{{ asset($service->icon) }}" alt="icon">
                            </div>
                        </a>
                        <h4>{{ $service->getLocalizedName() }}</h4>
                        <p>{{ $service->getLocalizedDescription() }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</section>

<div class="real-stories">
    <div class="ai-header">
        <h1 class="ai-section-heading">{{ $homeupdate->getLocalizedRealStoriesTitle() }}</h1>
        <p class="ai-section-text">{{ $homeupdate->getLocalizedRealStoriesDesc() }}</p>
    </div>
  <div class="testimonialContainer">
    <div class="testimonialTrack">
        <div class="testimonialRow" id="testimonialRow">
            @foreach ($testimonials as $testimonial)
            <div class='testimonialCard'>
                <div class='testimonialAuthor'>
                    <div class='authorInfo'>
                        <h4>{{ $testimonial->getLocalizedName() }}</h4>
                    </div>
                    <div class='quoteIcon'>
                        <img src="{{ asset('assets/web/images/commas.png') }}" alt="quote" />
                    </div>
                </div>
                <p>{{ $testimonial->getLocalizedMessage() }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

</div>
<div class="dealContainers">
    <div class="dealContainersBgImage">
        <img src="images/aiservicescardsbg.png" alt="">
    </div>
    <div class="descriptiodealContainers">
        <h1>{{ $homeupdate->getLocalizedAiSectionTitle() }}</h1>
        <p>{{ $homeupdate->getLocalizedAiSectionDesc() }}</p>
    </div>
    <div class="aiservicesAll">
        @foreach ($aideals as $deal)
        <div class="aiservicescards">
            <div class="aiservicescardsimg">
                <img src="{{ asset($deal->image) }}" alt="image">
            </div>
            <div class="aiservicescardstext">
                <h1>{{ $deal->getLocalizedName() }}</h1>
                <p>{{ $deal->getLocalizedDesc() }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="technologies">
    <div class="ai-header">
        <h1 class="ai-section-heading">{{ $homeupdate->getLocalizedTechnologySectionTitle() }}</h1>
        <p class="ai-section-text">{{ $homeupdate->getLocalizedTechnologySectionDesc() }}</p>
    </div>
    @if (isset($technologies) && $technologies->count())
   <div class="technologies-wrapper">
    <div class="tech-row" id="techRowLeft">
        @foreach ($technologies as $index => $tech)
        @if ($index % 2 == 0)
        <div class="tech-card">
            <div class="tech-icon">
                <img src="{{ asset($tech->image) }}" alt="image">
            </div>
            {{ $tech->name }}
        </div>
        @endif
        @endforeach
    </div>

    <div class="tech-row" id="techRowRight">
        @foreach ($technologies as $index => $tech)
        @if ($index % 2 != 0)
        <div class="tech-card">
            <div class="tech-icon">
                <img src="{{ asset($tech->image) }}" alt="image">
            </div>
            {{ $tech->name }}
        </div>
        @endif
        @endforeach
    </div>
</div>

    @else
    <p>No technologies found.</p>
    @endif

</div>
<section class="generative-ai">
    <div class="text-area">
        <div class="text">
            <h1 class="title">{{ $homeupdate->getLocalizedGenerativeAiExcellenceTitle() }}</h1>
            <p class="des">{{ $homeupdate->getLocalizedGenerativeAiExcellenceDesc() }}</p>
        </div>
    </div>
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
            <div style="position: relative;height: 100%; width: 100%;">
                <div class="borders5">
                     <img src="https://zalvant.com/assets/web/images/Group_1000006059-removebg-preview.png" alt="preview">
                 </div>
             </div>
        </div>
      
         <!--<div class="bgaimaincontainer">-->
         <!--    <img src="{{ asset('assets/web/images/Ellipse 240.pn') }}" alt="Ellipse">-->
         <!--    </div> -->
    </div>

</section>
<div class="recent-work">
    <div class="ai-header">
        <h1 class="ai-section-heading">{{ $homeupdate->getLocalizedPortfolioSectionTitle() }}</h1>
        <p class="ai-section-text">{{ $homeupdate->getLocalizedPortfolioSectionDesc() }}</p>
    </div>
    <div class="project-cards-wrapper">
        @foreach ($portfolio as $portfolios)
        <div class="project-big-card">
            <div class="card-text-area">
                <div class="nmbr">
                    <h6 class="card-nmbr">{{ $portfolios->home_page_order }}</h6>
                </div>
                <div class="description">
                    <h1 class="project-card-title">{{ $portfolios->getLocalizedMainTitle() }}</h1>
                    <p class="project-card-des">{{ Str::limit($portfolios->getLocalizedMainDescription(), 100) }}</p>
                    <div>
                        <a class="button" href="{{ route('portfolio.details', $portfolios->slug) }}"
                            class="top-service-btn"> View Full Case Study </a>
                    </div>
                </div>
            </div>
            <div class="project-img">
                <img src="{{ asset($portfolios->banner_image) }}" alt="banner_image">
            </div>
        </div>
        @endforeach
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