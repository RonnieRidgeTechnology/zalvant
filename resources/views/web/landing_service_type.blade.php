@extends('layouts.web')
@php
$contactPhone = $webset->phone ?? '31687876543';
$normalizedPhone = preg_replace('/\D+/', '', $contactPhone);
$whatsMessage = $webset->whatsapp_text ?? 'Hello! I visited your website.';
$encodedWhatsMessage = rawurlencode($whatsMessage);
$whatsappUrl = $normalizedPhone ? 'https://api.whatsapp.com/send?phone=' . $normalizedPhone . '&text=' . $encodedWhatsMessage : '#';
$callUrl = $normalizedPhone ? 'tel:+' . $normalizedPhone : '#';
@endphp
<style>
    .mobile-consl {
        display: none;
    }

    .language-menu {
        margin-right: 100px;
        margin-top: 20px;
    }

    .header-action-button {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.25);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: rgba(255, 255, 255, 0.08);
        transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        text-decoration: none;
    }

    .header-action-button svg {
        width: 20px;
        height: 20px;
    }

    .header-action-button:hover {
        transform: translateY(-2px);
        border-color: rgba(255, 255, 255, 0.45);
    }

    .header-action-button.whatsapp {
        background: linear-gradient(135deg, #1fa463, #25D366);
        border: none;
        margin-top: 15px;
    }

    .header-action-button.call {
        background: linear-gradient(135deg, #0f6bff, #3ea6ff);
        border: none;
        margin-top: 15px;
    }

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
    
    .heroActionA {
        display: grid;
        place-items: center;
        padding: 56px 0px;
        position: relative;
        overflow: hidden;
        isolation: isolate;
        background:
            radial-gradient(1200px 600px at 10% -10%, rgba(255, 255, 255, .10), transparent 60%),
            radial-gradient(1000px 500px at 110% 110%, rgba(0, 74, 183, .35), transparent 40%),
            linear-gradient(160deg, #004ab7 0%, #010034 100%);
    }

    .heroActionA::before,
    .heroActionA::after {
        content: "";
        position: absolute;
        width: 540px;
        height: 540px;
        border-radius: 50%;
        filter: blur(80px);
        opacity: .18;
        z-index: -1;
    }

    .heroActionA::before {
        background: #005fde;
        top: -160px;
        left: -120px;
    }

    .heroActionA::after {
        background: #005fde;
        bottom: -180px;
        right: -120px;
    }

    .cardActionA {
        width: 82%;
        margin: auto;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
        backdrop-filter: saturate(160%) blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 22px;
        padding: 48px;
        box-shadow: 0 40px 80px rgba(0, 0, 0, .45);
        position: relative;
        overflow: hidden;
    }

    .cardActionA::after {
        content: "";
        position: absolute;
        inset: -1px;
        pointer-events: none;
        border-radius: inherit;
        background: radial-gradient(800px 200px at 20% -20%, rgba(255, 255, 255, .20), transparent 35%),
            radial-gradient(600px 160px at 120% 120%, rgba(0, 74, 183, .25), transparent 35%);
        mask: linear-gradient(#000, #000) content-box, linear-gradient(#000, #000);
        -webkit-mask: linear-gradient(#000, #000) content-box, linear-gradient(#000, #000);
        padding: 1px;
    }

    .eyebrowActionA {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase;
        font-size: 12px;
        color: rgba(255, 255, 255, .8);
    }

    .eyebrowActionA .dotActionA {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #004ab7;
        box-shadow: 0 0 0 4px rgba(0, 74, 183, .25);
    }

    .headingActionA {
        margin: 14px 0 12px;
        font-size: 38;
        line-height: 1.15;
        font-weight: 700;
        ;
        background: linear-gradient(90deg, #ffffff 0%, #cfe0ff 45%, #8fb7ff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        text-align: center;
        color: transparent;
    }

    .subActionA {
        margin: 0 0 32px;
        color: rgba(255, 255, 255, .85);
        font-size: clamp(15px, 2.2vw, 18px);
        line-height: 1.6;
        text-align: center;
        font-size: 14px;
    }

    .chipsActionA {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 18px;
        justify-content: center;

    }

    .chipActionA {
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .16);
        font-size: 12px;
        color: rgba(255, 255, 255, .9);
    }

    .actionsActionA {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
    }

    .btnActionA {
        appearance: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 20px;
        border-radius: 14px;
        font-weight: 600;
        border: 1px solid transparent;
        cursor: pointer;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: transform .08s ease, box-shadow .25s ease, background .25s ease, color .25s ease, border-color .25s ease;
        will-change: transform;
    }

    .btnActionA svg {
        width: 18px;
        height: 18px;
    }

    .btnActionA:active {
        transform: translateY(1px);
    }

    .btnActionA .shineActionA {
        position: absolute;
        inset: 0;
        background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .4) 40%, transparent 60%);
        transform: translateX(-120%);
        transition: transform .6s ease;
        pointer-events: none;
    }

    .btnActionA:hover .shineActionA {
        transform: translateX(120%);
    }

    .btnPrimaryActionA {
        background: #ffffff;
        color: #010034;
        box-shadow: 0 12px 28px rgba(0, 0, 0, .25), 0 0 0 1px rgba(255, 255, 255, .3) inset;
    }

    .btnPrimaryActionA:hover {
        box-shadow: 0 16px 36px rgba(0, 0, 0, .35);
    }

    .btnGhostActionA {
        background: transparent;
        color: #ffffff;
        border-color: rgba(255, 255, 255, .28);
    }

    .btnGhostActionA:hover {
        background: rgba(255, 255, 255, .10);
        border-color: rgba(255, 255, 255, .45);
    }

    .noteActionA {
        margin-top: 14px;
        font-size: 12px;
        color: rgba(255, 255, 255, .65);
        text-align: center;
    }

    @media (max-width: 520px) {
        .cardActionA {
            padding: 28px;
            border-radius: 16px;
        }
    }
</style>
<style>
    /* Custom header navigation for landing service type page */
    header:has(.landing-type-select) {
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
    header:has(.landing-type-select) .logo {
        flex-shrink: 0;
        z-index: 1;
        position: relative;
        max-width: 250px;
        margin-right: 20px;
    }

    /* Ensure header-btn (language/consultation) doesn't overlap */
    header:has(.landing-type-select) .header-btn {
        flex-shrink: 0;
        z-index: 10;
        position: relative;
    }

    /* Hide regular nav-menu completely when custom nav is present - multiple selectors to ensure it works */
    header:has(.landing-type-select) .nav-menu,
    header .landing-type-select~.nav-menu,
    body:has(.landing-type-select) header .nav-menu,
    body:has(.landing-type-select) .nav-menu,
    body.has-landing-types-nav header .nav-menu,
    body.has-landing-types-nav .nav-menu,
    .landing-type-select~.nav-menu,
    header .landing-type-select+.nav-menu,
    header .nav-menu:has(~ .landing-type-select),
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
    header .landing-type-select~.nav-menu {
        display: none !important;
    }

    /* Landing type dropdown trigger */
    .landing-type-select {
        display: flex !important;
        align-items: center;
        flex: 1 1 auto;
        margin: 0 30px;
        position: relative;
        z-index: 10;
        margin-top: 12px;
    }

    .landing-type-trigger {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        padding: 10px 20px;
        border-radius: 999px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.2s ease, border-color 0.2s ease;
        min-width: 220px;
        justify-content: center;
    }

    .landing-type-trigger:hover,
    .landing-type-select.open .landing-type-trigger {
        background: rgba(255, 255, 255, 0.18);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .landing-type-trigger svg {
        width: 16px;
        height: 16px;
        transition: transform 0.2s ease;
    }

    .landing-type-select.open .landing-type-trigger svg {
        transform: rotate(180deg);
    }

    .landing-type-options {
        position: absolute;
        top: calc(100% + 14px);
        left: 19%;
        transform: translateX(-50%);
        background: rgba(5, 8, 45, 0.98);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 8px 0;
        list-style: none;
        margin: 0;
        min-width: 260px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        display: none;
        max-height: 320px;
        overflow-y: auto;
        backdrop-filter: blur(8px);
    }

    .landing-type-select.open .landing-type-options {
        display: block;
    }

    .landing-type-options li a {
        display: block;
        padding: 10px 18px;
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        font-weight: 500;
        transition: background 0.2s ease;
        white-space: nowrap;
    }

    .landing-type-options li a:hover {
        background: rgba(255, 255, 255, 0.08);
    }

    /* Hide desktop nav menu on mobile */
    @media (max-width: 1024px) {
        .landing-type-select {
            display: none !important;
        }

        header:has(.landing-type-select) .nav-menu {
            display: block !important;
        }
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
        background: rgba(1, 0, 52, 0.98);
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

    .zalvant-form-btn:hover,
    .zalvant-form-btn:focus {
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
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: none;
        }
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

        .language-menu {
            margin-right: 0px !important;
            margin-top: 0px !important;
        }

        .Mobile-headers {
            margin-right: 52px !important;
            display: block !important;
        }
    }

    .maintformsection {
        background: linear-gradient(2deg, #010034 70%, #005BD7 100%);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const landingSelect = document.querySelector('.landing-type-select');
        if (!landingSelect) {
            return;
        }

        // Hide regular nav-menu when landing type dropdown is present
        document.body.classList.add('has-landing-types-nav');
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
            navMenu.classList.add('hidden-on-landing-page');
        });

        const trigger = landingSelect.querySelector('.landing-type-trigger');
        const options = landingSelect.querySelector('.landing-type-options');

        if (!trigger || !options) {
            return;
        }

        const toggleDropdown = function(forceClose = false) {
            if (forceClose || landingSelect.classList.contains('open')) {
                landingSelect.classList.remove('open');
            } else {
                landingSelect.classList.add('open');
            }
        };

        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            toggleDropdown();
        });

        options.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                toggleDropdown(true);
            });
        });

        document.addEventListener('click', function(e) {
            if (!landingSelect.contains(e.target)) {
                toggleDropdown(true);
            }
        });

        // Inject WhatsApp & call buttons next to language selector
        const headerBtn = document.querySelector('header .header-btn');
        if (headerBtn && !headerBtn.querySelector('.header-whatsapp-button')) {
            const whatsappBtn = document.createElement('a');
            whatsappBtn.href = <?php echo json_encode($whatsappUrl); ?>;
            whatsappBtn.target = '_blank';
            whatsappBtn.rel = 'noopener';
            whatsappBtn.className = 'header-action-button whatsapp header-whatsapp-button';
            whatsappBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg>`;

            const callBtn = document.createElement('a');
            callBtn.href = <?php echo json_encode($callUrl); ?>;
            callBtn.className = 'header-action-button call header-call-button';
            callBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone-ringing"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 2" /><path d="M22 10.5l-2.5 -.5" /><path d="M13.5 2l.5 2.5" /><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2c-8.072 -.49 -14.51 -6.928 -15 -15a2 2 0 0 1 2 -2" /></svg>`;

            headerBtn.insertBefore(callBtn, headerBtn.firstChild);
            headerBtn.insertBefore(whatsappBtn, callBtn);
        }
    });
