@extends('layouts.web')
<style>
    .nav-menu {
        display: none;
    }

    .footer {
        display: none;
    }

    .line-img1 {
        display: none;
    }

    .line-img2 {
        display: none;
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

    .orbit-section {
        top: 133px;
        width: 49%;
    }


    .borders5 {
        width: 80px;
        position: absolute;
        top: 43%;
        left: 39%;
        height: 80px;
    }

    .borders5 img {
        width: 100%;
        height: 100%;
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
    }

    .maintformsection {
        background: linear-gradient(2deg, #010034 70%, #005BD7 100%);
    }

    .sectiontestss h1 {
        margin: 0;
        text-align: center;
        color: white;
        padding: 30px 0px 0px 0px;
        font-size: 30px;
    }

    .sectiontestss p {
        margin: 0;
        padding: 14px 0px 0px 0px;
        text-align: center;
        color: white;
        line-height: 24px;
    }

    .sectiontestss {
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

    .cardcustonC {
        position: relative;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        backdrop-filter: saturate(140%) blur(8px);
        border-radius: 18px;
        padding: 26px;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .cardcustonC::after {
        content: "";
        position: absolute;
        inset: auto -30% -30% auto;
        width: 180px;
        height: 180px;
        background: radial-gradient(60% 60% at 50% 50%, rgba(0, 74, 183, .55) 0%, rgba(0, 74, 183, 0) 70%);
        transform: rotate(25deg);
    }

    .cardcustonC:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 36px rgba(0, 0, 0, .35);
        border-color: rgba(0, 74, 183, .45);
    }

    .iconcustonC {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        margin-bottom: 16px;
        background: linear-gradient(145deg, rgba(0, 74, 183, .25), rgba(255, 255, 255, .06));
        border: 1px solid rgba(255, 255, 255, .12);
    }

    .iconcustonC svg {
        width: 26px;
        height: 26px;
        fill: #ffffff;
    }

    .valuecustonC {
        font-size: 41px;
        font-weight: 600;
        letter-spacing: .5px;
        color: #ffffff;
    }

    .labelcustonC {
        margin-top: 4px;
        color: #c6d6ff;
        font-weight: 500;
    }

    .cardcustonC .barcustonC {
        position: absolute;
        left: 0;
        top: 0;
        height: 4px;
        width: 100%;
        background: linear-gradient(90deg, #004ab7, #4aa3ff);
        opacity: .9;
    }

    .blobcustonC {
        position: absolute;
        filter: blur(40px);
        opacity: .22;
        pointer-events: none;
    }

    .blobcustonC.blob-acustonC {
        width: 220px;
        height: 220px;
        background: #1b56ff;
        left: -60px;
        top: -40px;
        border-radius: 50%;
    }

    .blobcustonC.blob-bcustonC {
        width: 260px;
        height: 260px;
        background: #003aa3;
        right: -60px;
        bottom: -60px;
        border-radius: 50%;
    }

    .ctacustonC {
        margin-top: 36px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btncustonC {
        appearance: none;
        border: none;
        cursor: pointer;
        padding: 12px 18px;
        border-radius: 12px;
        font-weight: 700;
    }

    .btncustonC.primarycustonC {
        background: #004ab7;
        color: #ffffff;
        box-shadow: 0 10px 20px rgba(0, 74, 183, .35);
    }

    .btncustonC.primarycustonC:hover {
        filter: brightness(1.05);
    }

    .btncustonC.ghostcustonC {
        background: transparent;
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, .25);
    }

    .btncustonC.ghostcustonC:hover {
        background: rgba(255, 255, 255, .06);
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
@section('meta_title', $homeupdate->getLocalizedMetaTitle())
@section('meta_desc', $homeupdate->getLocalizedMetaDesc())
@section('meta_keyword', $homeupdate->getLocalizedMetaKeyword())
@section('content')
<div class="maintformsection" style="margin-top: 20px;">
    <div class="sectiontestss">
        <h1 id="zalvant-form-title">{{ $banner?->getLocalizedBannerHeadTitle() ?? 'Get Started with Zalvant' }}</h1>
        <p id="zalvant-form-desc">
            {{ $banner?->getLocalizedBannerHeadPara() ?? 'Transform your digital presence with our expert solutions' }}
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
            <a href="{{ route('contact-us') }}" class="button">{{ __('web.buttons.get_free_consultation') }}</a>
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



    <section class="stats-sectioncustonC" aria-labelledby="stats-titlecustonC">
        <div class="stats-wrapcustonC">
            <div class="blobcustonC blob-acustonC"></div>
            <h2 id="stats-titlecustonC" class="titlecustonC">Countless happy clients and successful projects</h2>
            <p class="subtitlecustonC">We obsess over detail and reliability. These metrics reflect the trust our customers
                place in us and the excellence our team delivers every day.</p>

            <div class="gridcustonC" role="list">
                <article class="cardcustonC" role="listitem">
                    <div class="barcustonC" aria-hidden="true"></div>
                    <div class="iconcustonC" aria-hidden="true">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5zm-9 9a9 9 0 0 1 18 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div class="valuecustonC" data-count target="{{ $stat?->happy_clients ?? '500' }}" data-format="compact-plus">0</div>
                    <div class="labelcustonC">{{ $stat?->getLocalizedClientLabel() ?? '' }}</div>
                </article>

                <article class="cardcustonC" role="listitem">
                    <div class="barcustonC" aria-hidden="true"></div>
                    <div class="iconcustonC" aria-hidden="true">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 3H5a2 2 0 0 0-2 2v3h18V5a2 2 0 0 0-2-2zM3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9H3zm8 2h2v3h3v2h-3v3h-2v-3H8v-2h3v-3z" />
                        </svg>
                    </div>
                    <div class="valuecustonC" data-count target="{{ $stat?->tours_completed ?? '1200' }}" data-format="compact-plus">0</div>
                    <div class="labelcustonC">{{ $stat?->getLocalizedCompletedLabel() ?? '' }}</div>
                </article>

                <article class="cardcustonC" role="listitem">
                    <div class="barcustonC" aria-hidden="true"></div>
                    <div class="iconcustonC" aria-hidden="true">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 3H7a2 2 0 0 0-2 2v14l7-3 7 3V5a2 2 0 0 0-2-2z" />
                        </svg>
                    </div>
                    <div class="valuecustonC-wrapper" style="display: inline-flex; align-items: baseline; gap: 4px;">
                        <div class="valuecustonC" data-count target="{{ $stat?->awards ?? '25' }}" data-fDataDataormat="plain"></div>
                        <span class="valueSuffix" style="font-size: 40px; color: white;">/7</span>
                    </div>

                    <div class="labelcustonC">{{ $stat?->getLocalizedAwardsLabel() ?? '' }}</div>
                </article>

                <article class="cardcustonC" role="listitem">
                    <div class="barcustonC" aria-hidden="true"></div>
                    <div class="iconcustonC" aria-hidden="true">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 1 8 9l-8 1 6 5-2 8 8-4 8 4-2-8 6-5-8-1z" />
                        </svg>
                    </div>
                    <div class="valuecustonC" data-count target="{{ $stat?->experience_years ?? '10' }}" data-format="plus">0</div>
                    <div class="labelcustonC">{{ $stat?->getLocalizedExperienceLabel() ?? '' }}</div>
                </article>
            </div>
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
                                class="top-service-btn"> {{ __('web.buttons.view_case_study') }} </a>
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
            <h1 class="faq-heading">{{ $homeupdate->getLocalizedFaqSectionTitle() }}</h1>
            <p class="faq-description">{{ $homeupdate->getLocalizedFaqSectionDesc() }}</p>
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

    <script>
        (function() {
            const easeOutCubic = t => 1 - Math.pow(1 - t, 3);
            const formatterCompact = Intl.NumberFormat(undefined, {
                notation: 'compact'
            });
            const formatterGrouped = Intl.NumberFormat(undefined);

            function format(value, mode) {
                switch (mode) {
                    case 'compact-plus':
                        return formatterCompact.format(value) + '+';
                    case 'grouped':
                        return formatterGrouped.format(value);
                    case 'plus':
                        return formatterGrouped.format(value) + '+';
                    default:
                        return String(Math.round(value));
                }
            }

            function animateCount(el) {
                const target = Number(el.getAttribute('target')) || 0;
                const mode = el.getAttribute('data-format') || 'plain';
                const duration = 1600 + Math.min(1400, target / 50); // adaptive
                const start = performance.now();

                function frame(now) {
                    const progress = Math.min(1, (now - start) / duration);
                    const eased = easeOutCubic(progress);
                    const current = target * eased;
                    el.textContent = format(current, mode);
                    if (progress < 1) requestAnimationFrame(frame);
                    else el.textContent = format(target, mode);
                }
                requestAnimationFrame(frame);
            }

            const counters = Array.from(document.querySelectorAll('[data-count]'));
            if ('IntersectionObserver' in window) {
                const io = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCount(entry.target);
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.4
                });
                counters.forEach(el => io.observe(el));
            } else {
                counters.forEach(animateCount);
            }
        })();
    </script>
    @endsection