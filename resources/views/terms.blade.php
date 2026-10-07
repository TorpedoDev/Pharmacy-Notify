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
        Terms of Service
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* =========================================================
           BASE
        ========================================================= */

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
        ========================================================= */

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
           TERMS PAGE
        ========================================================= */

        .terms-page {
            position: relative;
            padding-bottom: 110px;
        }

        .terms-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Decorative background */

        .terms-orb {
            position: absolute;
            pointer-events: none;
            border-radius: 999px;
            filter: blur(2px);
        }

        .terms-orb-one {
            top: 100px;
            left: -180px;
            width: 380px;
            height: 380px;
            background: rgba(20, 184, 166, 0.06);
        }

        .terms-orb-two {
            top: 700px;
            right: -220px;
            width: 420px;
            height: 420px;
            background: rgba(15, 118, 110, 0.05);
        }

        /* =========================================================
           MAIN CARD
        ========================================================= */

        .terms-card {
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

        .terms-card::before {
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
        ========================================================= */

        .terms-header {
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

        .terms-header::after {
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

        .terms-badge {
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

        .terms-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: #14b8a6;
            box-shadow:
                0 0 0 4px rgba(20, 184, 166, 0.12),
                0 0 12px rgba(20, 184, 166, 0.35);
        }

        .terms-title {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #082f2d;
            font-size: clamp(2.4rem, 5vw, 4.2rem);
            font-weight: 950;
            letter-spacing: -0.06em;
            line-height: 1.02;
        }

        .terms-subtitle {
            position: relative;
            z-index: 2;
            max-width: 780px;
            margin-top: 20px;
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .terms-date {
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
        ========================================================= */

        .terms-content {
            padding: 52px 68px 68px;
        }

        /* Intro */

        .terms-intro {
            position: relative;
            margin-bottom: 50px;
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

        .terms-intro::before {
            content: "";
            position: absolute;
            inset-inline-start: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(
                to bottom,
                #0f766e,
                #2dd4bf
            );
        }

        .terms-intro strong {
            color: #0f766e;
            font-weight: 900;
        }

        /* =========================================================
           SECTIONS
        ========================================================= */

        .terms-section {
            position: relative;
            margin-top: 46px;
        }

        .terms-section:first-child {
            margin-top: 0;
        }

        .terms-section-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .terms-number {
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

        .terms-section h2 {
            margin: 0;
            color: #0f3f3c;
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -0.028em;
            line-height: 1.35;
        }

        .terms-section p {
            margin: 0 0 17px;
            color: #475569;
            font-size: .98rem;
            line-height: 1.95;
        }

        .terms-section ul {
            margin: 16px 0 0;
            padding: 0;
            list-style: none;
        }

        .terms-section li {
            position: relative;
            margin: 11px 0;
            padding-inline-start: 27px;
            color: #475569;
            font-size: .96rem;
            line-height: 1.8;
        }

        .terms-section li::before {
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

        .terms-highlight {
            color: #0f766e;
            font-weight: 850;
        }

        /* =========================================================
           IMPORTANT SECTIONS
        ========================================================= */

        .terms-important {
            margin-top: 46px;
            padding: 25px 28px;
            border: 1px solid rgba(13, 148, 136, .13);
            border-radius: 20px;
            background:
                linear-gradient(
                    135deg,
                    rgba(240, 253, 250, .72),
                    rgba(255,255,255,.72)
                );
        }

        .terms-important p {
            margin-bottom: 0;
        }

        /* =========================================================
           CONTACT
        ========================================================= */

        .terms-contact {
            margin-top: 50px;
            padding: 32px;
            overflow: hidden;
            border: 0;
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

        .terms-contact .terms-section-heading {
            margin-bottom: 20px;
        }

        .terms-contact .terms-number {
            background: rgba(255,255,255,.12);
            box-shadow: none;
        }

        .terms-contact h2 {
            color: white;
        }

        .terms-contact p {
            color: rgba(255,255,255,.78);
        }

        .terms-contact strong {
            color: white;
        }

        .terms-contact a {
            color: #5eead4;
            font-weight: 800;
            text-decoration: none;
            transition: color .2s ease;
        }

        .terms-contact a:hover {
            color: white;
            text-decoration: underline;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .terms-footer-note {
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
        ========================================================= */

        @media (max-width: 1024px) {

            .terms-header {
                padding: 52px 48px 42px;
            }

            .terms-content {
                padding: 44px 48px 58px;
            }

        }

        @media (max-width: 768px) {

            .terms-container {
                padding: 0 16px;
            }

            .terms-card {
                border-radius: 26px;
            }

            .terms-header {
                padding: 46px 28px 36px;
            }

            .terms-content {
                padding: 36px 28px 46px;
            }

            .terms-title {
                font-size: 2.7rem;
            }

            .terms-subtitle {
                font-size: .96rem;
            }

            .terms-section-heading {
                align-items: flex-start;
            }

            .terms-section h2 {
                font-size: 1.18rem;
            }

        }

        @media (max-width: 640px) {

            .terms-page {
                padding-bottom: 70px;
            }

            .terms-container {
                padding: 0 12px;
            }

            .terms-header {
                padding: 38px 22px 30px;
            }

            .terms-content {
                padding: 30px 22px 38px;
            }

            .terms-title {
                font-size: 2.25rem;
                letter-spacing: -0.045em;
            }

            .terms-badge {
                font-size: 9px;
            }

            .terms-intro {
                padding: 22px 21px;
                font-size: .92rem;
            }

            .terms-section {
                margin-top: 38px;
            }

            .terms-section-heading {
                gap: 11px;
            }

            .terms-number {
                width: 35px;
                height: 35px;
                border-radius: 10px;
                font-size: .68rem;
            }

            .terms-section h2 {
                font-size: 1.08rem;
            }

            .terms-section p,
            .terms-section li {
                font-size: .91rem;
            }

            .terms-contact {
                padding: 24px 21px;
            }

        }

        @media (max-width: 380px) {

            .terms-title {
                font-size: 2rem;
            }

            .terms-header {
                padding-inline: 18px;
            }

            .terms-content {
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
        TERMS OF SERVICE
    ========================================================== --}}

    <main>

        <section
            id="home"
            class="terms-page relative overflow-hidden pt-36 sm:pt-40"
        >

            {{-- Decorative elements --}}

            <div class="terms-orb terms-orb-one"></div>

            <div class="terms-orb terms-orb-two"></div>


            <div class="terms-container">

                <article class="terms-card">

                    {{-- =================================================
                        HEADER
                    ================================================== --}}

                    <header class="terms-header">

                        <div class="terms-badge">

                            <span class="terms-badge-dot"></span>

                            Terms & Conditions

                        </div>


                        <h1 class="terms-title">
                            Terms of Service
                        </h1>


                        <p class="terms-subtitle">

                            These Terms govern access to and use of the
                            Capsulty pharmacy management platform and define
                            the responsibilities of pharmacies and their
                            authorized users.

                        </p>


                        <div class="terms-date">

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

                    <div class="terms-content">


                        {{-- INTRODUCTION --}}

                        <div class="terms-intro">

                            These Terms of Service
                            ("Terms") govern access to and use of the
                            <strong>Capsulty</strong> pharmacy management
                            platform ("Capsulty", "Service", "we", "us",
                            or "our").

                            <br><br>

                            By creating an account or using Capsulty,
                            the pharmacy and its authorized users agree
                            to these Terms.

                        </div>


                        {{-- =================================================
                            01
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    01
                                </span>

                                <h2>
                                    Description of the Service
                                </h2>

                            </div>


                            <p>
                                Capsulty is a cloud-based pharmacy management
                                system designed to help pharmacies manage
                                their business operations.
                            </p>


                            <p>
                                Depending on the subscription plan and
                                configuration, Capsulty may provide features
                                including:
                            </p>


                            <ul>

                                <li>Customer management</li>

                                <li>Prescription management</li>

                                <li>Medication management</li>

                                <li>Medication dispensing records</li>

                                <li>Refill reminders</li>

                                <li>WhatsApp notifications</li>

                                <li>User and employee management</li>

                                <li>
                                    Reports and other pharmacy management
                                    features
                                </li>

                            </ul>

                        </section>


                        {{-- =================================================
                            02
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    02
                                </span>

                                <h2>
                                    Pharmacy Accounts
                                </h2>

                            </div>


                            <p>
                                A pharmacy using Capsulty is responsible for
                                providing accurate account information and
                                maintaining the security of its account.
                            </p>


                            <p>
                                The pharmacy is responsible for all activity
                                performed through its account and by its
                                authorized users.
                            </p>


                            <p>
                                Pharmacies must keep their login credentials
                                confidential and must not knowingly provide
                                unauthorized individuals with access to their
                                accounts.
                            </p>

                        </section>


                        {{-- =================================================
                            03
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    03
                                </span>

                                <h2>
                                    Customer and Prescription Information
                                </h2>

                            </div>


                            <p>
                                Pharmacies may use Capsulty to store customer,
                                prescription, medication, and dispensing
                                information.
                            </p>


                            <p>
                                The pharmacy is responsible for ensuring that
                                the information entered into Capsulty is
                                accurate and that its collection, storage,
                                and use comply with applicable laws and
                                regulations.
                            </p>


                            <div class="terms-important">

                                <p>
                                    Capsulty is a software platform and does
                                    not independently prescribe medications,
                                    determine medical treatment, or replace
                                    the professional judgment of qualified
                                    healthcare professionals.
                                </p>

                            </div>


                            <p class="mt-5">
                                The pharmacy and its qualified personnel remain
                                responsible for prescriptions, medication
                                information, dosage information, and
                                treatment-related decisions.
                            </p>

                        </section>


                        {{-- =================================================
                            04
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    04
                                </span>

                                <h2>
                                    WhatsApp Messaging
                                </h2>

                            </div>


                            <p>
                                Capsulty may provide integration with the
                                WhatsApp Business Platform.
                            </p>


                            <p>
                                WhatsApp messaging may be used for
                                service-related communications, including:
                            </p>


                            <ul>

                                <li>Medication reminders</li>

                                <li>Prescription notifications</li>

                                <li>Refill reminders</li>

                                <li>Order notifications</li>

                                <li>
                                    Other communications requested or
                                    configured by the pharmacy
                                </li>

                            </ul>


                            <p class="mt-5">
                                The pharmacy is responsible for ensuring that
                                it has the appropriate consent, authorization,
                                or other lawful basis to contact customers
                                through WhatsApp.
                            </p>


                            <p>
                                The pharmacy must not use Capsulty to send
                                spam, fraudulent, misleading, abusive, or
                                unauthorized WhatsApp messages.
                            </p>


                            <p>
                                WhatsApp messaging is also subject to applicable
                                WhatsApp and Meta policies.
                            </p>


                            <p>
                                Capsulty may restrict or suspend WhatsApp
                                functionality if misuse or policy violations
                                are detected.
                            </p>

                        </section>


                        {{-- =================================================
                            05
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    05
                                </span>

                                <h2>
                                    Acceptable Use
                                </h2>

                            </div>


                            <p>
                                Users agree not to use Capsulty to:
                            </p>


                            <ul>

                                <li>
                                    Violate applicable laws or regulations
                                </li>

                                <li>
                                    Send spam or unauthorized communications
                                </li>

                                <li>
                                    Send fraudulent, misleading, abusive,
                                    or harmful messages
                                </li>

                                <li>
                                    Access another user's account without
                                    authorization
                                </li>

                                <li>
                                    Attempt to bypass or compromise
                                    security controls
                                </li>

                                <li>
                                    Introduce malicious software or code
                                </li>

                                <li>
                                    Interfere with the operation of the Service
                                </li>

                                <li>
                                    Abuse WhatsApp messaging functionality
                                </li>

                                <li>
                                    Use the Service in a manner that violates
                                    third-party platform policies
                                </li>

                            </ul>

                        </section>


                        {{-- =================================================
                            06
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    06
                                </span>

                                <h2>
                                    Third-Party Services
                                </h2>

                            </div>


                            <p>
                                Capsulty may integrate with third-party
                                services required to provide certain
                                functionality.
                            </p>


                            <p>
                                These services may include WhatsApp Business
                                Platform, cloud hosting providers, payment
                                providers, messaging services, and other
                                technical services.
                            </p>


                            <p>
                                Third-party services are subject to their
                                own terms, policies, and privacy practices.
                            </p>


                            <p>
                                Capsulty is not responsible for changes,
                                interruptions, or failures caused by
                                third-party services outside its reasonable
                                control.
                            </p>

                        </section>


                        {{-- =================================================
                            07
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    07
                                </span>

                                <h2>
                                    Service Availability
                                </h2>

                            </div>


                            <p>
                                Capsulty aims to provide a reliable and secure
                                service but does not guarantee uninterrupted
                                or error-free operation.
                            </p>


                            <p>
                                The Service may temporarily become unavailable
                                due to:
                            </p>


                            <ul>

                                <li>Scheduled maintenance</li>

                                <li>Software updates</li>

                                <li>Server or infrastructure problems</li>

                                <li>Security incidents</li>

                                <li>Internet or network failures</li>

                                <li>Third-party service interruptions</li>

                                <li>
                                    Events beyond our reasonable control
                                </li>

                            </ul>

                        </section>


                        {{-- =================================================
                            08
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    08
                                </span>

                                <h2>
                                    Subscription and Payment
                                </h2>

                            </div>


                            <p>
                                Where Capsulty requires a paid subscription,
                                the pharmacy agrees to pay the applicable
                                subscription fees according to the selected
                                plan.
                            </p>


                            <p>
                                Subscription prices, billing periods, features,
                                and plans may be changed in the future with
                                reasonable notice where applicable.
                            </p>


                            <p>
                                Failure to pay applicable fees may result in
                                suspension or termination of access to paid
                                features.
                            </p>

                        </section>


                        {{-- =================================================
                            09
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    09
                                </span>

                                <h2>
                                    Data and Account Termination
                                </h2>

                            </div>


                            <p>
                                If a pharmacy terminates its account, Capsulty
                                may retain certain information for a reasonable
                                period where necessary for legal, security,
                                accounting, dispute-resolution, or other
                                legitimate operational purposes.
                            </p>


                            <p>
                                Where applicable, pharmacies may request
                                deletion of their account and associated
                                information subject to legal and operational
                                requirements.
                            </p>

                        </section>


                        {{-- =================================================
                            10
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    10
                                </span>

                                <h2>
                                    Intellectual Property
                                </h2>

                            </div>


                            <p>
                                Capsulty, including its software, source code,
                                design, interface, branding, documentation,
                                and related materials, is owned by or licensed
                                to Eng. Mohammed Fayez and/or Capsulty, unless
                                otherwise stated.
                            </p>


                            <p>
                                Users receive a limited, non-exclusive right
                                to use the Service during their authorized
                                subscription or access period.
                            </p>


                            <p>
                                Users may not copy, modify, distribute,
                                reverse engineer, resell, or commercially
                                exploit the Service except where expressly
                                permitted by applicable law or by written
                                authorization.
                            </p>

                        </section>


                        {{-- =================================================
                            11
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    11
                                </span>

                                <h2>
                                    Security
                                </h2>

                            </div>


                            <p>
                                Users are responsible for maintaining the
                                confidentiality of their account credentials
                                and for ensuring that authorized users follow
                                appropriate security practices.
                            </p>


                            <p>
                                Capsulty will take reasonable measures to
                                protect the platform, but no online service
                                can guarantee complete security.
                            </p>

                        </section>


                        {{-- =================================================
                            12
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    12
                                </span>

                                <h2>
                                    Suspension and Termination
                                </h2>

                            </div>


                            <p>
                                Capsulty may suspend or terminate access to
                                an account when necessary if the user:
                            </p>


                            <ul>

                                <li>
                                    Violates these Terms
                                </li>

                                <li>
                                    Uses the Service unlawfully
                                </li>

                                <li>
                                    Abuses WhatsApp messaging
                                </li>

                                <li>
                                    Sends unauthorized or prohibited
                                    communications
                                </li>

                                <li>
                                    Attempts to compromise the security
                                    of the Service
                                </li>

                                <li>
                                    Fails to pay applicable subscription fees
                                </li>

                                <li>
                                    Engages in activity that may harm Capsulty,
                                    its users, or third parties
                                </li>

                            </ul>


                            <p class="mt-5">
                                Where appropriate, Capsulty may provide notice
                                before suspension or termination.
                            </p>

                        </section>


                        {{-- =================================================
                            13
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    13
                                </span>

                                <h2>
                                    Limitation of Liability
                                </h2>

                            </div>


                            <p>
                                To the extent permitted by applicable law,
                                Capsulty shall not be responsible for losses
                                resulting from:
                            </p>


                            <ul>

                                <li>
                                    Incorrect information entered by users
                                </li>

                                <li>
                                    Incorrect prescription or medication
                                    information provided by a pharmacy
                                </li>

                                <li>
                                    Unauthorized use resulting from
                                    compromised credentials
                                </li>

                                <li>
                                    Customer or pharmacy misuse of the Service
                                </li>

                                <li>
                                    WhatsApp or other third-party service
                                    interruptions
                                </li>

                                <li>
                                    Changes to third-party policies or APIs
                                </li>

                                <li>
                                    Internet, hosting, or infrastructure
                                    failures outside our reasonable control
                                </li>

                                <li>
                                    Events beyond our reasonable control
                                </li>

                            </ul>

                        </section>


                        {{-- =================================================
                            14
                        ================================================== --}}

                        <section class="terms-section">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    14
                                </span>

                                <h2>
                                    Changes to These Terms
                                </h2>

                            </div>


                            <p>
                                Capsulty may update these Terms from time
                                to time.
                            </p>


                            <p>
                                When changes are made, the "Last Updated"
                                date will be updated.
                            </p>


                            <p>
                                Continued use of the Service after the
                                updated Terms become effective constitutes
                                acceptance of the updated Terms to the extent
                                permitted by applicable law.
                            </p>

                        </section>


                        {{-- =================================================
                            15 — CONTACT
                        ================================================== --}}

                        <section class="terms-section terms-contact">

                            <div class="terms-section-heading">

                                <span class="terms-number">
                                    15
                                </span>

                                <h2>
                                    Contact Us
                                </h2>

                            </div>


                            <p>
                                For questions regarding these Terms,
                                please contact us.
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

                                <br>

                                Website:
                                <a
                                    href="https://capsulty.tech"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    capsulty.tech
                                </a>

                            </p>

                        </section>


                        {{-- =================================================
                            COPYRIGHT
                        ================================================== --}}

                        <div class="terms-footer-note">

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