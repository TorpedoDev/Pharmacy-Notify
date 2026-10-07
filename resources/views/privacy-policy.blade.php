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
        Privacy Policy
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
           PRIVACY PAGE
        ========================================================= */

        .privacy-page {
            position: relative;
            padding-bottom: 110px;
        }

        .privacy-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Decorative background circles */

        .privacy-orb {
            position: absolute;
            pointer-events: none;
            border-radius: 999px;
            filter: blur(2px);
        }

        .privacy-orb-one {
            top: 100px;
            left: -180px;
            width: 380px;
            height: 380px;
            background: rgba(20, 184, 166, 0.06);
        }

        .privacy-orb-two {
            top: 650px;
            right: -220px;
            width: 420px;
            height: 420px;
            background: rgba(15, 118, 110, 0.05);
        }

        /* =========================================================
           MAIN CARD
        ========================================================= */

        .privacy-card {
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

        .privacy-card::before {
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

        .privacy-header {
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

        .privacy-header::after {
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

        .privacy-badge {
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

        .privacy-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: #14b8a6;
            box-shadow:
                0 0 0 4px rgba(20, 184, 166, 0.12),
                0 0 12px rgba(20, 184, 166, 0.35);
        }

        .privacy-title {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #082f2d;
            font-size: clamp(2.4rem, 5vw, 4.2rem);
            font-weight: 950;
            letter-spacing: -0.06em;
            line-height: 1.02;
        }

        .privacy-subtitle {
            position: relative;
            z-index: 2;
            max-width: 780px;
            margin-top: 20px;
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .privacy-date {
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

        .privacy-content {
            padding: 52px 68px 68px;
        }

        /* Introduction */

        .privacy-intro {
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

        .privacy-intro::before {
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

        .privacy-intro strong {
            color: #0f766e;
            font-weight: 900;
        }

        /* Sections */

        .privacy-section {
            position: relative;
            margin-top: 46px;
        }

        .privacy-section:first-child {
            margin-top: 0;
        }

        .privacy-section-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .privacy-number {
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

        .privacy-section h2 {
            margin: 0;
            color: #0f3f3c;
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -0.028em;
            line-height: 1.35;
        }

        .privacy-section p {
            margin: 0 0 17px;
            color: #475569;
            font-size: .98rem;
            line-height: 1.95;
        }

        .privacy-section ul {
            margin: 16px 0 0;
            padding: 0;
            list-style: none;
        }

        .privacy-section li {
            position: relative;
            margin: 11px 0;
            padding-inline-start: 27px;
            color: #475569;
            font-size: .96rem;
            line-height: 1.8;
        }

        .privacy-section li::before {
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

        .privacy-highlight {
            color: #0f766e;
            font-weight: 850;
        }

        /* =========================================================
           CONTACT SECTION
        ========================================================= */

        .privacy-contact {
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

        .privacy-contact .privacy-section-heading {
            margin-bottom: 20px;
        }

        .privacy-contact .privacy-number {
            background: rgba(255,255,255,.12);
            box-shadow: none;
        }

        .privacy-contact h2 {
            color: white;
        }

        .privacy-contact p {
            color: rgba(255,255,255,.78);
        }

        .privacy-contact strong {
            color: white;
        }

        .privacy-contact a {
            color: #5eead4;
            font-weight: 800;
            text-decoration: none;
            transition: color .2s ease;
        }

        .privacy-contact a:hover {
            color: white;
            text-decoration: underline;
        }

        /* =========================================================
           FOOTER NOTE
        ========================================================= */

        .privacy-footer-note {
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
            .privacy-header {
                padding: 52px 48px 42px;
            }

            .privacy-content {
                padding: 44px 48px 58px;
            }
        }

        @media (max-width: 768px) {
            .privacy-container {
                padding: 0 16px;
            }

            .privacy-card {
                border-radius: 26px;
            }

            .privacy-header {
                padding: 46px 28px 36px;
            }

            .privacy-content {
                padding: 36px 28px 46px;
            }

            .privacy-title {
                font-size: 2.7rem;
            }

            .privacy-subtitle {
                font-size: .96rem;
            }

            .privacy-section-heading {
                align-items: flex-start;
            }

            .privacy-section h2 {
                font-size: 1.18rem;
            }
        }

        @media (max-width: 640px) {
            .privacy-page {
                padding-bottom: 70px;
            }

            .privacy-container {
                padding: 0 12px;
            }

            .privacy-header {
                padding: 38px 22px 30px;
            }

            .privacy-content {
                padding: 30px 22px 38px;
            }

            .privacy-title {
                font-size: 2.25rem;
                letter-spacing: -0.045em;
            }

            .privacy-badge {
                font-size: 9px;
            }

            .privacy-intro {
                padding: 22px 21px;
                font-size: .92rem;
            }

            .privacy-section {
                margin-top: 38px;
            }

            .privacy-section-heading {
                gap: 11px;
            }

            .privacy-number {
                width: 35px;
                height: 35px;
                border-radius: 10px;
                font-size: .68rem;
            }

            .privacy-section h2 {
                font-size: 1.08rem;
            }

            .privacy-section p,
            .privacy-section li {
                font-size: .91rem;
            }

            .privacy-contact {
                padding: 24px 21px;
            }
        }

        @media (max-width: 380px) {
            .privacy-title {
                font-size: 2rem;
            }

            .privacy-header {
                padding-inline: 18px;
            }

            .privacy-content {
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

                    {{-- =================================================
                        LOGO
                    ================================================== --}}

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


                    {{-- =================================================
                        DESKTOP NAVIGATION
                    ================================================== --}}

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


                    {{-- =================================================
                        ACTIONS
                    ================================================== --}}

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
        PRIVACY POLICY
    ========================================================== --}}

    <main>

        <section
            id="home"
            class="privacy-page relative overflow-hidden pt-36 sm:pt-40"
        >

            {{-- Decorative elements --}}

            <div class="privacy-orb privacy-orb-one"></div>

            <div class="privacy-orb privacy-orb-two"></div>


            <div class="privacy-container">

                <article class="privacy-card">

                    {{-- =================================================
                        PRIVACY HEADER
                    ================================================== --}}

                    <header class="privacy-header">

                        <div class="privacy-badge">

                            <span class="privacy-badge-dot"></span>

                            Privacy & Security

                        </div>


                        <h1 class="privacy-title">
                            Privacy Policy
                        </h1>


                        <p class="privacy-subtitle">

                            Your privacy matters to us. This policy explains
                            how Capsulty processes, protects, and manages
                            information when pharmacies and their authorized
                            users use our platform.

                        </p>


                        <div class="privacy-date">

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

                    <div class="privacy-content">


                        {{-- INTRODUCTION --}}

                        <div class="privacy-intro">

                            <strong>Capsulty</strong>
                            ("Capsulty", "we", "us", or "our") provides a
                            cloud-based pharmacy management system that enables
                            pharmacies and their authorized employees to manage
                            customers, prescriptions, medication orders,
                            dispensing records, refill reminders, and related
                            pharmacy operations.

                            <br><br>

                            This Privacy Policy explains how information is
                            processed when pharmacies and their authorized
                            users use the Capsulty platform.

                        </div>


                        {{-- =================================================
                            01
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    01
                                </span>

                                <h2>
                                    Information We Process
                                </h2>

                            </div>


                            <p>
                                Capsulty may process information entered into
                                the platform by pharmacies and their authorized
                                users.
                            </p>


                            <p>
                                Depending on how the pharmacy uses the platform,
                                this information may include:
                            </p>


                            <ul>

                                <li>Customer names</li>

                                <li>Phone numbers and WhatsApp numbers</li>

                                <li>Prescription information</li>

                                <li>Medication names and related information</li>

                                <li>Medication dosage and duration information</li>

                                <li>Medication dispensing and refill information</li>

                                <li>Pharmacy account information</li>

                                <li>User account and authentication information</li>

                                <li>
                                    Technical information necessary to operate
                                    and secure the platform
                                </li>

                            </ul>


                            <p class="mt-5">

                                Capsulty does not obtain customer information
                                directly from WhatsApp. Customer information is
                                entered into Capsulty by the pharmacy or its
                                authorized users.

                            </p>

                        </section>


                        {{-- =================================================
                            02
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    02
                                </span>

                                <h2>
                                    How We Use Information
                                </h2>

                            </div>


                            <p>
                                We process information as necessary to provide
                                the services requested by pharmacies.
                            </p>


                            <p>
                                This may include:
                            </p>


                            <ul>

                                <li>
                                    Managing pharmacy customers
                                </li>

                                <li>
                                    Managing prescriptions and medication records
                                </li>

                                <li>
                                    Managing medication orders and dispensing
                                </li>

                                <li>
                                    Managing refill reminders
                                </li>

                                <li>
                                    Sending customer notifications requested
                                    by the pharmacy
                                </li>

                                <li>
                                    Sending medication-related WhatsApp messages
                                </li>

                                <li>
                                    Providing system notifications
                                </li>

                                <li>
                                    Maintaining and securing the platform
                                </li>

                                <li>
                                    Preventing unauthorized access, abuse,
                                    and security incidents
                                </li>

                                <li>
                                    Providing technical support to authorized users
                                </li>

                            </ul>

                        </section>


                        {{-- =================================================
                            03
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    03
                                </span>

                                <h2>
                                    WhatsApp Communications
                                </h2>

                            </div>


                            <p>
                                Capsulty may use the WhatsApp Business Platform
                                to send messages to customers on behalf of
                                pharmacies using the platform.
                            </p>


                            <p>
                                These messages may include:
                            </p>


                            <ul>

                                <li>Medication reminders</li>

                                <li>
                                    Prescription-related notifications
                                </li>

                                <li>
                                    Medication refill reminders
                                </li>

                                <li>
                                    Order-related notifications
                                </li>

                                <li>
                                    Other service-related communications
                                    configured or requested by the pharmacy
                                </li>

                            </ul>


                            <p class="mt-5">
                                WhatsApp messages may be sent using message
                                templates approved by WhatsApp where required.
                            </p>


                            <p>
                                The pharmacy is responsible for ensuring that
                                it has the appropriate consent, authorization,
                                or other lawful basis required to send WhatsApp
                                communications to its customers.
                            </p>


                            <p>
                                Customers who no longer wish to receive WhatsApp
                                communications should contact the relevant
                                pharmacy and request that such communications
                                be stopped.
                            </p>

                        </section>


                        {{-- =================================================
                            04
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    04
                                </span>

                                <h2>
                                    Data Controller and Pharmacy Responsibilities
                                </h2>

                            </div>


                            <p>
                                The pharmacy using Capsulty is responsible for
                                the customer information it enters into the
                                platform and for determining how that information
                                should be used for its business operations.
                            </p>


                            <p>
                                Pharmacies are responsible for:
                            </p>


                            <ul>

                                <li>
                                    Ensuring that customer information is
                                    collected and used lawfully
                                </li>

                                <li>
                                    Providing appropriate notices to their customers
                                </li>

                                <li>
                                    Obtaining any required consent or other
                                    lawful basis
                                </li>

                                <li>
                                    Ensuring that WhatsApp communications are permitted
                                </li>

                                <li>
                                    Keeping customer information accurate
                                </li>

                                <li>
                                    Responding to customer requests where
                                    required by applicable law
                                </li>

                            </ul>


                            <p class="mt-5">
                                Capsulty provides the technology infrastructure
                                used by pharmacies to manage and process this
                                information.
                            </p>

                        </section>


                        {{-- =================================================
                            05
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    05
                                </span>

                                <h2>
                                    Sharing of Information
                                </h2>

                            </div>


                            <p>

                                <span class="privacy-highlight">
                                    Capsulty does not sell customer personal
                                    information.
                                </span>

                            </p>


                            <p>
                                Information may be processed by third-party
                                service providers that are necessary to operate
                                the platform, including:
                            </p>


                            <ul>

                                <li>
                                    Cloud hosting and infrastructure providers
                                </li>

                                <li>
                                    Database and storage providers
                                </li>

                                <li>
                                    Communication service providers
                                </li>

                                <li>
                                    WhatsApp Business Platform
                                </li>

                                <li>
                                    Security and technical service providers
                                </li>

                            </ul>


                            <p class="mt-5">
                                Information is shared or processed only as
                                necessary to provide, maintain, secure, and
                                improve the service, comply with legal obligations,
                                or protect the rights and security of Capsulty
                                and its users.
                            </p>

                        </section>


                        {{-- =================================================
                            06
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    06
                                </span>

                                <h2>
                                    WhatsApp and Meta
                                </h2>

                            </div>


                            <p>
                                When a pharmacy uses WhatsApp messaging through
                                Capsulty, relevant information may be transmitted
                                to Meta and the WhatsApp Business Platform for
                                the purpose of delivering the requested WhatsApp
                                messages.
                            </p>


                            <p>
                                The use of WhatsApp is also subject to WhatsApp's
                                and Meta's applicable terms, policies, and
                                requirements.
                            </p>


                            <p>
                                Capsulty does not control the privacy practices
                                of Meta or WhatsApp. Users should review the
                                applicable privacy policies of those services
                                for additional information.
                            </p>

                        </section>


                        {{-- =================================================
                            07
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    07
                                </span>

                                <h2>
                                    Data Security
                                </h2>

                            </div>


                            <p>
                                Capsulty uses reasonable technical and
                                organizational measures designed to protect
                                information against unauthorized access,
                                loss, alteration, disclosure, or destruction.
                            </p>


                            <p>
                                These measures may include access controls,
                                authentication mechanisms, secure server
                                infrastructure, and other security practices
                                appropriate to the operation of the platform.
                            </p>


                            <p>
                                However, no internet-based system can guarantee
                                absolute security.
                            </p>

                        </section>


                        {{-- =================================================
                            08
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    08
                                </span>

                                <h2>
                                    Data Retention
                                </h2>

                            </div>


                            <p>
                                Capsulty retains information for as long as
                                reasonably necessary to provide the service,
                                maintain operational records, comply with
                                applicable legal obligations, resolve disputes,
                                enforce agreements, and protect the security
                                of the platform.
                            </p>


                            <p>
                                A pharmacy may request deletion or modification
                                of information where applicable and subject to
                                legal and operational requirements.
                            </p>

                        </section>


                        {{-- =================================================
                            09
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    09
                                </span>

                                <h2>
                                    Customer Requests
                                </h2>

                            </div>


                            <p>
                                Customers whose information is managed by a
                                pharmacy should generally contact the relevant
                                pharmacy regarding requests to access, correct,
                                or delete their information.
                            </p>


                            <p>
                                If a request concerns information directly
                                managed by Capsulty, the individual may contact
                                us using the contact information provided below.
                            </p>

                        </section>


                        {{-- =================================================
                            10
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    10
                                </span>

                                <h2>
                                    Children's Privacy
                                </h2>

                            </div>


                            <p>
                                Capsulty is designed for pharmacies and their
                                authorized employees and is not intended to be
                                used directly by children.
                            </p>

                        </section>


                        {{-- =================================================
                            11
                        ================================================== --}}

                        <section class="privacy-section">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    11
                                </span>

                                <h2>
                                    Changes to This Privacy Policy
                                </h2>

                            </div>


                            <p>
                                Capsulty may update this Privacy Policy from
                                time to time.
                            </p>


                            <p>
                                When changes are made, the "Last Updated" date
                                at the beginning of this Privacy Policy will
                                be updated.
                            </p>

                        </section>


                        {{-- =================================================
                            12 — CONTACT
                        ================================================== --}}

                        <section class="privacy-section privacy-contact">

                            <div class="privacy-section-heading">

                                <span class="privacy-number">
                                    12
                                </span>

                                <h2>
                                    Contact Us
                                </h2>

                            </div>


                            <p>
                                If you have questions or concerns regarding
                                this Privacy Policy or the processing of
                                information through Capsulty, please contact us.
                            </p>


                            <p>

                                <strong>Capsulty</strong>
                                <br>

                                Owner: Eng. Mohammed Fayez
                                <br>

                                Country: Egypt
                                <br>

                                Email:
                                <a href="mailto:mohammedfayezdiab@gmail.com">
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

                        <div class="privacy-footer-note">

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