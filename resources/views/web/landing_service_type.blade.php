@extends('layouts.web')
<style>
    .mobile-consl {
        display: none;
    }

    .language-menu {
        margin-right: 100px;
        margin-top: 20px;
    }

    .mobile-sub-services {
        list-style: none;
        padding-left: 15px;
        margin-top: 6px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .mobile-sub-services li a {
        font-size: 14px;
        color: #fff;
        opacity: 0.85;
    }

    .mobile-sub-services li a:hover {
        opacity: 1;
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
</style>
<style>
    /* Custom header navigation for landing service type page */
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
        margin-left: 0px !important;
        margin-right: 30px !important;
        margin-top: 19px;
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
@php
    $landingTypeMenu = [];
    if (isset($landingTypes) && $landingTypes->count() > 0) {
        foreach ($landingTypes as $landingType) {
            $menuItem = [
                'name' => $landingType->getLocalizedName(),
                'url' => route('landing.type', $landingType->slug),
                'dropdown' => [],
            ];

            if ($landingType->services_list && $landingType->services_list->count() > 0) {
                foreach ($landingType->services_list as $service) {
                    $menuItem['dropdown'][] = [
                        'name' => $service->getLocalizedName(),
                        'url' => route('landing.service', $service->slug),
                    ];
                }
            }

            $landingTypeMenu[] = $menuItem;
        }
    }
@endphp
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const landingTypeLinks = <?php echo json_encode($landingTypeMenu); ?>;

        const mobileSidebar = document.getElementById('mobileSidebar');
        const landingNavExists = document.querySelector('.landing-types-nav');

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

                    // If the landing type has services, nest them as a sub list (accordion-style)
                    // if (item.dropdown && item.dropdown.length) {
                    //     const subList = document.createElement('ul');
                    //     subList.classList.add('mobile-sub-services');
                    //     item.dropdown.forEach(function(service) {
                    //         const serviceLi = document.createElement('li');
                    //         const serviceAnchor = document.createElement('a');
                    //         serviceAnchor.href = service.url;
                    //         serviceAnchor.textContent = service.name;
                    //         serviceLi.appendChild(serviceAnchor);
                    //         subList.appendChild(serviceLi);
                    //     });
                    //     li.appendChild(subList);
                    // }

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
<div class="service-banner service-bannerrs2">
    <div class="small-service ui-design">
        <div class="service-icon">
            <img src="{{ asset('assets/web/images/imgi_21_1748870857-683da6c9ce7ed.png') }}" alt="imgi">
        </div>
        {{ __('web.service_types.ui_design') }}
    </div>
    <div class="small-service web-design">
        <div class="service-icon">
            <img src="{{ asset('assets/web/images/desktop.png') }}" alt="desktop">
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
            <img src="{{ asset('assets/web/images/Rocket.png') }}" alt="Rocket">
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
<div class="offringai3">
    <div class="topaiservicrs">
        <div class="bannerTextMain2">
            <div class="text-logo">
                <img src="{{ asset('assets/web/images/Rlogo.png') }}" alt="Rlogo">
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