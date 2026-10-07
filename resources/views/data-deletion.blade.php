<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ config('app.name', 'Capsulty') }} —
        User Data Deletion
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* =========================================================
           BASE
        ========================================================== */

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background:
                radial-gradient(
                    circle at 8% 8%,
                    rgba(13, 148, 136, 0.09),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 92% 25%,
                    rgba(20, 184, 166, 0.07),
                    transparent 25%
                ),
                #F5F2E8;
            color: #1e293b;
        }

        [dir="rtl"] {
            font-family: "Cairo", sans-serif;
        }

        [dir="ltr"] {
            font-family: "Inter", sans-serif;
        }

        ::selection {
            background: #0f766e;
            color: white;
        }

        /* =========================================================
           NAVBAR
        ========================================================== */

        .navbar {
            border: 1px solid rgba(15, 118, 110, 0.10);
            background: rgba(245, 242, 232, 0.88);
            box-shadow:
                0 20px 50px rgba(15, 118, 110, 0.06),
                0 5px 20px rgba(15, 23, 42, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -7px;
            left: 0;
            height: 2px;
            border-radius: 999px;
            background: #0f766e;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform .25s ease;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        /* =========================================================
           PAGE
        ========================================================== */

        .deletion-page {
            position: relative;
            padding-bottom: 110px;
        }

        .deletion-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* =========================================================
           DECORATIVE ORBS
        ========================================================== */

        .deletion-orb {
            position: absolute;
            pointer-events: none;
            border-radius: 999px;
            filter: blur(2px);
        }

        .deletion-orb-one {
            top: 120px;
            left: -180px;
            width: 380px;
            height: 380px;
            background: rgba(20, 184, 166, 0.06);
        }

        .deletion-orb-two {
            top: 650px;
            right: -220px;
            width: 420px;
            height: 420px;
            background: rgba(15, 118, 110, 0.05);
        }

        /* =========================================================
           MAIN CARD
        ========================================================== */

        .deletion-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(15, 118, 110, 0.12);
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.84);
            box-shadow:
                0 35px 90px rgba(15, 118, 110, 0.08),
                0 10px 35px rgba(15, 23, 42, 0.04);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .deletion-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background:
                linear-gradient(
                    90deg,
                    #115e59,
                    #0f766e,
                    #14b8a6,
                    #2dd4bf,
                    #0f766e,
                    #115e59
                );
        }

        /* =========================================================
           HEADER
        ========================================================== */

        .deletion-header {
            position: relative;
            overflow: hidden;
            padding: 62px 68px 48px;
            border-bottom: 1px solid rgba(15, 118, 110, 0.10);
            background:
                radial-gradient(
                    circle at 92% 10%,
                    rgba(20, 184, 166, 0.13),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 10% 90%,
                    rgba(13, 148, 136, 0.07),
                    transparent 28%
                ),
                linear-gradient(
                    135deg,
                    rgba(240, 253, 250, 0.90),
                    rgba(255, 255, 255, 0.76)
                );
        }

        .deletion-header::after {
            content: "";
            position: absolute;
            right: 45px;
            top: 45px;
            width: 120px;
            height: 120px;
            border: 1px solid rgba(13, 148, 136, 0.10);
            border-radius: 35px;
            transform: rotate(18deg);
        }

        .deletion-badge {
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            padding: 8px 14px;
            border: 1px solid rgba(13, 148, 136, 0.15);
            border-radius: 999px;
            background: rgba(204, 251, 241, 0.72);
            color: #115e59;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .deletion-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: #14b8a6;
            box-shadow:
                0 0 0 4px rgba(20, 184, 166, 0.12),
                0 0 12px rgba(20, 184, 166, 0.35);
        }

        .deletion-title {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #082f2d;
            font-size: clamp(2.4rem, 5vw, 4.2rem);
            font-weight: 950;
            letter-spacing: -0.06em;
            line-height: 1.02;
        }

        .deletion-subtitle {
            position: relative;
            z-index: 2;
            max-width: 780px;
            margin-top: 20px;
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .deletion-date {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 26px;
            color: #0f766e;
            font-size: .88rem;
            font-weight: 800;
        }

        /* =========================================================
           CONTENT
        ========================================================== */

        .deletion-content {
            padding: 52px 68px 68px;
        }

        /* =========================================================
           INTRO
        ========================================================== */

        .deletion-intro {
            position: relative;
            margin-bottom: 48px;
            padding: 30px 32px;
            overflow: hidden;
            border: 1px solid rgba(13, 148, 136, 0.13);
            border-radius: 22px;
            background:
                linear-gradient(
                    135deg,
                    rgba(240, 253, 250, .90),
                    rgba(248, 250, 252, .80)
                );
            color: #475569;
            font-size: 1rem;
            line-height: 1.95;
        }

        .deletion-intro::before {
            content: "";
            position: absolute;
            inset-inline-start: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background:
                linear-gradient(
                    to bottom,
                    #0f766e,
                    #2dd4bf
                );
        }

        .deletion-intro strong {
            color: #0f766e;
            font-weight: 900;
        }

        /* =========================================================
           SECTIONS
        ========================================================== */

        .deletion-section {
            position: relative;
            margin-top: 44px;
        }

        .deletion-section:first-child {
            margin-top: 0;
        }

        .deletion-section-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .deletion-number {
            display: flex;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 13px;
            background:
                linear-gradient(
                    135deg,
                    #115e59,
                    #0f766e
                );
            color: white;
            font-size: .76rem;
            font-weight: 900;
            box-shadow:
                0 9px 20px rgba(15, 118, 110, .18),
                inset 0 1px 0 rgba(255,255,255,.12);
        }

        .deletion-section h2 {
            margin: 0;
            color: #0f3f3c;
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -0.028em;
            line-height: 1.35;
        }

        .deletion-section p {
            margin: 0 0 17px;
            color: #475569;
            font-size: .98rem;
            line-height: 1.95;
        }

        /* =========================================================
           REQUEST BOX
        ========================================================== */

        .request-box {
            position: relative;
            margin-top: 24px;
            margin-bottom: 8px;
            padding: 28px 30px;
            overflow: hidden;
            border: 1px solid rgba(13, 148, 136, .15);
            border-radius: 22px;
            background:
                radial-gradient(
                    circle at 95% 10%,
                    rgba(45, 212, 191, .12),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    rgba(240, 253, 250, .95),
                    rgba(255,255,255,.86)
                );
            box-shadow:
                0 15px 35px rgba(15,118,110,.06);
        }

        .request-box::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            inset-inline-start: 0;
            width: 4px;
            background:
                linear-gradient(
                    to bottom,
                    #0f766e,
                    #2dd4bf
                );
        }

        .request-box-title {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 12px;
            color: #0f5f5a;
            font-size: 1.05rem;
            font-weight: 900;
        }

        .request-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #ccfbf1;
            color: #0f766e;
        }

        .request-box p {
            margin-bottom: 0;
        }

        .email-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #0f766e;
            font-weight: 900;
            text-decoration: none;
            transition: color .2s ease;
        }

        .email-link:hover {
            color: #115e59;
            text-decoration: underline;
        }

        /* =========================================================
           BULLET LIST
        ========================================================== */

        .deletion-list {
            margin: 18px 0 0;
            padding: 0;
            list-style: none;
        }

        .deletion-list li {
            position: relative;
            margin: 11px 0;
            padding-inline-start: 27px;
            color: #475569;
            font-size: .96rem;
            line-height: 1.8;
        }

        .deletion-list li::before {
            content: "";
            position: absolute;
            top: .78em;
            inset-inline-start: 5px;
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: #14b8a6;
            box-shadow:
                0 0 0 4px rgba(20, 184, 166, .10);
        }

        /* =========================================================
           INFO BOX
        ========================================================== */

        .info-box {
            margin-top: 24px;
            padding: 24px 26px;
            border: 1px solid rgba(15, 118, 110, .09);
            border-radius: 20px;
            background: rgba(248, 250, 252, .72);
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        /* =========================================================
           CONTACT
        ========================================================== */

        .deletion-contact {
            margin-top: 50px;
            padding: 32px;
            overflow: hidden;
            border-radius: 24px;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(45, 212, 191, .16),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #083f3b,
                    #0b514c
                );
            box-shadow:
                0 24px 50px rgba(8, 63, 59, .18);
        }

        .deletion-contact .deletion-section-heading {
            margin-bottom: 20px;
        }

        .deletion-contact .deletion-number {
            background: rgba(255,255,255,.12);
            box-shadow: none;
        }

        .deletion-contact h2 {
            color: white;
        }

        .deletion-contact p {
            color: rgba(255,255,255,.78);
        }

        .deletion-contact strong {
            color: white;
        }

        .deletion-contact a {
            color: #5eead4;
            font-weight: 800;
            text-decoration: none;
            transition: color .2s ease;
        }

        .deletion-contact a:hover {
            color: white;
            text-decoration: underline;
        }

        /* =========================================================
           FOOTER
        ========================================================== */

        .deletion-footer-note {
            margin-top: 42px;
            padding-top: 28px;
            border-top: 1px solid rgba(15, 118, 110, 0.08);
            text-align: center;
            color: #94a3b8;
            font-size: .8rem;
            font-weight: 600;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1024px) {

            .deletion-header {
                padding: 52px 48px 42px;
            }

            .deletion-content {
                padding: 44px 48px 58px;
            }

        }

        @media (max-width: 768px) {

            .deletion-container {
                padding: 0 16px;
            }

            .deletion-card {
                border-radius: 26px;
            }

            .deletion-header {
                padding: 46px 28px 36px;
            }

            .deletion-content {
                padding: 36px 28px 46px;
            }

            .deletion-title {
                font-size: 2.7rem;
            }

            .deletion-subtitle {
                font-size: .96rem;
            }

            .deletion-section-heading {
                align-items: flex-start;
            }

            .deletion-section h2 {
                font-size: 1.18rem;
            }

        }

        @media (max-width: 640px) {

            .deletion-page {
                padding-bottom: 70px;
            }

            .deletion-container {
                padding: 0 12px;
            }

            .deletion-header {
                padding: 38px 22px 30px;
            }

            .deletion-content {
                padding: 30px 22px 38px;
            }

            .deletion-title {
                font-size: 2.25rem;
                letter-spacing: -0.045em;
            }

            .deletion-badge {
                font-size: 9px;
            }

            .deletion-intro {
                padding: 22px 21px;
                font-size: .92rem;
            }

            .deletion-section {
                margin-top: 38px;
            }

            .deletion-section-heading {
                gap: 11px;
            }

            .deletion-number {
                width: 35px;
                height: 35px;
                border-radius: 10px;
                font-size: .68rem;
            }

            .deletion-section h2 {
                font-size: 1.08rem;
            }

            .deletion-section p,
            .deletion-list li {
                font-size: .91rem;
            }

            .request-box {
                padding: 23px 21px;
            }

            .deletion-contact {
                padding: 24px 21px;
            }

        }

        @media (max-width: 380px) {

            .deletion-title {
                font-size: 2rem;
            }

            .deletion-header {
                padding-inline: 18px;
            }

            .deletion-content {
                padding-inline: 18px;
            }

        }
    </style>
