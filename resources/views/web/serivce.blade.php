@extends('layouts.web')
<style>
    .service-banner {
        display: block !important;
    }

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

    .service-banner {
        position: relative;
    }

    .logo-container {
        background-image: url(images/Group\ 1000004866.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        bottom: -19px;
        height: 350px;
        width: 670px;
        left: 24%;
    }

    .service-logo {
        height: 110px;
        width: 250px;
    }

    .service-logo img {
        height: 100%;
        width: 100%;
        object-fit: contain;
    }

    .service-banner .service-div {
        height: 35px;
        width: 110px;
        position: absolute;
    }

    .service-div img {
        height: 100%;
        width: 100%;
        object-fit: contain;
    }

    .service-banner .ui-design {
        bottom: 25px;
        left: 40px;
    }

    .service-banner .mobile-app {
        bottom: 25px;
        right: 40px;
    }

    .service-banner .web-design {
        bottom: 50%;
        left: 11%;
    }

    .service-banner .social-media {
        bottom: 50%;
        right: 6%;
    }

    .service-banner .ai-dev {
        top: -15%;
        left: 44%;
    }

    .dot {
        position: absolute;
        height: 8px;
        width: 8px;
        background-color: #0188D0;
        border-radius: 50%;
    }

    .dot1 {
        bottom: 4px;
        left: 8%;
    }

    .dot2 {
        top: 44%;
        left: 22.8%;
    }

    .dot3 {
        top: -3px;
        left: 49.5%;
    }

    .dot4 {
        top: 44%;
        right: 22.8%;
    }

    .dot5 {
        bottom: 4px;
        right: 8%;
    }

    .curveborder {
        position: relative;
    }

    .curveborder img {
        width: 100%;
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

    .service-container,
    .service-container2 {
        padding: 80px 80px;
        display: flex;
        flex-wrap: wrap;
        align-items: start;
        position: relative;
        background-image: url(images/About\ Us\ \(1\).png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }


    .service-banner .ui-design {
        bottom: 25px;
        left: 40px;
    }

    .service-banner .mobile-app {
        bottom: 25px;
        right: 40px;
    }

    .service-banner .web-design {
        bottom: 50%;
        left: 11%;
    }

    .service-banner .social-media {
        bottom: 50%;
        right: 6%;
    }

    .service-banner .ai-dev {
        top: 2%;
        left: 44%;
    }
</style>
@section('meta_title', $servicesupdate->getLocalizedMetaTitle())
@section('meta_desc', $servicesupdate->getLocalizedMetaDesc())
@section('meta_keyword', $servicesupdate->getLocalizedMetaKeyword())
@section('content')
<!--<div class="service-banner">-->
<!--    <div class="banner-text">-->
<!--        <h1 class="banner-title">{{ $servicesupdate->main_title }}</h1>-->
<!--        <p class="banner-des">{{ $servicesupdate->main_desc }}</p>-->
<!--    </div>-->
<!--    <div class="banner-images">-->
<!--        <div class="border">-->
<!--            <img src="{{ asset('assets/web/images/Ellipse 1093 (1).png') }}" class="border-img" alt="">-->
<!--            <div class="mbl icon-div">-->
<!--                <img src="{{ asset('assets/web/images/messege.png') }}" alt="">-->
<!--            </div>-->
<!--            <div class="cpu icon-div">-->
<!--                <img src="{{ asset('assets/web/images/Group 33.png') }}" alt="">-->
<!--            </div>-->
<!--            <div class="layers icon-div">-->
<!--                <img src="{{ asset('assets/web/images/layers.png') }}" alt="">-->
<!--            </div>-->
<!--            <div class="scoop icon-div">-->
<!--                <img src="{{ asset('assets/web/images/Scoop.png') }}" alt="">-->
<!--            </div>-->
<!--            <div class="d-shape">-->
<!--                <div class="m-logo">-->
<!--                    <img src="{{ asset('assets/web/images/bmlogo.png') }}" alt="">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="bottom-div">-->
<!--                <div class="sm-icon">-->
<!--                    <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
<!--                </div>-->
<!--                <div class="sm-icon">-->
<!--                    <img src="{{ asset('assets/web/images/video player.png') }}" alt="">-->
<!--                </div>-->
<!--                <div class="sm-icon">-->
<!--                    <img src="{{ asset('assets/web/images/people.png') }}" alt="">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="banner">
    <div class="banner-header">
        <h1 class="banner-title">{{ $servicesupdate->getLocalizedMainTitle() }}</h1>
        <p class="banner-des">{{ $servicesupdate->getLocalizedMainDesc() }}</p>
    </div>
    <div class="service-banner service-bannerrs2">
        <div class="small-service ui-design">
            <div class="service-icon">
                <img src="{{ asset('assets/web/images/imgi_21_1748870857-683da6c9ce7ed.png') }}" alt="imgi">
            </div>
            {{ __('web.service_types.ui_design') }}
        </div>
        <div class="small-service web-design">
            <div class="service-icon">
                <img src="images/desktop.png" alt="desktop">
            </div>
            {{ __('web.service_types.web_design') }}
        </div>
        <div class="small-service ai-dev">
            <div class="service-icon">
                <img src="{{ asset('assets/web/images/imgi_21_1748870857-683da6c9ce7ed.png') }}" alt="imgi">
            </div>
            {{ __('web.service_types.ai_development') }}
        </div>
        <div class="small-service social-media">
            <div class="service-icon">
                <img src="images/Rocket.png" alt="Rocket">
            </div>
            {{ __('web.service_types.social_media') }}
        </div>
        <div class="small-service mobile-app">
            <div class="service-icon">
                <img src="{{ asset('assets/web/images/imgi_6_Mobile.png') }}" alt="imgi">
            </div>
            {{ __('web.service_types.mobile_app') }}
        </div>
        <div class="curveborder">
            <img src="https://azeetechnology.com/assets/web/images/border-curve.png" class="" alt="border-curve">
            <div class="dot dot1"></div>
            <div class="dot dot2"></div>
            <div class="dot dot3"></div>
            <div class="dot dot4"></div>
            <div class="dot dot5"></div>
        </div>

        <div class="logo-container">
            <div class="service-logo">
                <img src="https://zalvant.com/assets/web/images/Group_1000006059-removebg-preview.png" alt="preview">
            </div>
        </div>
    </div>
</div>
<div class="about-section">
    <div class="description">
        <h1>{{ $servicesupdate->getLocalizedOfferTitle() }}</h1>
        <p>{{ $servicesupdate->getLocalizedOfferDesc() }}</p>
    </div>
    <div class="about-cards-container">
        @foreach ($services as $service)
        <div class="about-card">
            <a href="{{ route('service.details', ['type' => $service->type, 'slug' => $service->slug]) }}">
                <div class="icon">
                    <img src="{{ asset($service->icon) }}" alt="icon">
                </div>
            </a>
            <h4>{{ $service->getLocalizedName() }}</h4>
            <p>{{ Str::limit($service->getLocalizedDescription(), 100) }}</p>
        </div>
        @endforeach
    </div>
</div>
<div class="technologies">
    <div class="ai-header">
        <h1 class="ai-section-heading">{{ $servicesupdate->getLocalizedTechnologyTitle() }}</h1>
        <p class="ai-section-text">{{ $servicesupdate->getLocalizedTechnologyDesc() }}</p>
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
<div class="dealContainers">
    <div class="dealContainersBgImage">
        <img src="{{ asset('assets/web/images/aiservicescardsbg.png') }}" alt="aiservicescardsbg">
    </div>
    <div class="descriptiodealContainers">
        <h1>{{ $servicesupdate->getLocalizedDealAiTitle() }}</h1>
        <p>{{ $servicesupdate->getLocalizedDealAiDesc() }}</p>
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
@endsection