</script>
@php
$landingTypeMenu = [];
if (isset($landingTypes) && $landingTypes->count() > 0) {
foreach ($landingTypes as $landingType) {
$menuItem = [
'name' => $landingType->getLocalizedName(),
'url' => route('landing.type', $landingType->slug),
];

$landingTypeMenu[] = $menuItem;
}
}
@endphp
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const landingTypeLinks = <?php echo json_encode($landingTypeMenu); ?>;

        const mobileSidebar = document.getElementById('mobileSidebar');
        const landingNavExists = document.querySelector('.landing-type-select');

        if (landingNavExists && mobileSidebar && landingTypeLinks.length) {
            const list = mobileSidebar.querySelector('ul');
            if (list) {
                list.innerHTML = '';

                landingTypeLinks.forEach(function(item) {
                    const li = document.createElement('li');
                    const anchor = document.createElement('a');
                    anchor.href = item.url;
                    anchor.textContent = item.name;
                    li.appendChild(anchor);

                    list.appendChild(li);
                });
            }
        }
    });
</script>
@section('meta_title', $servicesupdate->getLocalizedMetaTitle())
@section('meta_desc', $servicesupdate->getLocalizedMetaDesc())
@section('meta_keyword', $servicesupdate->getLocalizedMetaKeyword())