</head>


<body class="text-slate-800">

    {{-- =========================================================
        NAVBAR
    ========================================================== --}}

    <header class="fixed inset-x-0 top-0 z-50">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 pt-4 sm:pt-5">

            <nav class="navbar rounded-2xl px-4 sm:px-5 py-3.5 sm:py-4">

                <div class="flex items-center justify-between gap-4">

                    {{-- LOGO --}}

                    <a
                        href="{{ route('index') }}"
                        class="flex items-center gap-3 shrink-0"
                    >

                        <div
                            class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-xl bg-teal-800 text-white shadow-lg shadow-teal-900/15"
                        >

                            <svg
                                class="h-5 w-5 sm:h-6 sm:w-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >

                                <path d="M10 3v18"/>

                                <path d="M3 10h18"/>

                                <rect
                                    x="3"
                                    y="3"
                                    width="18"
                                    height="18"
                                    rx="5"
                                />

                            </svg>

                        </div>


                        <div class="hidden xs:block">

                            <div
                                class="text-base sm:text-lg font-black tracking-tight text-teal-950"
                            >
                                {{ config('app.name', 'Capsulty') }}
                            </div>

                            <div
                                class="text-[9px] sm:text-[10px] font-bold uppercase tracking-[.2em] text-teal-700"
                            >
                                Pharmacy Platform
                            </div>

                        </div>

                    </a>


                    {{-- DESKTOP NAVIGATION --}}

                    <div class="hidden items-center gap-6 xl:gap-8 lg:flex">

                        <a
                            href="#home"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('landing.nav.home') }}
                        </a>

                        <a
                            href="#features"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('landing.nav.features') }}
                        </a>

                        <a
                            href="#how-it-works"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('landing.nav.how_it_works') }}
                        </a>

                        <a
                            href="#pricing"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('landing.nav.pricing') }}
                        </a>

                        <a
                            href="#about"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('landing.nav.about') }}
                        </a>

                        
                        <a
                            href="{{ route('privacy-policy') }}"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('custom.Privacy Policy') }}
                        </a>


                         <a
                            href="{{ route('terms') }}"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('custom.Terms') }}
                        </a>

                            <a
                            href="{{ route('data-deletion') }}"
                            class="nav-link text-sm font-bold text-slate-600 transition hover:text-teal-800"
                        >
                            {{ __('custom.Data Deletion') }}
                        </a>

                    </div>


                    {{-- ACTIONS --}}

                    <div class="flex items-center gap-2 sm:gap-3">

                        @php
                            $currentLocale = app()->getLocale();
                            $switchLocale = $currentLocale === 'ar' ? 'en' : 'ar';
                        @endphp


                        {{-- LANGUAGE --}}

                        <a
                            href="{{ route('app.setlocale', $switchLocale) }}"
                            class="flex h-9 sm:h-10 items-center gap-2 rounded-xl border border-teal-900/10 bg-white/70 px-3 sm:px-4 text-xs sm:text-sm font-black text-teal-900 transition hover:bg-white hover:shadow-md"
                        >

                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />

                                <path d="M3 12h18"/>

                                <path d="M12 3c3 3.5 3 14.5 0 18"/>

                            </svg>


                            <span class="hidden sm:inline">
                                {{ $switchLocale === 'ar' ? 'العربية' : 'English' }}
                            </span>


                            <span class="sm:hidden">
                                {{ $switchLocale === 'ar' ? 'AR' : 'EN' }}
                            </span>

                        </a>


                        {{-- REGISTER --}}

                        <a
                            href="#register"
                            class="hidden rounded-xl bg-teal-800 px-5 py-3 text-sm font-black text-white shadow-lg shadow-teal-900/20 transition hover:-translate-y-0.5 hover:bg-teal-900 hover:shadow-xl sm:block"
                        >
                            {{ __('landing.nav.register') }}
                        </a>

                    </div>

                </div>

            </nav>

        </div>

    </header>


    {{-- =========================================================
        USER DATA DELETION PAGE
    ========================================================== --}}

    <main>

        <section
            id="home"
            class="deletion-page relative overflow-hidden pt-36 sm:pt-40"
        >

            {{-- Decorative elements --}}

            <div class="deletion-orb deletion-orb-one"></div>

            <div class="deletion-orb deletion-orb-two"></div>


            <div class="deletion-container">

                <article class="deletion-card">

                    {{-- =================================================
                        HEADER
                    ================================================== --}}

                    <header class="deletion-header">

                        <div class="deletion-badge">

                            <span class="deletion-badge-dot"></span>

                            Privacy & Data

                        </div>


                        <h1 class="deletion-title">
                            User Data Deletion
                        </h1>


                        <p class="deletion-subtitle">

                            Capsulty respects your privacy and provides
                            a simple way for individuals to request deletion
                            of personal information processed through the
                            Capsulty platform.

                        </p>


                        <div class="deletion-date">

                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >

                                <rect
                                    x="3"
                                    y="4"
                                    width="18"
                                    height="18"
                                    rx="3"
                                />

                                <path d="M16 2v4"/>
                                <path d="M8 2v4"/>
                                <path d="M3 10h18"/>

                            </svg>

                            Last Updated: October 8, 2026

                        </div>

                    </header>


                    {{-- =================================================
                        CONTENT
                    ================================================== --}}

                    <div class="deletion-content">


                        {{-- INTRODUCTION --}}

                        <div class="deletion-intro">

                            <strong>Capsulty respects your privacy.</strong>

                            We provide a way for individuals to request
                            deletion of personal information processed
                            through the Capsulty platform.

                        </div>


                        {{-- =================================================
                            HOW TO REQUEST
                        ================================================== --}}

                        <section class="deletion-section">

                            <div class="deletion-section-heading">

                                <span class="deletion-number">
                                    01
                                </span>

                                <h2>
                                    How to Request Data Deletion
                                </h2>

                            </div>


                            <p>
                                If you are a customer of a pharmacy that uses
                                Capsulty and you want your personal information
                                deleted, please contact the pharmacy that
                                manages your information and request deletion
                                of your data.
                            </p>


                            <div class="request-box">

                                <div class="request-box-title">

                                    <span class="request-icon">

                                        <svg
                                            class="h-5 w-5"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2-2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                            />

                                            <path d="m22 6-10 7L2 6"/>

                                        </svg>

                                    </span>

                                    Direct Contact

                                </div>


                                <p>
                                    You may also contact Capsulty directly at:
                                </p>


                                <p class="mt-4">

                                    <a
                                        href="mailto:mohammedfayezdiab@gmail.com"
                                        class="email-link"
                                    >

                                        <svg
                                            class="h-4 w-4"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2-2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                            />

                                            <path d="m22 6-10 7L2 6"/>

                                        </svg>

                                        mohammedfayezdiab@gmail.com

                                    </a>

                                </p>

                            </div>


                            <p class="mt-5">

                                When submitting a deletion request, please
                                provide enough information for us to identify
                                the relevant account or record while avoiding
                                unnecessary sensitive information.

                            </p>

                        </section>


                        {{-- =================================================
                            INFORMATION MANAGED BY PHARMACIES
                        ================================================== --}}

                        <section class="deletion-section">

                            <div class="deletion-section-heading">

                                <span class="deletion-number">
                                    02
                                </span>

                                <h2>
                                    Information Managed by Pharmacies
                                </h2>

                            </div>


                            <p>
                                Capsulty provides software that pharmacies use
                                to manage their customers and pharmacy
                                operations.
                            </p>


                            <p>
                                Customer information is generally entered and
                                managed by the pharmacy. Therefore, the pharmacy
                                may be responsible for handling requests
                                relating to customer information stored in
                                its account.
                            </p>


                            <div class="info-box">

                                <p>
                                    Where appropriate, Capsulty will assist
                                    the pharmacy with processing a valid
                                    deletion request.
                                </p>

                            </div>

                        </section>


                        {{-- =================================================
                            WHAT HAPPENS
                        ================================================== --}}

                        <section class="deletion-section">

                            <div class="deletion-section-heading">

                                <span class="deletion-number">
                                    03
                                </span>

                                <h2>
                                    What Happens After a Deletion Request
                                </h2>

                            </div>


                            <p>
                                After receiving a valid request, Capsulty
                                or the relevant pharmacy will review the
                                request and determine whether the information
                                can be deleted.
                            </p>


                            <div class="info-box">

                                <p>
                                    Some information may need to be retained
                                    where required by applicable law, security
                                    requirements, accounting requirements,
                                    dispute resolution, or other legitimate
                                    purposes.
                                </p>

                            </div>


                            <p class="mt-5">
                                Where information is deleted, it may no longer
                                be available through the Capsulty platform.
                            </p>

                        </section>


                        {{-- =================================================
                            CONTACT
                        ================================================== --}}

                        <section class="deletion-section deletion-contact">

                            <div class="deletion-section-heading">

                                <span class="deletion-number">
                                    04
                                </span>

                                <h2>
                                    Contact
                                </h2>

                            </div>


                            <p>
                                If you have questions regarding a data deletion
                                request, please contact Capsulty.
                            </p>


                            <p>

                                <strong>Capsulty</strong>
                                <br>

                                Owner: Eng. Mohammed Fayez
                                <br>

                                Country: Egypt
                                <br>

                                Email:
                                <a
                                    href="mailto:mohammedfayezdiab@gmail.com"
                                >
                                    mohammedfayezdiab@gmail.com
                                </a>

                            </p>

                        </section>


                        {{-- =================================================
                            FOOTER
                        ================================================== --}}

                        <div class="deletion-footer-note">

                            © {{ date('Y') }}
                            {{ config('app.name', 'Capsulty') }}.
                            All rights reserved.

                        </div>

                    </div>

                </article>

            </div>

        </section>

    </main>

</body>
</html>