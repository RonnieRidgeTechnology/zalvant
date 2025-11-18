@extends('layouts.web')
<style>
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
</style>
@section('meta_title', $portfolioupdate->getLocalizedMetaTitle())
@section('meta_desc', $portfolioupdate->getLocalizedMetaDesc())
@section('meta_keyword', $portfolioupdate->getLocalizedMetaKeywords())
@section('content')
    <!--<div class="service-banner">-->
    <!--    <div class="banner-text">-->
    <!--        <h1 class="banner-title">{{ $portfolioupdate->main_title }}</h1>-->
    <!--        <p class="banner-des">{{ $portfolioupdate->main_desc }}</p>-->
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
        <div class="banner-header" style="padding: 80px 80px 0;">
            <h1 class="banner-title">{{ $portfolioupdate->getLocalizedMainTitle() }}</h1>
            <p class="banner-des">{{ $portfolioupdate->getLocalizedMainDesc() }}</p>
        </div>
    </div>
    <div class="offringai3sss>
        <div class="topaiservicrs">
        <!--<div class="bannerTextMain2">-->
        <!--    <div class="text-logo">-->
        <!--        <img src="{{ asset('assets/web/image/Rlogo.png') }}" alt="">-->
        <!--        <p>Top Services</p>-->
        <!--    </div>-->
        <!--    <div class="bannerText">-->
        <!--        <h1>{{ $portfolioupdate->section1_title }}</h1>-->
        <!--        <p style="line-height: 30px; margin: 0;">{{ $portfolioupdate->section1_desc }}</p>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="blogs-card-main">
            @foreach ($portfolios as $portfolio)
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
                        <a href="{{ route('portfolio.details',$portfolio->slug) }}">
                            <div class="blog-text">
                                <span>{{ $portfolio->home_page_order }}</span>
                                <h1>{{ $portfolio->getLocalizedMainTitle() }}</h1>
                                <p>{{ Str::limit($portfolio->getLocalizedMainDescription(), 100) }}</p>
                            </div>
                            <div class="blog-images">
                                <img style="width: 100%;" src="{{ asset( $portfolio->banner_image) }}"
                                    alt="{{ $portfolio->banner_image_alt}}">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