@push('custom-header-nav')
@if(isset($landingTypes) && $landingTypes->count() > 0)
@php
$currentLandingTypeName = isset($serviceType) ? $serviceType->getLocalizedName() : (isset($landingTypes[0]) ? $landingTypes[0]->getLocalizedName() : __('Select Landing Type'));
@endphp
<div class="landing-type-select">
    <button type="button" class="landing-type-trigger">
        <span>{{ $currentLandingTypeName }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </button>
    <ul class="landing-type-options">
        @foreach($landingTypes as $landingType)
        <li>
            <a href="{{ route('landing.type', $landingType->slug) }}">{{ $landingType->getLocalizedName() }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endif
@endpush

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
        <h1 class="banner-title">
            {{ isset($serviceType) ? $serviceType->getLocalizedMainTitle() : $servicesupdate->getLocalizedMainTitle() }}
        </h1>
        <p class="banner-des">
            {{ isset($serviceType) ? $serviceType->getLocalizedMainDesc() : $servicesupdate->getLocalizedMainDesc() }}
        </p>
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
                    <span style="color: #b3c7f7;;">{{ $formLabels?->getLocalizedRequiredNote() ?? 'Velden gemarkeerd met * zijn vereist.' }}</span>
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
                        <span id="zalvant-label-message">{{ $formLabels?->getLocalizedMessageLabel() ?? '' }}</span>
                        <span class="zalvant-form-required">*</span>
                    </label>
                    <textarea id="message" name="message" rows="3" placeholder="{{ $formLabels?->getLocalizedMessagePlaceholder() ?? '' }}" required></textarea>
                </div>
                <button type="submit" class="zalvant-form-btn" id="zalvant-form-btn">
                    <svg width="20" height="20" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 2L11 13" />
                        <path d="M22 2l-7 20-4-9-9-4 20-7z" />
                    </svg>
                    <span id="zalvant-btn-text">{{ $formLabels?->getLocalizedSubmitButton() ?? __('web.buttons.send') }}</span>
                </button>
                <div class="zalvant-form-success" id="zalvantFormSuccess" style="display:none;">
                    <svg width="24" height="24" fill="none" stroke="#00e676" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="#00e676" />
                        <path d="M8 12l3 3 5-5" stroke="#00e676" />
                    </svg>
                    <span id="zalvant-success-msg">{{ $formLabels?->getLocalizedSuccessMessage() ?? '' }}</span>
                </div>
            </form>
        </div>
</div>
</section>
</div>
<div class="about-section">
    <div class="description">
        <h1>{{ isset($serviceType) ? $serviceType->getLocalizedOfferTitle() : $servicesupdate->getLocalizedOfferTitle() }}</h1>
        <p>{{ isset($serviceType) ? $serviceType->getLocalizedOfferDesc() : $servicesupdate->getLocalizedOfferDesc() }}</p>
    </div>
    <div class="about-cards-container">
        @if(isset($services) && $services->count() > 0)
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
        @endif
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
        <h1>{{ isset($serviceType) ? $serviceType->getLocalizedDealAiTitle() : $servicesupdate->getLocalizedDealAiTitle() }}</h1>
        <p>{{ isset($serviceType) ? $serviceType->getLocalizedDealAiDesc() : $servicesupdate->getLocalizedDealAiDesc() }}</p>
    </div>
    <div class="aiservicesAll">
        @if(isset($serviceType))
        @php
        $dealCards = [
        [
        'name' => $serviceType->getLocalizedDeal1Name(),
        'desc' => $serviceType->getLocalizedDeal1Desc(),
        'image' => $serviceType->deal1_image,
        ],
        [
        'name' => $serviceType->getLocalizedDeal2Name(),
        'desc' => $serviceType->getLocalizedDeal2Desc(),
        'image' => $serviceType->deal2_image,
        ],
        [
        'name' => $serviceType->getLocalizedDeal3Name(),
        'desc' => $serviceType->getLocalizedDeal3Desc(),
        'image' => $serviceType->deal3_image,
        ],
        ];
        @endphp

        @foreach ($dealCards as $card)
        @if (!empty($card['name']))
        <div class="aiservicescards">
            <div class="aiservicescardsimg">
                <img src="{{ !empty($card['image']) ? asset($card['image']) : asset('assets/web/images/aiservicescardsbg.png') }}" alt="image">
            </div>
            <div class="aiservicescardstext">
                <h1>{{ $card['name'] }}</h1>
                <p>{{ $card['desc'] }}</p>
            </div>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</div>
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
<section class="heroActionA">
    <div class="cardActionA" role="region" aria-label="Booking call to action">
        <div class="eyebrowActionA"><span class="dotActionA"></span> {{$actionData?->getLocalizedEyebrow() ?? ''}}</div>
        <h1 class="headingActionA">{{$actionData?->getLocalizedHeading() ?? ''}}</h1>
        <p class="subActionA">{{$actionData?->getLocalizedSubText() ?? ''}}</p>
        <div class="chipsActionA" aria-hidden="true">
            <span class="chipActionA">{{$actionData?->getLocalizedChipOne() ?? ''}}</span>
            <span class="chipActionA">{{$actionData?->getLocalizedChipTwo() ?? ''}}</span>
            <span class="chipActionA">{{$actionData?->getLocalizedChipThree() ?? ''}}</span>
        </div>
        <div class="actionsActionA" role="group" aria-label="Contact options">
            <a class="btnActionA btnPrimaryActionA" href="tel:{{$actionData?->phone ?? '+31615865040'}}" aria-label="Call us at {{$actionData?->phone ?? '+31615865040'}}">
                <span class="shineActionA"></span>
                <!-- phone icon -->
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M21 16.5v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.5 6.18 2 2 0 0 1 5.5 4h3a1 1 0 0 1 1 .78l.7 3a1 1 0 0 1-.3.95l-1.2 1a16 16 0 0 0 6 6l1-1.2a1 1 0 0 1 .95-.3l3 .7a1 1 0 0 1 .78 1z" fill="currentColor" />
                </svg>
                {{$actionData?->phone ?? '+31615865040'}}
            </a>
            <a class="btnActionA btnGhostActionA" href="mailto:{{$actionData?->email ?? 'info@zalvant.com'}}" aria-label="Email us at {{$actionData?->email ?? 'info@zalvant.com'}}">
                <span class="shineActionA"></span>
                <!-- mail icon -->
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.5" />
                    <path d="m22 8-10 6L2 8" stroke="currentColor" stroke-width="1.5" />
                </svg>
                {{$actionData?->email ?? 'info@zalvant.com'}}
            </a>
        </div>
        <p class="noteActionA">{{$actionData?->getLocalizedFooterNote() ?? ''}}</p>
    </div>
</section>
<div class="offringai3">
    <div class="topaiservicrs">
        <div class="bannerTextMain2">
            <div class="text-logo">
                <img src="{{ asset('assets/web/images/Rlogo.png') }}" alt="Rlogo">
                <p>Top Services</p>
            </div>

        </div>
        <div class="blogs-card-main">
            @foreach ($portfolios as $index => $portfolio)
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

@endsection