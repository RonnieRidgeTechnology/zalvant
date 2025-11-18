@extends('layouts.web')
@section('meta_title', $aboutus->getLocalizedMetaTitle())
@section('meta_desc', $aboutus->getLocalizedMetaDesc())
@section('meta_keyword', $aboutus->getLocalizedMetaKeywords())
@section('content')
    <div class="service-banner2">
        <div class="banner-text">
            <h1 class="banner-title">{{ $aboutus->getLocalizedMainTitle() }}</h1>
            <p class="banner-des">{{ $aboutus->getLocalizedMainDesc() }}</p>
        </div>
        <div class="banner-images">
           
             <div class="orbit-section">
        <div class="border1">
            <img src="{{asset('assets/web/images/imgi_28_Vue.js_Logo_2 1 (1).png')}}" class="vue small-icon" alt="img20">
            <img src="{{asset('assets/web/images/imgi_29_Node.js_logo_2015 1 (1) (1).png')}}" class=" small-icon node" alt="img21">
            <img src="{{asset('assets/web/images/imgi_30_physics2 (1) (1) (1) (1) (1).png')}}" class="react small-icon" alt="img21">
        </div>
        <div class="border2">
            <img src="{{asset('assets/web/images/imgi_31_sass1 (1) (2).png')}}" class="small-icon sass" alt="img23">
            <img src="{{asset('assets/web/images/imgi_32_NET_Core_Logo 1 (1) (2).png')}}" class="small-icon net" alt="img24">
            <img src="{{asset('assets/web/images/imgi_33_Angular_full_color_logo 1 (1) (1).png')}}" class="small-icon angular" alt="img25">
        </div>
        <div class="border3">
            <img src="{{asset('assets/web/images/imgi_34_php 2 (2) (1).png')}}" class=" small-icon php" alt="img26">
            <img src="{{asset('assets/web/images/imgi_35_python 1 (1) (2).png')}}" class=" small-icon python" alt="img27">
            <img src="{{asset('assets/web/images/imgi_36_java 1 (1) (1) (1) (1) (1) (1) (1).png')}}" class=" small-icon java" alt="img28">
        </div>
        <div class="border4">
        </div>
        <div class="center-circle">
            <img src="{{asset('assets/web/images/Group_1000006059-removebg-preview.png')}}" alt="img29">
        </div>
    </div>
        </div>
    </div>
    <div class="ourJourney">
        <div class="ourJourneycontainer">
            <div class="ourJourneyLeft">
                <h1>{{ $aboutus->getLocalizedJourneyTitle() }}</h1>
                <p>{{ $aboutus->getLocalizedJourneyDesc() }}</p>
            </div>
            <div class="ourJourneyright">
                <div class="ourJourneyrightcounting-container">
                    <div class="countingcrdsss">
                        <h1>{{ $aboutus->satisfied_clients }}+</h1>
                        <p>Satisfied Clients</p>
                    </div>
                    <div class="countingcrdsss">
                        <h1>{{ $aboutus->finished_projects }}+</h1>
                        <p>Finished Projects</p>
                    </div>
                    <div class="countingcrdsss">
                        <h1>{{ $aboutus->skilled_experts }}+</h1>
                        <p>Skilled Experts</p>
                    </div>
                    <div class="countingcrdsss">
                        <h1>{{ $aboutus->years_of_experience }}+</h1>
                        <p>Years of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="coreValues">
        <div class="ourJourneycontainer2">
            <div class="toptext">
                <h1>{{ $aboutus->getLocalizedCoreValuesTitle() }}</h1>
                <p>{{ $aboutus->getLocalizedCoreValuesDesc() }}</p>
            </div>
            <div class="corecardcontainer">
                @foreach ($core_values as $value)
                    <div class="corecardss">
                        <h1>{{ $value->getLocalizedName() }}</h1>
                        <p>{{ $value->getLocalizedDesc() }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="whyChooseus">
        <div class="ourJourneycontainer2">
            <div class="toptext">
                <h1>{{ $aboutus->getLocalizedWhyChooseUsTitle() }}</h1>
                <p>{{ $aboutus->getLocalizedWhyChooseUsDesc() }}</p>
            </div>
            <div class="whyChooseusmainContianer">
                @foreach ($why_choose_us as $item)
                    <div class="whyChooseuscards">
                        <h1>{{ $item->getLocalizedName() }}</h1>
                        <p>{{ $item->getLocalizedDesc() }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
