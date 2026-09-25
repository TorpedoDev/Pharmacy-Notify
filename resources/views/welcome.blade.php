{{-- <!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PharmaCare — Smart Pharmacy Management</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: {
                            50: '#FCFBF7',
                            100: '#F7F5ED',
                            200: '#EEEBDD',
                            300: '#E3DEC9'
                        },
                        teal: {
                            50: '#EFFAF8',
                            100: '#D9F3EF',
                            200: '#B7E7E0',
                            300: '#83D4CA',
                            400: '#4DB9AD',
                            500: '#269D92',
                            600: '#198178',
                            700: '#166A64',
                            800: '#155550',
                            900: '#123F3D'
                        }
                    },
                    boxShadow: {
                        soft: '0 20px 60px rgba(21, 85, 80, 0.10)',
                        card: '0 12px 35px rgba(21, 85, 80, 0.08)'
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #FCFBF7;
        }

        html[dir="rtl"] body {
            font-family: 'Cairo', sans-serif;
        }

        .hero-grid {
            background-image:
                linear-gradient(rgba(38, 157, 146, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(38, 157, 146, .055) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .blob {
            filter: blur(1px);
        }

        .float {
            animation: float 5s ease-in-out infinite;
        }

        .float-delay {
            animation: float 6s ease-in-out 1s infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(25px);
            transition: all .7s ease;
        }

        .fade-up.show {
            opacity: 1;
            transform: translateY(0);
        }

        .glass {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .pricing-popular {
            box-shadow:
                0 25px 70px rgba(38, 157, 146, .20),
                0 0 0 1px rgba(38, 157, 146, .15);
        }

        .whatsapp-pulse {
            animation: whatsappPulse 2.2s infinite;
        }

        @keyframes whatsappPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, .4);
            }

            70% {
                box-shadow: 0 0 0 16px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* RTL fixes */
        html[dir="rtl"] .rtl-flip {
            transform: scaleX(-1);
        }

        .feature-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 50px rgba(21, 85, 80, .11);
        }
    </style>
</head>

<body class="text-teal-900">

    <!-- ========================================================= -->
    <!-- NAVBAR -->
    <!-- ========================================================= -->

    <header class="fixed top-0 left-0 right-0 z-50">

        <nav class="mx-auto max-w-7xl px-5 lg:px-8 mt-4">

            <div
                class="glass border border-white/70 rounded-2xl shadow-sm h-16 px-5 flex items-center justify-between">

                <!-- Logo -->
                <a href="#" class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center shadow-lg shadow-teal-600/20">

                        <svg width="23" height="23" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M7 3V21M17 3V21M3 7H21M3 17H21"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <div>
                        <div class="font-extrabold text-lg leading-none">
                            PharmaCare
                        </div>

                        <div
                            class="text-[10px] uppercase tracking-widest text-teal-600 mt-1"
                            data-i18n="brand_tagline"
                        >
                            Smart Pharmacy
                        </div>
                    </div>

                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-8 text-sm font-semibold">

                    <a href="#features"
                       class="hover:text-teal-600 transition"
                       data-i18n="nav_features">
                        Features
                    </a>

                    <a href="#how-it-works"
                       class="hover:text-teal-600 transition"
                       data-i18n="nav_how">
                        How it works
                    </a>

                    <a href="#pricing"
                       class="hover:text-teal-600 transition"
                       data-i18n="nav_pricing">
                        Pricing
                    </a>

                    <a href="#about"
                       class="hover:text-teal-600 transition"
                       data-i18n="nav_about">
                        About
                    </a>

                </div>

                <!-- Right Actions -->
                <div class="hidden lg:flex items-center gap-3">

                    <!-- Language -->
                    <button
                        onclick="toggleLanguage()"
                        class="h-10 px-4 rounded-xl border border-teal-100 bg-white hover:bg-teal-50 transition font-semibold text-sm flex items-center gap-2">

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none">
                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M3 12H21M12 3C14.5 5.5 15.5 8.5 15.5 12C15.5 15.5 14.5 18.5 12 21M12 3C9.5 5.5 8.5 8.5 8.5 12C8.5 15.5 9.5 18.5 12 21"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />
                        </svg>

                        <span id="languageText">العربية</span>

                    </button>

                    <a
                        href="#register"
                        class="px-5 py-2.5 rounded-xl bg-teal-600 text-white font-bold text-sm hover:bg-teal-700 transition shadow-lg shadow-teal-600/20"
                        data-i18n="nav_register">
                        Register Pharmacy
                    </a>

                </div>

                <!-- Mobile button -->
                <button
                    onclick="toggleMobileMenu()"
                    class="lg:hidden w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-700">

                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M4 7H20M4 12H20M4 17H20"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                    </svg>

                </button>

            </div>

            <!-- Mobile menu -->
            <div
                id="mobileMenu"
                class="hidden mt-2 glass rounded-2xl border border-white/70 shadow-lg p-4">

                <div class="flex flex-col gap-2">

                    <a href="#features"
                       onclick="closeMobileMenu()"
                       class="p-3 rounded-xl hover:bg-teal-50"
                       data-i18n="nav_features">
                        Features
                    </a>

                    <a href="#how-it-works"
                       onclick="closeMobileMenu()"
                       class="p-3 rounded-xl hover:bg-teal-50"
                       data-i18n="nav_how">
                        How it works
                    </a>

                    <a href="#pricing"
                       onclick="closeMobileMenu()"
                       class="p-3 rounded-xl hover:bg-teal-50"
                       data-i18n="nav_pricing">
                        Pricing
                    </a>

                    <a href="#about"
                       onclick="closeMobileMenu()"
                       class="p-3 rounded-xl hover:bg-teal-50"
                       data-i18n="nav_about">
                        About
                    </a>

                    <button
                        onclick="toggleLanguage()"
                        class="p-3 rounded-xl bg-teal-50 text-teal-700 font-bold text-start">

                        <span data-i18n="language_switch">
                            العربية
                        </span>

                    </button>

                    <a
                        href="#register"
                        onclick="closeMobileMenu()"
                        class="p-3 rounded-xl bg-teal-600 text-white font-bold text-center"
                        data-i18n="nav_register">
                        Register Pharmacy
                    </a>

                </div>

            </div>

        </nav>

    </header>


    <!-- ========================================================= -->
    <!-- HERO -->
    <!-- ========================================================= -->

    <section class="relative overflow-hidden min-h-screen pt-32 lg:pt-40 hero-grid">

        <!-- Background blobs -->

        <div class="absolute -top-40 -right-40 w-96 h-96 bg-teal-200/40 rounded-full blob"></div>

        <div class="absolute bottom-0 -left-40 w-96 h-96 bg-teal-100/50 rounded-full blob"></div>

        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-cream-300/30 rounded-full"></div>


        <div class="relative max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-14 items-center min-h-[720px]">

                <!-- Hero text -->

                <div class="max-w-xl fade-up">

                    <div
                        class="inline-flex items-center gap-2 bg-teal-50 border border-teal-100 text-teal-700 px-4 py-2 rounded-full text-sm font-bold mb-7">

                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>

                        <span data-i18n="hero_badge">
                            Smart technology for modern pharmacies
                        </span>

                    </div>

                    <h1
                        class="text-5xl lg:text-7xl font-extrabold tracking-tight leading-[1.05] text-teal-900">

                        <span data-i18n="hero_title_1">
                            Your pharmacy.
                        </span>

                        <br>

                        <span class="text-teal-500" data-i18n="hero_title_2">
                            Smarter care.
                        </span>

                    </h1>

                    <p
                        class="mt-7 text-lg leading-8 text-teal-800/65 max-w-lg"
                        data-i18n="hero_description">

                        Manage prescriptions, track medications, and automatically
                        remind your patients through WhatsApp — all from one simple
                        pharmacy platform.
                    </p>

                    <div class="mt-9 flex flex-col sm:flex-row gap-4">

                        <a
                            href="#register"
                            class="group px-7 py-4 rounded-2xl bg-teal-600 text-white font-bold flex items-center justify-center gap-3 hover:bg-teal-700 transition shadow-xl shadow-teal-600/20">

                            <span data-i18n="hero_cta">
                                Start your pharmacy
                            </span>

                            <svg
                                class="rtl-flip group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none">

                                <path
                                    d="M5 12H19M19 12L12 5M19 12L12 19"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </a>

                        <a
                            href="#features"
                            class="px-7 py-4 rounded-2xl bg-white border border-teal-100 text-teal-800 font-bold flex items-center justify-center hover:bg-teal-50 transition"
                            data-i18n="hero_secondary">

                            Explore features

                        </a>

                    </div>

                    <!-- Trust -->

                    <div class="mt-10 flex flex-wrap items-center gap-6 text-sm text-teal-800/55">

                        <div class="flex items-center gap-2">

                            <div class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600">
                                ✓
                            </div>

                            <span data-i18n="trust_no_setup">
                                Easy setup
                            </span>

                        </div>

                        <div class="flex items-center gap-2">

                            <div class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600">
                                ✓
                            </div>

                            <span data-i18n="trust_cloud">
                                Cloud based
                            </span>

                        </div>

                        <div class="flex items-center gap-2">

                            <div class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600">
                                ✓
                            </div>

                            <span data-i18n="trust_secure">
                                Secure
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Dashboard mockup -->

                <div class="relative fade-up">

                    <!-- Floating notification -->

                    <div
                        class="absolute -left-3 lg:-left-10 top-20 z-20 float glass border border-white rounded-2xl p-4 shadow-soft w-56">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M20 11.5A8.1 8.1 0 0 1 11.8 20A8 8 0 0 1 8 19L4 20L5 16.2A8 8 0 1 1 20 11.5Z"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p
                                    class="text-xs text-teal-800/50"
                                    data-i18n="whatsapp_label">
                                    WhatsApp reminder
                                </p>

                                <p
                                    class="font-bold text-sm"
                                    data-i18n="whatsapp_sent">
                                    Message sent ✓
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Main dashboard -->

                    <div
                        class="relative bg-white rounded-[2rem] border border-teal-100 shadow-soft p-5 lg:p-7 rotate-1">

                        <!-- Dashboard header -->

                        <div class="flex items-center justify-between mb-7">

                            <div>

                                <p
                                    class="text-xs text-teal-800/40 font-semibold"
                                    data-i18n="dashboard_label">
                                    PHARMACY DASHBOARD
                                </p>

                                <h3
                                    class="text-xl font-extrabold mt-1"
                                    data-i18n="dashboard_title">
                                    Good morning, Pharmacy
                                </h3>

                            </div>

                            <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">

                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M4 19V5M4 19H20M8 16V12M12 16V8M16 16V10M20 16V6"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                    />
                                </svg>

                            </div>

                        </div>


                        <!-- Stats -->

                        <div class="grid grid-cols-3 gap-3 mb-5">

                            <div class="bg-cream-100 rounded-2xl p-4">

                                <p class="text-xs text-teal-800/45" data-i18n="stat_patients">
                                    Patients
                                </p>

                                <p class="text-2xl font-extrabold mt-2">
                                    1,248
                                </p>

                                <p class="text-xs text-teal-600 mt-1">
                                    +12.5%
                                </p>

                            </div>

                            <div class="bg-teal-50 rounded-2xl p-4">

                                <p class="text-xs text-teal-800/45" data-i18n="stat_prescriptions">
                                    Prescriptions
                                </p>

                                <p class="text-2xl font-extrabold mt-2">
                                    384
                                </p>

                                <p class="text-xs text-teal-600 mt-1">
                                    +8.2%
                                </p>

                            </div>

                            <div class="bg-cream-100 rounded-2xl p-4">

                                <p class="text-xs text-teal-800/45" data-i18n="stat_reminders">
                                    Reminders
                                </p>

                                <p class="text-2xl font-extrabold mt-2">
                                    927
                                </p>

                                <p class="text-xs text-teal-600 mt-1">
                                    +18.4%
                                </p>

                            </div>

                        </div>


                        <!-- Chart -->

                        <div class="border border-teal-50 rounded-2xl p-5">

                            <div class="flex justify-between items-center mb-5">

                                <div>

                                    <p
                                        class="text-sm font-bold"
                                        data-i18n="chart_title">
                                        Patient activity
                                    </p>

                                    <p
                                        class="text-xs text-teal-800/40 mt-1"
                                        data-i18n="chart_subtitle">
                                        Medication reminders this week
                                    </p>

                                </div>

                                <span
                                    class="text-xs font-bold text-teal-600 bg-teal-50 px-3 py-1.5 rounded-lg">
                                    +24%
                                </span>

                            </div>

                            <div class="h-32 flex items-end gap-3">

                                <div class="flex-1 bg-teal-100 rounded-t-lg h-[38%]"></div>
                                <div class="flex-1 bg-teal-200 rounded-t-lg h-[52%]"></div>
                                <div class="flex-1 bg-teal-300 rounded-t-lg h-[43%]"></div>
                                <div class="flex-1 bg-teal-400 rounded-t-lg h-[68%]"></div>
                                <div class="flex-1 bg-teal-500 rounded-t-lg h-[78%]"></div>
                                <div class="flex-1 bg-teal-400 rounded-t-lg h-[60%]"></div>
                                <div class="flex-1 bg-teal-300 rounded-t-lg h-[88%]"></div>

                            </div>

                        </div>


                        <!-- Reminder -->

                        <div
                            class="mt-4 rounded-2xl bg-teal-900 p-4 text-white flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">

                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M18 8A6 6 0 0 0 6 8C6 15 3 15 3 17H21C21 15 18 15 18 8ZM10 21H14"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            stroke-linecap="round"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p
                                        class="text-sm font-bold"
                                        data-i18n="upcoming_title">
                                        Upcoming reminders
                                    </p>

                                    <p
                                        class="text-xs text-white/50"
                                        data-i18n="upcoming_desc">
                                        18 patients today
                                    </p>

                                </div>

                            </div>

                            <span class="text-teal-300 text-xs font-bold">
                                View
                            </span>

                        </div>

                    </div>


                    <!-- Bottom floating card -->

                    <div
                        class="absolute -right-3 lg:-right-8 bottom-10 float-delay glass border border-white rounded-2xl p-4 shadow-soft">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center">

                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12 3L14.5 8.5L20.5 9L16 13L17.5 19L12 16L6.5 19L8 13L3.5 9L9.5 8.5L12 3Z"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linejoin="round"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p
                                    class="text-xs text-teal-800/40"
                                    data-i18n="adherence">
                                    Medication adherence
                                </p>

                                <p class="font-extrabold">
                                    94.8%
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- FEATURES -->
    <!-- ========================================================= -->

    <section id="features" class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="text-center max-w-2xl mx-auto fade-up">

                <span
                    class="text-sm font-bold text-teal-600 uppercase tracking-widest"
                    data-i18n="features_eyebrow">
                    Everything in one place
                </span>

                <h2
                    class="mt-4 text-4xl lg:text-5xl font-extrabold tracking-tight"
                    data-i18n="features_title">
                    Built around better pharmacy care
                </h2>

                <p
                    class="mt-5 text-teal-800/55 leading-7"
                    data-i18n="features_description">
                    Everything your pharmacy needs to manage patients,
                    prescriptions and medication reminders without the complexity.
                </p>

            </div>


            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">

                <!-- Card 1 -->

                <div class="feature-card bg-cream-50 border border-cream-200 rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M7 3H17C18.1 3 19 3.9 19 5V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V5C5 3.9 5.9 3 7 3Z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M8 7H16M8 11H16M8 15H13"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_prescriptions">
                        Prescription Management
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/55 leading-7"
                        data-i18n="feature_prescriptions_desc">
                        Create and manage prescriptions, medications,
                        dosages and treatment details in one organized system.
                    </p>

                </div>


                <!-- Card 2 -->

                <div class="feature-card bg-teal-900 text-white rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-white/10 text-teal-300 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M20 11.5A8.1 8.1 0 0 1 11.8 20A8 8 0 0 1 8 19L4 20L5 16.2A8 8 0 1 1 20 11.5Z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M8 12H8.01M12 12H12.01M16 12H16.01"
                                stroke="currentColor"
                                stroke-width="2.4"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_whatsapp">
                        WhatsApp Reminders
                    </h3>

                    <p
                        class="mt-3 text-sm text-white/55 leading-7"
                        data-i18n="feature_whatsapp_desc">
                        Automatically remind patients about their medications
                        and improve adherence through WhatsApp messages.
                    </p>

                    <div class="mt-6 inline-flex items-center gap-2 text-teal-300 text-sm font-bold">

                        <span data-i18n="feature_automated">
                            Automated reminders
                        </span>

                        <span>→</span>

                    </div>

                </div>


                <!-- Card 3 -->

                <div class="feature-card bg-cream-50 border border-cream-200 rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M4 19V5M4 19H20"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />
                            <path
                                d="M8 16V12M12 16V8M16 16V10"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_dashboard">
                        Smart Dashboard
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/55 leading-7"
                        data-i18n="feature_dashboard_desc">
                        See patients, prescriptions, reminders and pharmacy
                        activity at a glance with a simple dashboard.
                    </p>

                </div>


                <!-- Card 4 -->

                <div class="feature-card bg-cream-50 border border-cream-200 rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M12 7V12L15 14"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_scheduling">
                        Reminder Scheduling
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/55 leading-7"
                        data-i18n="feature_scheduling_desc">
                        Schedule medication reminders based on treatment
                        duration, frequency and refill dates.
                    </p>

                </div>


                <!-- Card 5 -->

                <div class="feature-card bg-cream-50 border border-cream-200 rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 3L19 6V11C19 16 15.5 19.5 12 21C8.5 19.5 5 16 5 11V6L12 3Z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M9 12L11 14L15 10"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_secure">
                        Secure & Reliable
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/55 leading-7"
                        data-i18n="feature_secure_desc">
                        Keep your pharmacy data organized with secure access
                        and reliable cloud infrastructure.
                    </p>

                </div>


                <!-- Card 6 -->

                <div class="feature-card bg-cream-50 border border-cream-200 rounded-3xl p-7 fade-up">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 4H18C19.1 4 20 4.9 20 6V18C20 19.1 19.1 20 18 20H6C4.9 20 4 19.1 4 18V6C4 4.9 4.9 4 6 4Z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                            <path
                                d="M8 8H16M8 12H16M8 16H13"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="feature_patients">
                        Patient Profiles
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/55 leading-7"
                        data-i18n="feature_patients_desc">
                        Keep complete patient information and treatment
                        history available whenever your pharmacy needs it.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- WHATSAPP SECTION -->
    <!-- ========================================================= -->

    <section class="py-24 bg-cream-100 overflow-hidden">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Phone -->

                <div class="relative flex justify-center fade-up">

                    <div
                        class="absolute w-80 h-80 bg-teal-200/40 rounded-full blur-3xl">
                    </div>

                    <div
                        class="relative w-[290px] bg-teal-900 rounded-[3rem] p-3 shadow-soft rotate-[-3deg]">

                        <div class="bg-white rounded-[2.5rem] overflow-hidden">

                            <!-- Phone header -->

                            <div class="bg-teal-600 text-white px-5 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M20 11.5A8.1 8.1 0 0 1 11.8 20A8 8 0 0 1 8 19L4 20L5 16.2A8 8 0 1 1 20 11.5Z"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="font-bold">
                                            PharmaCare
                                        </p>

                                        <p class="text-xs text-white/60">
                                            online
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <!-- Chat -->

                            <div class="bg-[#f1f6f4] p-4 h-[380px] flex flex-col justify-end gap-3">

                                <div
                                    class="self-start bg-white rounded-2xl rounded-bl-sm p-3 shadow-sm max-w-[85%]">

                                    <p
                                        class="text-xs text-teal-900/70 leading-5"
                                        data-i18n="whatsapp_message">

                                        Hello Ahmed 👋<br><br>
                                        This is a reminder to take your
                                        <strong>Blood Pressure medication</strong>.
                                        <br><br>
                                        Don't forget your next dose.

                                    </p>

                                    <span class="block text-[9px] text-teal-900/30 mt-2 text-right">
                                        09:30 AM
                                    </span>

                                </div>

                                <div
                                    class="self-end bg-teal-100 rounded-2xl rounded-br-sm p-3 max-w-[65%]">

                                    <p
                                        class="text-xs text-teal-900"
                                        data-i18n="whatsapp_reply">
                                        Thank you ✓
                                    </p>

                                    <span class="block text-[9px] text-teal-900/30 mt-1 text-right">
                                        09:31 AM
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Content -->

                <div class="fade-up">

                    <span
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-teal-100 text-teal-600 text-xs font-bold">

                        <span class="w-2 h-2 rounded-full bg-green-500"></span>

                        <span data-i18n="whatsapp_eyebrow">
                            Connected care
                        </span>

                    </span>

                    <h2
                        class="mt-5 text-4xl lg:text-5xl font-extrabold leading-tight"
                        data-i18n="whatsapp_title">

                        Keep patients on track,
                        <span class="text-teal-500">automatically.</span>

                    </h2>

                    <p
                        class="mt-6 text-teal-800/55 leading-8"
                        data-i18n="whatsapp_description">

                        Your pharmacy can send personalized medication
                        reminders directly to patients through WhatsApp.
                        Less manual work for your team and better treatment
                        adherence for your patients.
                    </p>

                    <div class="mt-8 space-y-5">

                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                                1
                            </div>

                            <div>

                                <h4
                                    class="font-extrabold"
                                    data-i18n="whatsapp_step1">
                                    Add the patient's treatment
                                </h4>

                                <p
                                    class="text-sm text-teal-800/50 mt-1"
                                    data-i18n="whatsapp_step1_desc">
                                    Set medication, dosage, frequency and duration.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                                2
                            </div>

                            <div>

                                <h4
                                    class="font-extrabold"
                                    data-i18n="whatsapp_step2">
                                    System schedules reminders
                                </h4>

                                <p
                                    class="text-sm text-teal-800/50 mt-1"
                                    data-i18n="whatsapp_step2_desc">
                                    Your pharmacy does not need to send messages manually.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                                3
                            </div>

                            <div>

                                <h4
                                    class="font-extrabold"
                                    data-i18n="whatsapp_step3">
                                    Patient receives WhatsApp reminder
                                </h4>

                                <p
                                    class="text-sm text-teal-800/50 mt-1"
                                    data-i18n="whatsapp_step3_desc">
                                    Patients receive timely reminders when they need them.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- HOW IT WORKS -->
    <!-- ========================================================= -->

    <section id="how-it-works" class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="text-center fade-up">

                <span
                    class="text-sm font-bold text-teal-600 uppercase tracking-widest"
                    data-i18n="how_eyebrow">
                    Simple from day one
                </span>

                <h2
                    class="mt-4 text-4xl lg:text-5xl font-extrabold"
                    data-i18n="how_title">
                    Start managing your pharmacy in minutes
                </h2>

            </div>


            <div class="grid md:grid-cols-3 gap-8 mt-16">

                <div class="text-center fade-up">

                    <div class="relative mx-auto w-20 h-20">

                        <div
                            class="w-20 h-20 rounded-3xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl font-extrabold">
                            01
                        </div>

                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="how_1">
                        Register your pharmacy
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/50 leading-7"
                        data-i18n="how_1_desc">
                        Create your pharmacy account and add your basic business information.
                    </p>

                </div>


                <div class="text-center fade-up">

                    <div
                        class="mx-auto w-20 h-20 rounded-3xl bg-teal-600 text-white flex items-center justify-center text-2xl font-extrabold shadow-lg shadow-teal-600/20">
                        02
                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="how_2">
                        Add patients & prescriptions
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/50 leading-7"
                        data-i18n="how_2_desc">
                        Build patient profiles and manage their prescriptions and treatments.
                    </p>

                </div>


                <div class="text-center fade-up">

                    <div
                        class="mx-auto w-20 h-20 rounded-3xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl font-extrabold">
                        03
                    </div>

                    <h3
                        class="text-xl font-extrabold mt-6"
                        data-i18n="how_3">
                        Let PharmaCare handle reminders
                    </h3>

                    <p
                        class="mt-3 text-sm text-teal-800/50 leading-7"
                        data-i18n="how_3_desc">
                        Automatic WhatsApp reminders keep your patients informed.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- PRICING -->
    <!-- ========================================================= -->

    <section id="pricing" class="py-24 bg-cream-100">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="text-center max-w-2xl mx-auto fade-up">

                <span
                    class="text-sm font-bold text-teal-600 uppercase tracking-widest"
                    data-i18n="pricing_eyebrow">
                    Simple pricing
                </span>

                <h2
                    class="mt-4 text-4xl lg:text-5xl font-extrabold"
                    data-i18n="pricing_title">
                    Plans that grow with your pharmacy
                </h2>

                <p
                    class="mt-5 text-teal-800/55"
                    data-i18n="pricing_description">
                    Start small and upgrade whenever your pharmacy needs more.
                </p>

            </div>


            <div class="grid lg:grid-cols-3 gap-7 mt-16 items-stretch">

                <!-- Starter -->

                <div class="bg-white rounded-3xl border border-teal-100 p-8 fade-up">

                    <span
                        class="text-sm font-bold text-teal-600"
                        data-i18n="plan_starter">
                        Starter
                    </span>

                    <p
                        class="text-sm text-teal-800/45 mt-2"
                        data-i18n="plan_starter_desc">
                        For small pharmacies
                    </p>

                    <div class="mt-7">

                        <span class="text-5xl font-extrabold">
                            $19
                        </span>

                        <span
                            class="text-sm text-teal-800/40"
                            data-i18n="month">
                            /month
                        </span>

                    </div>

                    <a
                        href="#register"
                        class="mt-7 block text-center border border-teal-200 text-teal-700 rounded-xl py-3.5 font-bold hover:bg-teal-50 transition"
                        data-i18n="choose_plan">
                        Choose plan
                    </a>

                    <div class="mt-8 space-y-4 text-sm">

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="plan_feature_1">Up to 500 patients</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="plan_feature_2">Prescription management</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="plan_feature_3">Patient profiles</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="plan_feature_4">WhatsApp reminders</span>
                        </div>

                    </div>

                </div>


                <!-- Professional -->

                <div class="relative bg-teal-900 text-white rounded-3xl p-8 pricing-popular fade-up">

                    <div
                        class="absolute top-5 end-5 bg-teal-400 text-teal-900 px-3 py-1 rounded-full text-xs font-extrabold"
                        data-i18n="popular">
                        Most popular
                    </div>

                    <span
                        class="text-sm font-bold text-teal-300"
                        data-i18n="plan_pro">
                        Professional
                    </span>

                    <p
                        class="text-sm text-white/50 mt-2"
                        data-i18n="plan_pro_desc">
                        For growing pharmacies
                    </p>

                    <div class="mt-7">

                        <span class="text-5xl font-extrabold">
                            $49
                        </span>

                        <span
                            class="text-sm text-white/40"
                            data-i18n="month">
                            /month
                        </span>

                    </div>

                    <a
                        href="#register"
                        class="mt-7 block text-center bg-teal-500 text-white rounded-xl py-3.5 font-bold hover:bg-teal-400 transition"
                        data-i18n="choose_plan">
                        Choose plan
                    </a>

                    <div class="mt-8 space-y-4 text-sm text-white/80">

                        <div class="flex gap-3">
                            <span class="text-teal-300">✓</span>
                            <span data-i18n="pro_feature_1">Unlimited patients</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-300">✓</span>
                            <span data-i18n="pro_feature_2">Everything in Starter</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-300">✓</span>
                            <span data-i18n="pro_feature_3">Advanced reminders</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-300">✓</span>
                            <span data-i18n="pro_feature_4">Analytics & reports</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-300">✓</span>
                            <span data-i18n="pro_feature_5">Priority support</span>
                        </div>

                    </div>

                </div>


                <!-- Enterprise -->

                <div class="bg-white rounded-3xl border border-teal-100 p-8 fade-up">

                    <span
                        class="text-sm font-bold text-teal-600"
                        data-i18n="plan_business">
                        Business
                    </span>

                    <p
                        class="text-sm text-teal-800/45 mt-2"
                        data-i18n="plan_business_desc">
                        For pharmacy groups
                    </p>

                    <div class="mt-7">

                        <span class="text-5xl font-extrabold">
                            $99
                        </span>

                        <span
                            class="text-sm text-teal-800/40"
                            data-i18n="month">
                            /month
                        </span>

                    </div>

                    <a
                        href="#register"
                        class="mt-7 block text-center border border-teal-200 text-teal-700 rounded-xl py-3.5 font-bold hover:bg-teal-50 transition"
                        data-i18n="contact_sales">
                        Contact us
                    </a>

                    <div class="mt-8 space-y-4 text-sm">

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="business_feature_1">Multiple branches</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="business_feature_2">Advanced analytics</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="business_feature_3">Team management</span>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-teal-500">✓</span>
                            <span data-i18n="business_feature_4">Dedicated support</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- REGISTER CTA -->
    <!-- ========================================================= -->

    <section id="register" class="py-24 bg-white">

        <div class="max-w-6xl mx-auto px-5 lg:px-8">

            <div
                class="relative overflow-hidden rounded-[2.5rem] bg-teal-900 p-8 lg:p-16 text-white">

                <div
                    class="absolute -right-24 -top-24 w-72 h-72 bg-teal-500/20 rounded-full">
                </div>

                <div
                    class="absolute -left-20 -bottom-20 w-64 h-64 bg-teal-500/10 rounded-full">
                </div>

                <div class="relative grid lg:grid-cols-2 gap-12 items-center">

                    <div>

                        <span
                            class="text-teal-300 text-sm font-bold uppercase tracking-widest"
                            data-i18n="register_eyebrow">
                            Ready to get started?
                        </span>

                        <h2
                            class="mt-5 text-4xl lg:text-5xl font-extrabold leading-tight"
                            data-i18n="register_title">
                            Give your pharmacy a smarter way to care.
                        </h2>

                        <p
                            class="mt-5 text-white/55 leading-7"
                            data-i18n="register_description">
                            Register your pharmacy today and start managing
                            prescriptions and patient medication reminders
                            from one powerful platform.
                        </p>

                    </div>


                    <!-- Registration mini form -->

                    <div class="bg-white rounded-3xl p-6 lg:p-7 text-teal-900">

                        <h3
                            class="text-xl font-extrabold"
                            data-i18n="register_form_title">
                            Register your pharmacy
                        </h3>

                        <p
                            class="text-sm text-teal-800/45 mt-1"
                            data-i18n="register_form_desc">
                            Create your pharmacy account in a few steps.
                        </p>

                        <form class="mt-6 space-y-4">

                            <div>

                                <label
                                    class="text-xs font-bold text-teal-800/60"
                                    data-i18n="pharmacy_name">
                                    Pharmacy name
                                </label>

                                <input
                                    type="text"
                                    placeholder="Your pharmacy name"
                                    data-i18n-placeholder="pharmacy_name_placeholder"
                                    class="mt-2 w-full h-12 px-4 rounded-xl bg-cream-50 border border-teal-100 outline-none focus:ring-2 focus:ring-teal-200">

                            </div>

                            <div>

                                <label
                                    class="text-xs font-bold text-teal-800/60"
                                    data-i18n="email">
                                    Email address
                                </label>

                                <input
                                    type="email"
                                    placeholder="pharmacy@example.com"
                                    data-i18n-placeholder="email_placeholder"
                                    class="mt-2 w-full h-12 px-4 rounded-xl bg-cream-50 border border-teal-100 outline-none focus:ring-2 focus:ring-teal-200">

                            </div>

                            <div>

                                <label
                                    class="text-xs font-bold text-teal-800/60"
                                    data-i18n="phone">
                                    Phone number
                                </label>

                                <input
                                    type="tel"
                                    placeholder="+20 100 000 0000"
                                    data-i18n-placeholder="phone_placeholder"
                                    class="mt-2 w-full h-12 px-4 rounded-xl bg-cream-50 border border-teal-100 outline-none focus:ring-2 focus:ring-teal-200">

                            </div>

                            <button
                                type="submit"
                                class="w-full h-12 rounded-xl bg-teal-600 text-white font-bold hover:bg-teal-700 transition"
                                data-i18n="create_account">
                                Create pharmacy account
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- ABOUT -->
    <!-- ========================================================= -->

    <section id="about" class="py-24 bg-cream-50">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="fade-up">

                    <span
                        class="text-sm font-bold text-teal-600 uppercase tracking-widest"
                        data-i18n="about_eyebrow">
                        Why PharmaCare
                    </span>

                    <h2
                        class="mt-4 text-4xl lg:text-5xl font-extrabold leading-tight"
                        data-i18n="about_title">
                        Technology that puts patient care first.
                    </h2>

                    <p
                        class="mt-6 text-teal-800/55 leading-8"
                        data-i18n="about_description">
                        Pharmacies spend too much time managing repetitive
                        tasks. PharmaCare brings your patients, prescriptions,
                        treatments and reminders together so your team can
                        focus on what really matters — caring for patients.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-5">

                        <div class="bg-white rounded-2xl p-5 border border-teal-50">

                            <p class="text-3xl font-extrabold text-teal-600">
                                99%
                            </p>

                            <p
                                class="text-sm text-teal-800/50 mt-1"
                                data-i18n="about_stat_1">
                                Platform availability
                            </p>

                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-teal-50">

                            <p class="text-3xl font-extrabold text-teal-600">
                                24/7
                            </p>

                            <p
                                class="text-sm text-teal-800/50 mt-1"
                                data-i18n="about_stat_2">
                                Cloud access
                            </p>

                        </div>

                    </div>

                </div>


                <div class="relative fade-up">

                    <div class="grid grid-cols-2 gap-5">

                        <div class="space-y-5 pt-10">

                            <div class="bg-teal-900 rounded-3xl p-7 text-white">

                                <div class="text-4xl mb-5">
                                    +
                                </div>

                                <p
                                    class="text-2xl font-extrabold"
                                    data-i18n="about_card_1">
                                    Better follow-up
                                </p>

                                <p
                                    class="text-sm text-white/50 mt-2"
                                    data-i18n="about_card_1_desc">
                                    Keep treatment information organized.
                                </p>

                            </div>

                            <div class="bg-white border border-teal-100 rounded-3xl p-7">

                                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center mb-5">
                                    ✓
                                </div>

                                <p
                                    class="text-xl font-extrabold"
                                    data-i18n="about_card_2">
                                    Less manual work
                                </p>

                            </div>

                        </div>

                        <div class="space-y-5">

                            <div class="bg-white border border-teal-100 rounded-3xl p-7">

                                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center mb-5">
                                    ♥
                                </div>

                                <p
                                    class="text-xl font-extrabold"
                                    data-i18n="about_card_3">
                                    Better patient care
                                </p>

                            </div>

                            <div class="bg-teal-100 rounded-3xl p-7">

                                <div class="text-4xl mb-5">
                                    01
                                </div>

                                <p
                                    class="text-2xl font-extrabold"
                                    data-i18n="about_card_4">
                                    One platform
                                </p>

                                <p
                                    class="text-sm text-teal-800/50 mt-2"
                                    data-i18n="about_card_4_desc">
                                    Everything your pharmacy needs.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- FOOTER -->
    <!-- ========================================================= -->

    <footer class="bg-teal-950 text-white pt-16 pb-8">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

                <div class="lg:col-span-2">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-11 h-11 rounded-xl bg-teal-500 flex items-center justify-center">

                            <svg width="23" height="23" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M7 3V21M17 3V21M3 7H21M3 17H21"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                            </svg>

                        </div>

                        <div class="font-extrabold text-xl">
                            PharmaCare
                        </div>

                    </div>

                    <p
                        class="mt-5 text-white/45 max-w-md leading-7"
                        data-i18n="footer_description">
                        A modern pharmacy management platform designed to
                        simplify prescriptions, patient care and medication
                        reminders.
                    </p>

                </div>


                <div>

                    <h4
                        class="font-bold"
                        data-i18n="footer_product">
                        Product
                    </h4>

                    <div class="mt-5 space-y-3 text-sm text-white/45">

                        <a href="#features" class="block hover:text-white transition" data-i18n="nav_features">
                            Features
                        </a>

                        <a href="#pricing" class="block hover:text-white transition" data-i18n="nav_pricing">
                            Pricing
                        </a>

                        <a href="#how-it-works" class="block hover:text-white transition" data-i18n="nav_how">
                            How it works
                        </a>

                    </div>

                </div>


                <div>

                    <h4
                        class="font-bold"
                        data-i18n="footer_company">
                        Company
                    </h4>

                    <div class="mt-5 space-y-3 text-sm text-white/45">

                        <a href="#about" class="block hover:text-white transition" data-i18n="nav_about">
                            About
                        </a>

                        <a href="#register" class="block hover:text-white transition" data-i18n="nav_register">
                            Register Pharmacy
                        </a>

                    </div>

                </div>

            </div>


            <div
                class="border-t border-white/10 mt-14 pt-7 flex flex-col md:flex-row gap-4 justify-between text-xs text-white/35">

                <p>
                    © 2026 PharmaCare.
                    <span data-i18n="rights">
                        All rights reserved.
                    </span>
                </p>

                <p data-i18n="footer_tagline">
                    Smarter pharmacies. Better patient care.
                </p>

            </div>

        </div>

    </footer>


    <!-- ========================================================= -->
    <!-- FLOATING WHATSAPP -->
    <!-- ========================================================= -->

    <a
        href="https://wa.me/201000000000"
        target="_blank"
        class="whatsapp-pulse fixed bottom-6 end-6 z-50 w-14 h-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-xl hover:scale-110 transition"
        aria-label="WhatsApp">

        <svg width="29" height="29" viewBox="0 0 24 24" fill="none">

            <path
                d="M20 11.5A8.1 8.1 0 0 1 11.8 20A8 8 0 0 1 8 19L4 20L5 16.2A8 8 0 1 1 20 11.5Z"
                stroke="currentColor"
                stroke-width="1.8"
            />

            <path
                d="M8.5 9.5C8.5 9.5 9 8.5 9.5 8.5C10 8.5 10.5 9.5 11 10C11.5 10.5 11 11 10.5 11.5C10.5 11.5 11.5 13.5 13.5 14.5C14 14.8 14.5 14 15 13.5C15.5 13 16.5 14 17 14.5C17.5 15 17 15.5 16.5 16C16 16.5 15 17 13.5 16.5C11 15.5 9 13.5 8.5 11C8 10 8.5 9.5 8.5 9.5Z"
                fill="currentColor"
            />

        </svg>

    </a>


    <!-- ========================================================= -->
    <!-- LANGUAGE / JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        const translations = {

            en: {

                brand_tagline: "Smart Pharmacy",

                nav_features: "Features",
                nav_how: "How it works",
                nav_pricing: "Pricing",
                nav_about: "About",
                nav_register: "Register Pharmacy",
                language_switch: "العربية",

                hero_badge: "Smart technology for modern pharmacies",
                hero_title_1: "Your pharmacy.",
                hero_title_2: "Smarter care.",
                hero_description:
                    "Manage prescriptions, track medications, and automatically remind your patients through WhatsApp — all from one simple pharmacy platform.",
                hero_cta: "Start your pharmacy",
                hero_secondary: "Explore features",

                trust_no_setup: "Easy setup",
                trust_cloud: "Cloud based",
                trust_secure: "Secure",

                whatsapp_label: "WhatsApp reminder",
                whatsapp_sent: "Message sent ✓",

                dashboard_label: "PHARMACY DASHBOARD",
                dashboard_title: "Good morning, Pharmacy",

                stat_patients: "Patients",
                stat_prescriptions: "Prescriptions",
                stat_reminders: "Reminders",

                chart_title: "Patient activity",
                chart_subtitle: "Medication reminders this week",

                upcoming_title: "Upcoming reminders",
                upcoming_desc: "18 patients today",

                adherence: "Medication adherence",

                features_eyebrow: "Everything in one place",
                features_title: "Built around better pharmacy care",
                features_description:
                    "Everything your pharmacy needs to manage patients, prescriptions and medication reminders without the complexity.",

                feature_prescriptions: "Prescription Management",
                feature_prescriptions_desc:
                    "Create and manage prescriptions, medications, dosages and treatment details in one organized system.",

                feature_whatsapp: "WhatsApp Reminders",
                feature_whatsapp_desc:
                    "Automatically remind patients about their medications and improve adherence through WhatsApp.",
                feature_automated: "Automated reminders",

                feature_dashboard: "Smart Dashboard",
                feature_dashboard_desc:
                    "See patients, prescriptions, reminders and pharmacy activity at a glance with a simple dashboard.",

                feature_scheduling: "Reminder Scheduling",
                feature_scheduling_desc:
                    "Schedule medication reminders based on treatment duration, frequency and refill dates.",

                feature_secure: "Secure & Reliable",
                feature_secure_desc:
                    "Keep your pharmacy data organized with secure access and reliable cloud infrastructure.",

                feature_patients: "Patient Profiles",
                feature_patients_desc:
                    "Keep complete patient information and treatment history available whenever your pharmacy needs it.",

                whatsapp_eyebrow: "Connected care",
                whatsapp_title: "Keep patients on track, automatically.",
                whatsapp_description:
                    "Your pharmacy can send personalized medication reminders directly to patients through WhatsApp. Less manual work for your team and better treatment adherence for your patients.",

                whatsapp_step1: "Add the patient's treatment",
                whatsapp_step1_desc:
                    "Set medication, dosage, frequency and duration.",

                whatsapp_step2: "System schedules reminders",
                whatsapp_step2_desc:
                    "Your pharmacy does not need to send messages manually.",

                whatsapp_step3: "Patient receives WhatsApp reminder",
                whatsapp_step3_desc:
                    "Patients receive timely reminders when they need them.",

                whatsapp_reply: "Thank you ✓",

                how_eyebrow: "Simple from day one",
                how_title: "Start managing your pharmacy in minutes",

                how_1: "Register your pharmacy",
                how_1_desc:
                    "Create your pharmacy account and add your basic business information.",

                how_2: "Add patients & prescriptions",
                how_2_desc:
                    "Build patient profiles and manage their prescriptions and treatments.",

                how_3: "Let PharmaCare handle reminders",
                how_3_desc:
                    "Automatic WhatsApp reminders keep your patients informed.",

                pricing_eyebrow: "Simple pricing",
                pricing_title: "Plans that grow with your pharmacy",
                pricing_description:
                    "Start small and upgrade whenever your pharmacy needs more.",

                plan_starter: "Starter",
                plan_starter_desc: "For small pharmacies",

                plan_pro: "Professional",
                plan_pro_desc: "For growing pharmacies",

                plan_business: "Business",
                plan_business_desc: "For pharmacy groups",

                month: "/month",
                choose_plan: "Choose plan",
                contact_sales: "Contact us",
                popular: "Most popular",

                plan_feature_1: "Up to 500 patients",
                plan_feature_2: "Prescription management",
                plan_feature_3: "Patient profiles",
                plan_feature_4: "WhatsApp reminders",

                pro_feature_1: "Unlimited patients",
                pro_feature_2: "Everything in Starter",
                pro_feature_3: "Advanced reminders",
                pro_feature_4: "Analytics & reports",
                pro_feature_5: "Priority support",

                business_feature_1: "Multiple branches",
                business_feature_2: "Advanced analytics",
                business_feature_3: "Team management",
                business_feature_4: "Dedicated support",

                register_eyebrow: "Ready to get started?",
                register_title:
                    "Give your pharmacy a smarter way to care.",
                register_description:
                    "Register your pharmacy today and start managing prescriptions and patient medication reminders from one powerful platform.",

                register_form_title: "Register your pharmacy",
                register_form_desc:
                    "Create your pharmacy account in a few steps.",

                pharmacy_name: "Pharmacy name",
                pharmacy_name_placeholder: "Your pharmacy name",

                email: "Email address",
                email_placeholder: "pharmacy@example.com",

                phone: "Phone number",
                phone_placeholder: "+20 100 000 0000",

                create_account: "Create pharmacy account",

                about_eyebrow: "Why PharmaCare",
                about_title: "Technology that puts patient care first.",
                about_description:
                    "Pharmacies spend too much time managing repetitive tasks. PharmaCare brings your patients, prescriptions, treatments and reminders together so your team can focus on what really matters — caring for patients.",

                about_stat_1: "Platform availability",
                about_stat_2: "Cloud access",

                about_card_1: "Better follow-up",
                about_card_1_desc: "Keep treatment information organized.",

                about_card_2: "Less manual work",
                about_card_3: "Better patient care",

                about_card_4: "One platform",
                about_card_4_desc: "Everything your pharmacy needs.",

                footer_description:
                    "A modern pharmacy management platform designed to simplify prescriptions, patient care and medication reminders.",

                footer_product: "Product",
                footer_company: "Company",

                rights: "All rights reserved.",
                footer_tagline:
                    "Smarter pharmacies. Better patient care."
            },


            ar: {

                brand_tagline: "صيدلية ذكية",

                nav_features: "المميزات",
                nav_how: "كيف يعمل",
                nav_pricing: "الأسعار",
                nav_about: "عن النظام",
                nav_register: "تسجيل الصيدلية",
                language_switch: "English",

                hero_badge: "تقنية ذكية للصيدليات الحديثة",
                hero_title_1: "صيدليتك.",
                hero_title_2: "رعاية أذكى.",
                hero_description:
                    "أدر الوصفات الطبية والأدوية وأرسل تذكيرات تلقائية للمرضى عبر واتساب — كل ذلك من خلال منصة واحدة بسيطة.",
                hero_cta: "ابدأ صيدليتك",
                hero_secondary: "استكشف المميزات",

                trust_no_setup: "إعداد سهل",
                trust_cloud: "نظام سحابي",
                trust_secure: "آمن",

                whatsapp_label: "تذكير واتساب",
                whatsapp_sent: "تم إرسال الرسالة ✓",

                dashboard_label: "لوحة تحكم الصيدلية",
                dashboard_title: "صباح الخير، صيدليتك",

                stat_patients: "المرضى",
                stat_prescriptions: "الوصفات",
                stat_reminders: "التذكيرات",

                chart_title: "نشاط المرضى",
                chart_subtitle: "تذكيرات الأدوية هذا الأسبوع",

                upcoming_title: "التذكيرات القادمة",
                upcoming_desc: "18 مريضًا اليوم",

                adherence: "الالتزام بالأدوية",

                features_eyebrow: "كل شيء في مكان واحد",
                features_title: "مصمم لرعاية صيدلانية أفضل",
                features_description:
                    "كل ما تحتاجه صيدليتك لإدارة المرضى والوصفات الطبية وتذكيرات الأدوية بسهولة.",

                feature_prescriptions: "إدارة الوصفات الطبية",
                feature_prescriptions_desc:
                    "أنشئ وأدر الوصفات الطبية والأدوية والجرعات وتفاصيل العلاج من خلال نظام منظم.",

                feature_whatsapp: "تذكيرات واتساب",
                feature_whatsapp_desc:
                    "أرسل تذكيرات تلقائية للمرضى بشأن أدويتهم وساعدهم على الالتزام بالعلاج عبر واتساب.",
                feature_automated: "تذكيرات تلقائية",

                feature_dashboard: "لوحة تحكم ذكية",
                feature_dashboard_desc:
                    "تابع المرضى والوصفات والتذكيرات ونشاط الصيدلية من خلال لوحة تحكم بسيطة.",

                feature_scheduling: "جدولة التذكيرات",
                feature_scheduling_desc:
                    "جدول تذكيرات الأدوية حسب مدة العلاج والجرعات ومواعيد إعادة صرف الدواء.",

                feature_secure: "آمن وموثوق",
                feature_secure_desc:
                    "حافظ على بيانات صيدليتك منظمة مع نظام وصول آمن وبنية سحابية موثوقة.",

                feature_patients: "ملفات المرضى",
                feature_patients_desc:
                    "احتفظ ببيانات المرضى الكاملة وتاريخ العلاج لتكون متاحة عند الحاجة.",

                whatsapp_eyebrow: "رعاية متصلة",
                whatsapp_title: "حافظ على التزام مرضاك بالعلاج تلقائيًا.",
                whatsapp_description:
                    "يمكن لصيدليتك إرسال تذكيرات مخصصة للأدوية مباشرة إلى المرضى عبر واتساب. عمل يدوي أقل لفريقك والتزام أفضل بالعلاج للمرضى.",

                whatsapp_step1: "أضف علاج المريض",
                whatsapp_step1_desc:
                    "حدد الدواء والجرعة والتكرار ومدة العلاج.",

                whatsapp_step2: "النظام يقوم بجدولة التذكيرات",
                whatsapp_step2_desc:
                    "لن تحتاج الصيدلية إلى إرسال الرسائل يدويًا.",

                whatsapp_step3: "المريض يستقبل التذكير",
                whatsapp_step3_desc:
                    "يستقبل المرضى التذكيرات في الوقت المناسب.",

                whatsapp_reply: "شكرًا لك ✓",

                how_eyebrow: "بسيط من البداية",
                how_title: "ابدأ بإدارة صيدليتك خلال دقائق",

                how_1: "سجل صيدليتك",
                how_1_desc:
                    "أنشئ حساب الصيدلية وأضف بيانات نشاطك الأساسية.",

                how_2: "أضف المرضى والوصفات",
                how_2_desc:
                    "أنشئ ملفات المرضى وأدر وصفاتهم وعلاجاتهم.",

                how_3: "دع النظام يتولى التذكيرات",
                how_3_desc:
                    "تساعد تذكيرات واتساب التلقائية في إبقاء مرضاك على اطلاع.",

                pricing_eyebrow: "أسعار بسيطة",
                pricing_title: "خطط تنمو مع صيدليتك",
                pricing_description:
                    "ابدأ بالخطة المناسبة وقم بالترقية عندما تحتاج صيدليتك إلى المزيد.",

                plan_starter: "البداية",
                plan_starter_desc: "للصيدليات الصغيرة",

                plan_pro: "المحترفة",
                plan_pro_desc: "للصيدليات المتنامية",

                plan_business: "الأعمال",
                plan_business_desc: "لمجموعات الصيدليات",

                month: "/شهريًا",
                choose_plan: "اختر الخطة",
                contact_sales: "تواصل معنا",
                popular: "الأكثر شيوعًا",

                plan_feature_1: "حتى 500 مريض",
                plan_feature_2: "إدارة الوصفات",
                plan_feature_3: "ملفات المرضى",
                plan_feature_4: "تذكيرات واتساب",

                pro_feature_1: "عدد غير محدود من المرضى",
                pro_feature_2: "كل مميزات خطة البداية",
                pro_feature_3: "تذكيرات متقدمة",
                pro_feature_4: "إحصائيات وتقارير",
                pro_feature_5: "دعم ذو أولوية",

                business_feature_1: "دعم عدة فروع",
                business_feature_2: "تحليلات متقدمة",
                business_feature_3: "إدارة الفريق",
                business_feature_4: "دعم مخصص",

                register_eyebrow: "هل أنت مستعد للبدء؟",
                register_title:
                    "امنح صيدليتك طريقة أذكى للرعاية.",
                register_description:
                    "سجل صيدليتك اليوم وابدأ بإدارة الوصفات وتذكيرات الأدوية للمرضى من خلال منصة واحدة قوية.",

                register_form_title: "سجل صيدليتك",
                register_form_desc:
                    "أنشئ حساب صيدليتك في خطوات بسيطة.",

                pharmacy_name: "اسم الصيدلية",
                pharmacy_name_placeholder: "اسم الصيدلية",

                email: "البريد الإلكتروني",
                email_placeholder: "pharmacy@example.com",

                phone: "رقم الهاتف",
                phone_placeholder: "+20 100 000 0000",

                create_account: "إنشاء حساب الصيدلية",

                about_eyebrow: "لماذا PharmaCare",
                about_title: "تقنية تضع رعاية المريض أولًا.",
                about_description:
                    "تقضي الصيدليات وقتًا كبيرًا في المهام المتكررة. يجمع PharmaCare المرضى والوصفات والعلاجات والتذكيرات في مكان واحد حتى يتمكن فريقك من التركيز على الأهم — رعاية المرضى.",

                about_stat_1: "توفر المنصة",
                about_stat_2: "الوصول السحابي",

                about_card_1: "متابعة أفضل",
                about_card_1_desc: "حافظ على تنظيم معلومات العلاج.",

                about_card_2: "عمل يدوي أقل",
                about_card_3: "رعاية أفضل للمرضى",

                about_card_4: "منصة واحدة",
                about_card_4_desc: "كل ما تحتاجه صيدليتك.",

                footer_description:
                    "منصة حديثة لإدارة الصيدليات مصممة لتبسيط الوصفات الطبية ورعاية المرضى وتذكيرات الأدوية.",

                footer_product: "المنتج",
                footer_company: "الشركة",

                rights: "جميع الحقوق محفوظة.",
                footer_tagline:
                    "صيدليات أذكى. رعاية أفضل للمرضى."
            }

        };


        // =========================================================
        // LANGUAGE
        // =========================================================

        let currentLanguage =
            localStorage.getItem('pharmacy_language') || 'en';


        function applyLanguage(language) {

            currentLanguage = language;

            const dictionary = translations[language];

            document.documentElement.lang = language;

            document.documentElement.dir =
                language === 'ar' ? 'rtl' : 'ltr';


            // Text

            document.querySelectorAll('[data-i18n]').forEach(element => {

                const key = element.dataset.i18n;

                if (dictionary[key]) {
                    element.textContent = dictionary[key];
                }

            });


            // Placeholders

            document.querySelectorAll('[data-i18n-placeholder]')
                .forEach(element => {

                    const key =
                        element.dataset.i18nPlaceholder;

                    if (dictionary[key]) {
                        element.placeholder = dictionary[key];
                    }

                });


            // Language button

            const languageText =
                document.getElementById('languageText');

            if (languageText) {

                languageText.textContent =
                    language === 'en'
                        ? 'العربية'
                        : 'English';

            }


            localStorage.setItem(
                'pharmacy_language',
                language
            );

        }


        function toggleLanguage() {

            const newLanguage =
                currentLanguage === 'en'
                    ? 'ar'
                    : 'en';

            applyLanguage(newLanguage);

        }


        // =========================================================
        // MOBILE MENU
        // =========================================================

        function toggleMobileMenu() {

            const menu =
                document.getElementById('mobileMenu');

            menu.classList.toggle('hidden');

        }


        function closeMobileMenu() {

            document
                .getElementById('mobileMenu')
                .classList.add('hidden');

        }


        // =========================================================
        // SCROLL ANIMATIONS
        // =========================================================

        const observer =
            new IntersectionObserver(
                entries => {

                    entries.forEach(entry => {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('show');

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        document
            .querySelectorAll('.fade-up')
            .forEach(element => {

                observer.observe(element);

            });


        // =========================================================
        // FORM
        // =========================================================

        document
            .querySelector('#register form')
            ?.addEventListener('submit', function (event) {

                event.preventDefault();

                // Replace this with your Laravel route.
                //
                // Example:
                //
                // window.location.href =
                //     "{{ route('pharmacy.register') }}";

                alert(
                    currentLanguage === 'ar'
                        ? 'سيتم ربط هذا النموذج بصفحة تسجيل الصيدلية.'
                        : 'Connect this form to your pharmacy registration route.'
                );

            });


        // =========================================================
        // INITIAL LANGUAGE
        // =========================================================

        applyLanguage(currentLanguage);

    </script>

</body>

</html> --}}








































<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ config('app.name') }} —
        {{ __('landing.hero.title') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #F5F2E8;
        }

        [dir="rtl"] {
            font-family: "Cairo", sans-serif;
        }

        [dir="ltr"] {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="text-slate-800">

    {{-- =========================
        NAVBAR
    ========================== --}}

    <header class="fixed inset-x-0 top-0 z-50">
        <div class="mx-auto max-w-7xl px-6 pt-5">

            <nav class="rounded-2xl border border-teal-900/10 bg-[#F5F2E8]/90 px-5 py-4 shadow-xl shadow-teal-900/5 backdrop-blur-xl">

                <div class="flex items-center justify-between">

                    {{-- Logo --}}
                    <a href="{{ route('index') }}" class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-800 text-white shadow-lg">
                            <svg
                                class="h-6 w-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path d="M10 3v18"/>
                                <path d="M3 10h18"/>
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                            </svg>
                        </div>

                        <div>
                            <div class="text-lg font-black tracking-tight text-teal-950">
                                {{ config('app.name', 'PharmaCare') }}
                            </div>

                            <div class="text-[10px] font-bold uppercase tracking-[.2em] text-teal-700">
                                Pharmacy Platform
                            </div>
                        </div>

                    </a>

                    {{-- Desktop Navigation --}}
                    <div class="hidden items-center gap-8 lg:flex">

                        <a href="#home"
                           class="text-sm font-bold text-slate-600 transition hover:text-teal-800">
                            {{ __('landing.nav.home') }}
                        </a>

                        <a href="#features"
                           class="text-sm font-bold text-slate-600 transition hover:text-teal-800">
                            {{ __('landing.nav.features') }}
                        </a>

                        <a href="#how-it-works"
                           class="text-sm font-bold text-slate-600 transition hover:text-teal-800">
                            {{ __('landing.nav.how_it_works') }}
                        </a>

                        <a href="#pricing"
                           class="text-sm font-bold text-slate-600 transition hover:text-teal-800">
                            {{ __('landing.nav.pricing') }}
                        </a>

                        <a href="#about"
                           class="text-sm font-bold text-slate-600 transition hover:text-teal-800">
                            {{ __('landing.nav.about') }}
                        </a>

                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3">

                        {{-- Language --}}
                        @php
                            $currentLocale = app()->getLocale();
                            $switchLocale = $currentLocale === 'ar' ? 'en' : 'ar';
                        @endphp

                        <a
                            href="{{ route('app.setlocale', $switchLocale) }}"
                            class="flex h-10 items-center gap-2 rounded-xl border border-teal-900/10 bg-white/70 px-4 text-sm font-black text-teal-900 transition hover:bg-white"
                        >
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M3 12h18"/>
                                <path d="M12 3c3 3.5 3 14.5 0 18"/>
                            </svg>

                            {{ $switchLocale === 'ar' ? 'العربية' : 'English' }}
                        </a>

                        <a
                            href="#register"
                            class="hidden rounded-xl bg-teal-800 px-5 py-3 text-sm font-black text-white shadow-lg shadow-teal-900/20 transition hover:bg-teal-900 sm:block"
                        >
                            {{ __('landing.nav.register') }}
                        </a>

                    </div>

                </div>

            </nav>

        </div>
    </header>


    {{-- =========================
        HERO
    ========================== --}}

    <section id="home" class="relative overflow-hidden pt-40">

        <div class="absolute -left-32 top-40 h-96 w-96 rounded-full bg-teal-300/20 blur-3xl"></div>

        <div class="absolute -right-32 top-60 h-96 w-96 rounded-full bg-emerald-300/20 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-6">

            <div class="grid items-center gap-16 lg:grid-cols-2">

                {{-- Text --}}
                <div>

                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-teal-800/10 bg-white/60 px-4 py-2 text-xs font-black uppercase tracking-wider text-teal-800">

                        <span class="h-2 w-2 rounded-full bg-teal-600"></span>

                        {{ __('landing.hero.badge') }}

                    </div>

                    <h1 class="max-w-3xl text-5xl font-black leading-[1.05] tracking-tight text-teal-950 md:text-6xl xl:text-7xl">

                        {{ __('landing.hero.title') }}

                        <span class="text-teal-700">
                            {{ __('landing.hero.title_highlight') }}
                        </span>

                    </h1>

                    <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-600">
                        {{ __('landing.hero.description') }}
                    </p>

                    <div class="mt-9 flex flex-wrap gap-4">

                        <a
                            href="#register"
                            class="group inline-flex items-center gap-3 rounded-2xl bg-teal-800 px-7 py-4 text-sm font-black text-white shadow-xl shadow-teal-900/20 transition hover:-translate-y-1 hover:bg-teal-900"
                        >

                            {{ __('landing.hero.register_button') }}

                            <svg
                                class="h-5 w-5 transition group-hover:translate-x-1 rtl:group-hover:-translate-x-1"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>
                            </svg>

                        </a>

                        <a
                            href="#features"
                            class="inline-flex items-center rounded-2xl border border-teal-900/10 bg-white/60 px-7 py-4 text-sm font-black text-teal-900 transition hover:bg-white"
                        >
                            {{ __('landing.hero.learn_more') }}
                        </a>

                    </div>

                    <div class="mt-8 flex flex-wrap gap-6 text-sm font-bold text-slate-500">

                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">
                                ✓
                            </span>

                            {{ __('landing.hero.trusted') }}
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">
                                ✓
                            </span>

                            {{ __('landing.hero.secure') }}
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">
                                ✓
                            </span>

                            {{ __('landing.hero.easy') }}
                        </div>

                    </div>

                </div>


                {{-- Dashboard Visual --}}
                {{-- <div class="relative">

                    <div class="absolute -inset-10 rounded-full bg-teal-500/10 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2rem] border border-teal-900/10 bg-white p-4 shadow-2xl shadow-teal-950/10">

                        <div class="rounded-[1.5rem] bg-[#123F3A] p-5">

                            <div class="mb-6 flex items-center justify-between">

                                <div>
                                    <p class="text-xs font-bold text-teal-200">
                                        Pharmacy Dashboard
                                    </p>

                                    <p class="mt-1 text-xl font-black text-white">
                                        Good Morning 👋
                                    </p>
                                </div>

                                <div class="h-10 w-10 rounded-xl bg-white/10"></div>

                            </div>

                            <div class="grid grid-cols-2 gap-3">

                                <div class="rounded-2xl bg-white/10 p-4">
                                    <p class="text-xs text-teal-200">Patients</p>
                                    <p class="mt-2 text-2xl font-black text-white">1,284</p>
                                </div>

                                <div class="rounded-2xl bg-white/10 p-4">
                                    <p class="text-xs text-teal-200">Prescriptions</p>
                                    <p class="mt-2 text-2xl font-black text-white">342</p>
                                </div>

                                <div class="rounded-2xl bg-white/10 p-4">
                                    <p class="text-xs text-teal-200">Medications</p>
                                    <p class="mt-2 text-2xl font-black text-white">2,481</p>
                                </div>

                                <div class="rounded-2xl bg-white/10 p-4">
                                    <p class="text-xs text-teal-200">Reminders</p>
                                    <p class="mt-2 text-2xl font-black text-white">86</p>
                                </div>

                            </div>

                            <div class="mt-4 rounded-2xl bg-white/10 p-5">

                                <div class="mb-4 flex justify-between">
                                    <span class="text-sm font-bold text-white">
                                        Pharmacy Activity
                                    </span>

                                    <span class="text-xs text-teal-200">
                                        This Week
                                    </span>
                                </div>

                                <div class="flex h-32 items-end gap-3">

                                    <div class="h-[40%] flex-1 rounded-t-lg bg-teal-300/50"></div>
                                    <div class="h-[65%] flex-1 rounded-t-lg bg-teal-300/50"></div>
                                    <div class="h-[50%] flex-1 rounded-t-lg bg-teal-300/50"></div>
                                    <div class="h-[80%] flex-1 rounded-t-lg bg-teal-200"></div>
                                    <div class="h-[60%] flex-1 rounded-t-lg bg-teal-300/50"></div>
                                    <div class="h-[90%] flex-1 rounded-t-lg bg-teal-200"></div>
                                    <div class="h-[70%] flex-1 rounded-t-lg bg-teal-300/50"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div> --}}

            </div>

        </div>

    </section>


    {{-- =========================
        FEATURES
    ========================== --}}

    <section id="features" class="py-32">

        <div class="mx-auto max-w-7xl px-6">

            <div class="mx-auto max-w-2xl text-center">

                <span class="text-xs font-black uppercase tracking-[.25em] text-teal-700">
                    {{ __('landing.features.label') }}
                </span>

                <h2 class="mt-4 text-4xl font-black tracking-tight text-teal-950 md:text-5xl">
                    {{ __('landing.features.title') }}
                </h2>

                <p class="mt-5 leading-8 text-slate-600">
                    {{ __('landing.features.description') }}
                </p>

            </div>


            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @php
                    $features = [
                        [
                            'key' => 'patients',
                            'icon' => '👥',
                        ],
                        [
                            'key' => 'prescriptions',
                            'icon' => '📋',
                        ],
                        [
                            'key' => 'medications',
                            'icon' => '💊',
                        ],
                        // [
                        //     'key' => 'inventory',
                        //     'icon' => '📦',
                        // ],
                        [
                            'key' => 'whatsapp',
                            'icon' => '💬',
                        ],
                        [
                            'key' => 'reports',
                            'icon' => '📊',
                        ],
                    ];
                @endphp

                @foreach($features as $feature)

                    <div class="group rounded-3xl border border-teal-900/10 bg-white/60 p-7 transition duration-300 hover:-translate-y-2 hover:bg-white hover:shadow-2xl hover:shadow-teal-900/10">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-2xl transition group-hover:bg-teal-800 group-hover:grayscale">
                            {{ $feature['icon'] }}
                        </div>

                        <h3 class="mt-6 text-xl font-black text-teal-950">
                            {{ __("landing.features.{$feature['key']}.title") }}
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ __("landing.features.{$feature['key']}.description") }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================
        HOW IT WORKS
    ========================== --}}

    <section id="how-it-works" class="bg-[#EDE8D8] py-32">

        <div class="mx-auto max-w-7xl px-6">

            <div class="mx-auto max-w-2xl text-center">

                <span class="text-xs font-black uppercase tracking-[.25em] text-teal-700">
                    {{ __('landing.how_it_works.label') }}
                </span>

                <h2 class="mt-4 text-4xl font-black text-teal-950 md:text-5xl">
                    {{ __('landing.how_it_works.title') }}
                </h2>

                <p class="mt-5 leading-8 text-slate-600">
                    {{ __('landing.how_it_works.description') }}
                </p>

            </div>


            <div class="mt-16 grid gap-8 md:grid-cols-3">

                @foreach(['step_1', 'step_2', 'step_3'] as $step)

                    <div class="relative rounded-3xl bg-white p-8 shadow-sm">

                        <span class="text-6xl font-black text-teal-100">
                            {{ __("landing.how_it_works.{$step}.number") }}
                        </span>

                        <h3 class="mt-4 text-xl font-black text-teal-950">
                            {{ __("landing.how_it_works.{$step}.title") }}
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ __("landing.how_it_works.{$step}.description") }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================
        WHATSAPP
    ========================== --}}

    <section class="py-32">

        <div class="mx-auto max-w-7xl px-6">

            <div class="overflow-hidden rounded-[2.5rem] bg-[#123F3A] p-8 text-white md:p-14">

                <div class="grid items-center gap-12 lg:grid-cols-2">

                    <div>

                        <span class="text-xs font-black uppercase tracking-[.25em] text-teal-200">
                            {{ __('landing.whatsapp.badge') }}
                        </span>

                        <h2 class="mt-5 text-4xl font-black md:text-5xl">
                            {{ __('landing.whatsapp.title') }}
                        </h2>

                        <p class="mt-6 max-w-xl leading-8 text-teal-100">
                            {{ __('landing.whatsapp.description') }}
                        </p>

                        <a
                            href="#register"
                            class="mt-8 inline-flex rounded-2xl bg-white px-7 py-4 text-sm font-black text-teal-900 transition hover:bg-teal-50"
                        >
                            {{ __('landing.whatsapp.button') }}
                        </a>

                    </div>


                    <div class="grid gap-4 sm:grid-cols-2">

                        @foreach([
                            'medication',
                            'refill',
                            'treatment',
                            'automatic'
                        ] as $item)

                            <div class="rounded-2xl bg-white/10 p-5">

                                <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white/10">
                                    ✓
                                </div>

                                <p class="font-bold">
                                    {{ __("landing.whatsapp.items.{$item}") }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        PRICING
    ========================== --}}

    <section id="pricing" class="py-32">

        <div class="mx-auto max-w-7xl px-6">

            <div class="mx-auto max-w-2xl text-center">

                <span class="text-xs font-black uppercase tracking-[.25em] text-teal-700">
                    {{ __('landing.pricing.label') }}
                </span>

                <h2 class="mt-4 text-4xl font-black text-teal-950 md:text-5xl">
                    {{ __('landing.pricing.title') }}
                </h2>

                <p class="mt-5 leading-8 text-slate-600">
                    {{ __('landing.pricing.description') }}
                </p>

            </div>


            <div class="mt-16 grid gap-6 lg:grid-cols-3">

                @foreach($plans as $plan)

                    <div
                        class="
                            relative rounded-3xl border p-8
                            {{ $plan->is_popular
                                ? 'border-teal-700 bg-[#123F3A] text-white shadow-2xl shadow-teal-900/20'
                                : 'border-teal-900/10 bg-white/70'
                            }}
                        "
                    >

                        @if($plan->is_popular)

                            <span class="absolute ltr:right-6 rtl:left-6 top-6 rounded-full bg-teal-200 px-3 py-1 text-[10px] font-black uppercase text-teal-950">
                                {{ __('landing.pricing.popular') }}
                            </span>

                        @endif

                        <h3 class="text-2xl font-black">
                            {{ $plan->name }}
                        </h3>

                        {{-- <p class="mt-2 text-sm {{ $plan->is_popular ? 'text-teal-100' : 'text-slate-500' }}">
                            {{ __("landing.pricing.{$plan}.description") }}
                        </p> --}}

                        <div class="mt-8 flex items-end gap-2">

                            <span class="text-5xl font-black">
                                ${{ $plan->price }}
                            </span>

                            <span class="mb-2 text-sm opacity-70">
                               {{ $plan->period_value }} {{ __('custom.' . $plan->period_type->name) }}
                            </span>

                        </div>

                        <div class="my-8 h-px {{ $plan->is_popular ? 'bg-white/10' : 'bg-slate-200' }}"></div>

                        <ul class="space-y-4">
{{-- @php
    $features = preg_split(
        '/\r\n|\r|\n/',
        $plan->features,
        -1,
        PREG_SPLIT_NO_EMPTY
    );
@endphp

                            @foreach($features as $feature)

                                <li class="flex items-start gap-3">

                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-teal-100 text-xs font-black text-teal-800">
                                        ✓
                                    </span>

                                    <span class="text-sm">
                                        {{ $feature }}
                                    </span>

                                </li>

                            @endforeach --}}


                             <li class="flex items-start gap-3">

                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-teal-100 text-xs font-black text-teal-800">
                                        ✓
                                    </span>

                                    <span class="text-sm">
                                        {{ __("custom.All Features") }}
                                    </span>

                                </li>



                                 <li class="flex items-start gap-3">

                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-teal-100 text-xs font-black text-teal-800">
                                        ✓
                                    </span>

                                    <span class="text-sm">
                                        {{ __("custom.Technical Support") }}
                                    </span>

                                </li>

                            <li class="flex items-start gap-3">

                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-teal-100 text-xs font-black text-teal-800">
                                        ✓
                                    </span>

                                    <span class="text-sm">
                                        {{ $plan->allowed_users }} {{ __("custom.User") }}
                                    </span>

                                </li>


                                <li class="flex items-start gap-3">

                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-teal-100 text-xs font-black text-teal-800">
                                        ✓
                                    </span>

                                    <span class="text-sm">
                                        {{ __("custom.Serve") }} {{ $plan->allowed_customers }} {{ __("custom.Patient") }}
                                    </span>

                                </li>

                        </ul>

                        <a
                            href="#register"
                            class="
                                mt-8 block rounded-2xl px-5 py-4 text-center text-sm font-black transition
                                {{ $plan->is_popular
                                    ? 'bg-white text-teal-900 hover:bg-teal-50'
                                    : 'bg-teal-800 text-white hover:bg-teal-900'
                                }}
                            "
                        >
                            {{ __('landing.pricing.choose') }}
                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================
        PHARMACY REGISTRATION
    ========================== --}}

    <section id="register" class="bg-[#EDE8D8] py-32">

        <div class="mx-auto max-w-7xl px-6">

            <div class="grid items-center gap-12 lg:grid-cols-2">

                <div>

                    <span class="text-xs font-black uppercase tracking-[.25em] text-teal-700">
                        {{ __('landing.cta.badge') }}
                    </span>

                    <h2 class="mt-5 text-4xl font-black text-teal-950 md:text-6xl">
                        {{ __('landing.cta.title') }}
                    </h2>

                    <p class="mt-6 max-w-xl leading-8 text-slate-600">
                        {{ __('landing.cta.description') }}
                    </p>

                </div>


                {{-- IMPORTANT --}}
                {{-- This goes directly to your Laravel route --}}

                <form
                    action="{{ route('pharmacy.register') }}"
                    method="POST"
                    class="rounded-[2rem] bg-white p-8 shadow-2xl shadow-teal-900/10"
                >

                    @csrf

                    <div class="grid gap-5">

                        <div>
                            <label class="mb-2 block text-sm font-black text-teal-950">
                                Pharmacy Name
                            </label>

                            <input
                                type="text"
                                name="pharmacy_name"
                                value="{{ old('pharmacy_name') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-teal-700 focus:bg-white focus:ring-4 focus:ring-teal-700/10"
                            >

                            @error('pharmacy_name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="grid gap-5 sm:grid-cols-2">

                            <div>
                                <label class="mb-2 block text-sm font-black text-teal-950">
                                    Owner Name
                                </label>

                                <input
                                    type="text"
                                    name="owner_name"
                                    value="{{ old('owner_name') }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none focus:border-teal-700 focus:bg-white focus:ring-4 focus:ring-teal-700/10"
                                >
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-teal-950">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none focus:border-teal-700 focus:bg-white focus:ring-4 focus:ring-teal-700/10"
                                >
                            </div>

                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-black text-teal-950">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none focus:border-teal-700 focus:bg-white focus:ring-4 focus:ring-teal-700/10"
                            >
                        </div>


                        <button
                            type="submit"
                            class="mt-2 rounded-xl bg-teal-800 px-6 py-4 text-sm font-black text-white shadow-xl shadow-teal-900/20 transition hover:bg-teal-900"
                        >
                            {{ __('landing.cta.button') }}
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>


    {{-- =========================
        FOOTER
    ========================== --}}

    <footer class="bg-[#123F3A] py-14 text-white">

        <div class="mx-auto max-w-7xl px-6">

            <div class="grid gap-10 md:grid-cols-4">

                <div class="md:col-span-2">

                    <div class="text-2xl font-black">
                        {{ config('app.name', 'PharmaCare') }}
                    </div>

                    <p class="mt-4 max-w-md leading-7 text-teal-100">
                        {{ __('landing.footer.description') }}
                    </p>

                </div>


                <div>

                    <h3 class="font-black">
                        {{ __('landing.footer.product') }}
                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-teal-100">

                        <a href="#features" class="block hover:text-white">
                            {{ __('landing.footer.features') }}
                        </a>

                        <a href="#pricing" class="block hover:text-white">
                            {{ __('landing.footer.pricing') }}
                        </a>

                    </div>

                </div>


                <div>

                    <h3 class="font-black">
                        {{ __('landing.footer.company') }}
                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-teal-100">

                        <a href="#about" class="block hover:text-white">
                            {{ __('landing.footer.about') }}
                        </a>

                        <a href="#" class="block hover:text-white">
                            {{ __('landing.footer.contact') }}
                        </a>

                        <a href="#" class="block hover:text-white">
                            {{ __('landing.footer.privacy') }}
                        </a>

                    </div>

                </div>

            </div>


            <div class="mt-12 border-t border-white/10 pt-8 text-center text-sm text-teal-200">

                © {{ date('Y') }}
                {{ config('app.name', 'PharmaCare') }}.
                {{ __('landing.footer.copyright') }}

            </div>

        </div>

    </footer>


    {{-- =========================
        FLOATING WHATSAPP
    ========================== --}}

    <a
        href="https://wa.me/201000000000"
        target="_blank"
        class="fixed bottom-6 end-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-2xl transition hover:scale-110"
        aria-label="WhatsApp"
    >

        <svg
            class="h-7 w-7"
            viewBox="0 0 24 24"
            fill="currentColor"
        >
            <path d="M20.52 3.48A11.8 11.8 0 0 0 12.07 0C5.54 0 .23 5.31.23 11.84c0 2.09.55 4.13 1.59 5.92L.13 24l6.39-1.67a11.85 11.85 0 0 0 5.55 1.41h.01c6.53 0 11.84-5.31 11.84-11.84a11.8 11.8 0 0 0-3.4-8.42ZM12.08 21.7h-.01a9.84 9.84 0 0 1-5.01-1.37l-.36-.21-3.79.99 1.01-3.69-.23-.38a9.8 9.8 0 1 1 8.39 4.66Zm5.39-7.36c-.29-.15-1.7-.84-1.96-.94-.26-.1-.45-.15-.64.15-.19.29-.74.94-.91 1.13-.17.19-.34.22-.63.07-.29-.15-1.23-.45-2.34-1.44-.86-.77-1.44-1.72-1.61-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.34.43-.51.15-.17.19-.29.29-.48.1-.19.05-.36-.02-.51-.07-.15-.64-1.54-.88-2.11-.23-.55-.47-.48-.64-.49h-.55c-.19 0-.5.07-.76.36-.26.29-1  .98-1 2.39s1.03 2.77 1.17 2.96c.15.19 2.02 3.08 4.89 4.32.68.29 1.21.46 1.62.59.68.22 1.3.19 1.79.12.55-.08 1.7-.7 1.94-1.38.24-.68.24-1.27.17-1.39-.07-.12-.26-.19-.55-.34Z"/>
        </svg>

    </a>

</body>
</html>