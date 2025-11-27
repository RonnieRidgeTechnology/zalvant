@extends('layouts.web')
<style>
    .banner {
    margin-top: 20px;
}

select option{
    color: black;
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
@section('meta_title', $contactupdate->getLocalizedMetaTitle())
@section('meta_desc', $contactupdate->getLocalizedMetaDescription())
@section('meta_keyword', $contactupdate->getLocalizedMetaKeywords())
@section('content')
  <div class="banner contact-banner">
        <div class="banner-header">
            <h1 class="banner-title">{{ $contactupdate->getLocalizedName() }}</h1>
            <p class="banner-des">{{ $contactupdate->getLocalizedDesc() }}</p>
        </div>
    </div>
    <div class="contact-container">
        <div class="contact-card">
            <div class="icon">
                <img src="{{ asset('assets/web/images/messege.png') }}" alt="messege">
            </div>
            <h4>{{ __('web.contact.call_us') }}</h4>
            <p><a href="tel:+{{ $websetting->phone }}">+{{ $websetting->phone }}</a></p>
        </div>
        <div class="contact-card">
            <div class="icon">
                <img src="{{ asset('assets/web/images/Group 30.png') }}" alt="Group 30">
            </div>
            <h4>{{ __('web.contact.mail') }}</h4>
            <p><a href="mailto:{{ $websetting->email }}">{{ $websetting->email }}</a></p>
        </div>
        <div class="contact-card">
            <div class="icon">
                <img src="{{ asset('assets/web/images/pin.png') }}" alt="pin">
            </div>
            <h4>{{ __('web.contact.location') }}</h4>
            <p>
                <a href="https://www.google.com/maps/search/?q={{ urlencode($websetting->getLocalizedAddress()) }}" target="_blank">
                    {{ $websetting->getLocalizedAddress() }}
                </a>
            </p>
        </div>
    </div>
    <div class="contact-form">
        <div class="ai-header">
            <h1>{{ __('web.contact.lets_talk') }}</h1>
            <p>{{ __('web.contact.lets_talk_desc') }}</p>
        </div>
      <form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div class="input-row">
    <div class="field">
    <label for="">{{ __('web.contact.your_name') }}</label>
    <input type="text" name="name" placeholder="{{ __('web.contact.name_placeholder') }}" required>
</div>
<div class="field">
    <label for="">{{ __('web.contact.your_email') }}</label>
    <input type="email" name="email" placeholder="{{ __('web.contact.email_placeholder') }}" required>
</div>
<div class="field">
    <label for="">{{ __('web.contact.phone_number') }}</label>
    <input type="number" name="phone" placeholder="{{ __('web.contact.phone_placeholder') }}" required>
</div>
</div>
<div class="input-row">
    <div class="field">
        <label for="">{{ __('web.contact.company') }}</label>
        <input type="text" name="company" placeholder="{{ __('web.contact.company_placeholder') }}">
    </div>

        <div class="field">
            <label for="">{{ __('web.contact.services') }}</label>
            <select name="service_id" required>
                <option value="">{{ __('web.contact.select_service') }}</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->getLocalizedName() }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="input-row">
       <div class="field">
    <label for="">{{ __('web.contact.message') }}</label>
    <input type="text" name="message" placeholder="{{ __('web.contact.message_placeholder') }}">
</div>
</div>
<div class="input-row">
    <button type="submit" class="button">{{ __('web.contact.send') }}</button>
</div>

</form>

    </div>
@endsection
