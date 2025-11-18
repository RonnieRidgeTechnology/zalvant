@extends('layouts.web')
<style>
    .orbit-section {
    position: relative;
    /* width: 100%; */
    top: -115px;
}
.alltechnologys {
    padding-top: 100px !important;
}



   .zalvant-form-section {
          padding: 0;
          min-height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        }
        .zalvant-form-container {
          background: rgba(1,0,52,0.98);
          border-radius: 24px;
          box-shadow: 0 8px 32px 0 #005bd755, 0 1.5px 8px #0002;
          display: flex;
          width: 87%;
          overflow: hidden;
          margin: 40px 0;
        }
        .zalvant-form-image-side {
          background: #005BD7;
          min-width: 50%;
          max-width: 350px;
          position: relative;
          display: flex;
          flex-direction: column;
          justify-content: flex-end;
          align-items: center;
          padding: 0;
        }
        .zalvant-form-image {
          width: 100%;
          height: 100%;
          object-fit: cover;
          min-height: 100%;
          display: block;
          filter: brightness(0.85) contrast(1.1);
        }
        .zalvant-form-image-overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          width: 92%;
          background: linear-gradient(0deg, #010034ee 80%, #005BD7cc 100%);
          color: #fff;
          padding: 36px 24px 24px 24px;
          text-align: left;
          z-index: 2;
          border-bottom-left-radius: 24px;
        }
        .zalvant-form-image-overlay svg {
          margin-bottom: 12px;
          display: block;
        }
        .zalvant-form-image-overlay h2 {
          font-size: 1.5rem;
          font-weight: 700;
          margin: 0 0 6px 0;
          letter-spacing: 0.5px;
        }
        .zalvant-form-image-overlay p {
          font-size: 1rem;
          margin: 0;
          opacity: 0.85;
        }
        .zalvant-dark-form {
          flex: 1;
          padding: 48px 36px 36px 36px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          background: transparent;
        }
        .zalvant-form-group {
          display: flex;
          flex-direction: column;
          margin-bottom: 22px;
          position: relative;
        }
        .zalvant-form-group label {
          color: #b3c7f7;
          font-size: 1rem;
          font-weight: 500;
          margin-bottom: 7px;
          display: flex;
          align-items: center;
          gap: 7px;
          letter-spacing: 0.2px;
        }
        .zalvant-form-group input,
        .zalvant-form-group select,
        .zalvant-form-group textarea {
          background: #010034;
          color: #fff;
          border: 1.5px solid #005BD7;
          border-radius: 8px;
          padding: 12px 14px;
          font-size: 1rem;
          margin-top: 2px;
          outline: none;
          transition: border 0.2s, box-shadow 0.2s;
          box-shadow: 0 1.5px 8px #005bd71a;
        }
        .zalvant-form-group input:focus,
        .zalvant-form-group select:focus,
        .zalvant-form-group textarea:focus {
          border-color: #fff;
          box-shadow: 0 0 0 2px #005BD7;
        }
        .zalvant-form-group select {
          appearance: none;
          background-image: url('data:image/svg+xml;utf8,<svg fill="none" stroke="%23005BD7" stroke-width="2" viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l6 6 6-6"/></svg>');
          background-repeat: no-repeat;
          background-position: right 12px center;
          background-size: 20px 20px;
          cursor: pointer;
        }
        .zalvant-form-group textarea {
          resize: vertical;
          min-height: 70px;
          max-height: 180px;
        }
        .zalvant-form-btn {
          background: linear-gradient(90deg, #005BD7 60%, #010034 100%);
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 14px 0;
          font-size: 1.1rem;
          font-weight: 600;
          letter-spacing: 0.5px;
          cursor: pointer;
          margin-top: 8px;
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
          box-shadow: 0 2px 12px #005bd73a;
          transition: background 0.2s, transform 0.15s;
        }
        .zalvant-form-btn:hover, .zalvant-form-btn:focus {
          background: linear-gradient(90deg, #010034 40%, #005BD7 100%);
          transform: translateY(-2px) scale(1.03);
        }
        .zalvant-form-success {
          margin-top: 24px;
          background: #005bd7cc;
          color: #fff;
          border-radius: 8px;
          padding: 18px 16px;
          display: flex;
          align-items: center;
          gap: 12px;
          font-size: 1.1rem;
          font-weight: 500;
          box-shadow: 0 2px 12px #005bd73a;
          animation: fadeIn 0.7s;
        }
        @keyframes fadeIn {
          from { opacity: 0; transform: translateY(10px);}
          to { opacity: 1; transform: none;}
        }
        @media (max-width: 900px) {
          .zalvant-form-container {
            flex-direction: column;
            max-width: 98vw;
          }
          .zalvant-form-image-side {
            min-width: 100%;
            max-width: 100%;
            height: 420px;
          }
          .zalvant-form-image {
            height: 220px;
          }
          .zalvant-form-image-overlay {
            padding: 24px 16px 16px 16px;
            border-radius: 0 0 24px 24px;
          }
          .zalvant-dark-form {
            padding: 32px 16px 24px 16px;
          }
        }
        @media (max-width: 600px) {
          .zalvant-form-container {
            margin: 0;
            border-radius: 0;
          }
          .zalvant-form-image-side {
            border-radius: 0;
          }
          .zalvant-form-image-overlay {
            border-radius: 0 0 16px 16px;
          }
          .zalvant-dark-form {
            padding: 20px 6vw 16px 6vw;
          }
        }
        .maintformsection{
            background: linear-gradient(2deg, #010034 70%, #005BD7 100%);
        }

        .sectiontestss h1{
            margin: 0;
            text-align: center;
            color: white;
            padding: 30px 0px 0px 0px;
            font-size: 30px;
        }
        .sectiontestss p{
            margin: 0;
            padding: 14px 0px 0px 0px;
            text-align: center;
            color: white;
            line-height: 24px;
        }
        .sectiontestss{
            width: 75%;
            margin: auto;
        }
        /* Removed .zalvant-form-lang-switch and related button styles */
        .zalvant-form-required {
            color: #ff5252;
            margin-left: 2px;
        }
        .zalvant-form-group .zalvant-form-required {
            font-size: 1.1em;
        }
        .zalvant-form-note {
            color: #b3c7f7;
            font-size: 0.95em;
            margin-bottom: 10px;
        }
        
        
          .stats-sectioncustonC {
            padding: 64px 20px 84px;
            background: linear-gradient(180deg, #010034 0%, #02023f 40%, #004ab7 140%);
        }

        .stats-wrapcustonC {
            max-width: 92%;
            margin: 0 auto;
        }

        .eyebrowcustonC {
            letter-spacing: .18em;
            text-transform: uppercase;
            font-weight: 700;
            color: #8faaf0;
            font-size: .78rem;
            margin-bottom: 8px;
        }

        .titlecustonC {
            font-size: 38px;
            line-height: 1.15;
            margin: 0 0 28px;
            font-weight: 600;
            color: white;
            text-align: center;
        }

        .subtitlecustonC {
            color: #cfe0ff;
            max-width: 760px;
            font-size: 14px;
            text-align: center;
            margin: 0px auto;
            padding-bottom: 40px;
        }

        .gridcustonC {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        @media (max-width:1024px) {
            .gridcustonC {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width:560px) {
            .gridcustonC {
                grid-template-columns: 1fr;
            }
        }
</style>
@section('meta_title', $portfolio->getLocalizedMetaTitle())
@section('meta_desc', $portfolio->getLocalizedMetaDescription())
@section('meta_keyword', $portfolio->getLocalizedMetaKeywords())
@section('content')
    <div class="service-banner2" style="align-items: anchor-center !important;">
        <div class="banner-text">
            <h1 class="banner-title">{{ $portfolio->getLocalizedMainTitle() }}</h1>
            <p class="banner-des">{{ $portfolio->getLocalizedMainDescription() }}</p>
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
    <div class="alltechnologys">
        @foreach ($portfolio->technologies as $technology)
            <div class="technologycards">
                <div class="technologycardsimage">
                    <img src="{{ asset( $technology->image) }}" alt="{{ $technology->banner_image_alt }}">
                </div>
                <div class="technologycardsimagetitle">
                    <h1>{{ $technology->name }}</h1>
                </div>
            </div>
        @endforeach
    </div>
    <div class="maintformsection" style="margin-top: 20px;">
    <div class="sectiontestss">
        <h1 id="zalvant-form-title">{{ $banner?->getLocalizedBannerHeadTitle() ?? 'Get Started with Zalvant' }}</h1>
        <p id="zalvant-form-desc">
            {{ $banner?->getLocalizedBannerHeadPara() ?? 'Transform your digital presence with our expert solutions' }}</p>
    </div>
    <section class="zalvant-form-section">
        <div class="zalvant-form-container">
            <div class="zalvant-form-image-side">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80" alt="Zalvant Digital Solutions" class="zalvant-form-image">
                <div class="zalvant-form-image-overlay">
                    <svg width="48" height="48" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="16" rx="2" fill="#005BD7" stroke="#005BD7" />
                        <path d="M8 2v4M16 2v4" stroke="#fff" />
                        <path d="M3 10h18" stroke="#fff" />
                    </svg>
                    <h2 id="zalvant-form-overlay-title">{{ $banner?->getLocalizedBannerFooterTitle() ?? 'Ready to Start?' }}</h2>
                    <p id="zalvant-form-overlay-desc">{{ $banner?->getLocalizedBannerFooterPara() ?? 'Book your consultation today' }}</p>
                </div>
            </div>
            <form class="zalvant-dark-form" id="zalvantContactForm" autocomplete="off" action={{route('landing.submit')}} method="post">
                @csrf
                <!-- Language switch removed -->
                <div class="zalvant-form-note" id="zalvant-form-note">
                    <span>{{ $formLabels?->getLocalizedRequiredNote() ?? 'Velden gemarkeerd met * zijn vereist.' }}</span>
                </div>
                <div class="zalvant-form-group">
                    <label for="name">
                        <svg width="20" height="20" fill="none" stroke="#005BD7" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 20v-2a8 8 0 0 1 16 0v2" />
                        </svg>
                        <span id="zalvant-label-name">{{ $formLabels?->getLocalizedNameLabel() ?? '' }}</span>
                        <span class="zalvant-form-required">*</span>
                    </label>
                    <input type="text" id="name" name="name" placeholder="{{ $formLabels?->getLocalizedNamePlaceholder() ?? 'Jouw naam' }}" required>
                </div>
                <div class="zalvant-form-group">
                    <label for="email">
                        <svg width="20" height="20" fill="none" stroke="#005BD7" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path d="M3 7l9 6 9-6" />
                        </svg>
                        <span id="zalvant-label-email">{{ $formLabels?->getLocalizedEmailLabel() ?? '' }}</span>
                        <span class="zalvant-form-required">*</span>
                    </label>
                    <input type="email" id="email" name="email" placeholder="{{ $formLabels?->getLocalizedEmailPlaceholder() ?? '' }}" required>
                </div>
                <div class="zalvant-form-group">
                    <label for="phone">
                        <svg width="20" height="20" fill="none" stroke="#005BD7" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 16.92V19a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3 5.18 2 2 0 0 1 5 3h2.09a2 2 0 0 1 2 1.72c.13 1.05.37 2.07.72 3.06a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.99.35 2.01.59 3.06.72A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <span id="zalvant-label-phone">{{ $formLabels?->getLocalizedPhoneLabel() ?? '' }}</span>
                    </label>
                    <input type="tel" id="phone" name="phone" placeholder="{{ $formLabels?->getLocalizedPhonePlaceholder() ?? '' }}">
                </div>
                <div class="zalvant-form-group">
                    <label for="service">
                        <svg width="20" height="20" fill="none" stroke="#005BD7" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="7" width="20" height="14" rx="2" />
                            <path d="M16 3v4M8 3v4" />
                        </svg>
                        <span id="zalvant-label-service">{{ $formLabels?->getLocalizedServiceLabel() ?? '' }}</span>
                        <span class="zalvant-form-required">*</span>
                    </label>
                    <select id="service" name="service_id" required>
                        <option value="" disabled selected>{{ $formLabels?->getLocalizedServicePlaceholder() ?? '' }}</option>
                        <option>{{ __('web.services_cards.digital_marketing') }}</option>
                        <option>{{ __('web.services_cards.web_development') }}</option>
                        <option>{{ __('web.services_cards.mobile_app') }}</option>
                        <option>SEO</option>
                        <option>{{ __('web.services_cards.social_media') }}</option>
                        <option>{{ __('web.services_cards.ui_design') }}</option>
                        <option>{{ __('web.services_menu.ai_development') }}</option>
                        <option>WordPress {{ __('web.services_cards.web_development') }}</option>
                        <option>{{ __('web.footer.others') }}</option>
                    </select>
                </div>
                <div class="zalvant-form-group">
                    <label for="message">
                        <svg width="20" height="20" fill="none" stroke="#005BD7" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                        <span id="zalvant-label-message">{{ $formLabels?->getLocalizedMessageLabel() ?? 'Vertel ons over uw project of uitdaging' }}</span>
                        <span class="zalvant-form-required">*</span>
                    </label>
                    <textarea id="message" name="message" rows="3" placeholder="{{ $formLabels?->getLocalizedMessagePlaceholder() ?? 'Hoe kunnen wij u helpen?' }}" required></textarea>
                </div>
                <button type="submit" class="zalvant-form-btn" id="zalvant-form-btn">
                    <svg width="20" height="20" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 2L11 13" />
                        <path d="M22 2l-7 20-4-9-9-4 20-7z" />
                    </svg>
                    <span id="zalvant-btn-text">{{ $formLabels?->getLocalizedSubmitButton() ?? 'Bericht verzenden' }}</span>
                </button>
                <div class="zalvant-form-success" id="zalvantFormSuccess" style="display:none;">
                    <svg width="24" height="24" fill="none" stroke="#00e676" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="#00e676" />
                        <path d="M8 12l3 3 5-5" stroke="#00e676" />
                    </svg>
                    <span id="zalvant-success-msg">{{ $formLabels?->getLocalizedSuccessMessage() ?? 'Bedankt! We nemen zo snel mogelijk contact met u op.' }}</span>
                </div>
            </form>
        </div>
    </section>
    </div>
  <div style="width: 100%; margin-top: 50px;">
    <img src="{{ asset($portfolio->main_image) }}"
         alt="{{ $technology->main_image_alt }}"
         style="width: 100%; height: auto; object-fit: cover; display: block;">
</div>
@endsection
