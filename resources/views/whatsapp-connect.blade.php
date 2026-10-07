












<!-- Start New Code For Test -->

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
        html { scroll-behavior: smooth; }
        body { background: #F5F2E8; }
        [dir="rtl"] { font-family: "Cairo", sans-serif; }
        [dir="ltr"] { font-family: "Inter", sans-serif; }

        #connect-btn {
            background-color: #25D366;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px 32px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        #connect-btn:disabled {
            background-color: #94d3ae;
            cursor: not-allowed;
        }
        #status-message {
            margin-top: 16px;
            font-size: 14px;
            color: #555;
        }
        .error { color: #d32f2f; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="text-slate-800">

    {{-- NAVBAR --}}
    <header class="fixed inset-x-0 top-0 z-50">
        <div class="mx-auto max-w-7xl px-6 pt-5">
            <nav class="rounded-2xl border border-teal-900/10 bg-[#F5F2E8]/90 px-5 py-4 shadow-xl shadow-teal-900/5 backdrop-blur-xl">
                <div class="flex items-center justify-between">

                    {{-- Logo --}}
                    <a href="{{ route('index') }}" class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-800 text-white shadow-lg">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
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
                        <a href="#home" class="text-sm font-bold text-slate-600 transition hover:text-teal-800">{{ __('landing.nav.home') }}</a>
                        <a href="#features" class="text-sm font-bold text-slate-600 transition hover:text-teal-800">{{ __('landing.nav.features') }}</a>
                        <a href="#how-it-works" class="text-sm font-bold text-slate-600 transition hover:text-teal-800">{{ __('landing.nav.how_it_works') }}</a>
                        <a href="#pricing" class="text-sm font-bold text-slate-600 transition hover:text-teal-800">{{ __('landing.nav.pricing') }}</a>
                        <a href="#about" class="text-sm font-bold text-slate-600 transition hover:text-teal-800">{{ __('landing.nav.about') }}</a>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3">
                        @php
                            $currentLocale = app()->getLocale();
                            $switchLocale = $currentLocale === 'ar' ? 'en' : 'ar';
                        @endphp

                        <a
                            href="{{ route('app.setlocale', $switchLocale) }}"
                            class="flex h-10 items-center gap-2 rounded-xl border border-teal-900/10 bg-white/70 px-4 text-sm font-black text-teal-900 transition hover:bg-white"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
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


    {{-- HERO --}}
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
                            <svg class="h-5 w-5 transition group-hover:translate-x-1 rtl:group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">✓</span>
                            {{ __('landing.hero.trusted') }}
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">✓</span>
                            {{ __('landing.hero.secure') }}
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100 text-teal-800">✓</span>
                            {{ __('landing.hero.easy') }}
                        </div>
                    </div>

                    <div class="container mt-10">
                        <h1>اربط حساب واتساب بتاع الصيدلية</h1>
                        <button id="connect-btn" type="button" onclick="connectWhatsApp()">ربط حساب واتساب</button>
                        <div id="status-message"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- ========== Facebook SDK init (لازم يتعرّف قبل تحميل الـ SDK) ========== --}}
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: "{{ config('services.meta.app_id') }}",
                cookie: true,
                xfbml: true,
                version: "v24.0"
            });
        };
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    {{-- ========== WhatsApp Embedded Signup ========== --}}
    <script>
        let signupSessionData = null;   // { waba_id, phone_number_id } من الـ message event
        let authCode = null;            // الكود من FB.login callback
        let sent = false;               // عشان نبعت مرة واحدة بس
        let waitTimer = null;

        // بنبعت للسيرفر أول ما الاتنين (code + بيانات الحساب) يبقوا جاهزين، بغض النظر عن الترتيب
        function tryFinish() {
            if (sent || !authCode) return;
            if (!signupSessionData || !signupSessionData.waba_id || !signupSessionData.phone_number_id) return;

            sent = true;
            clearTimeout(waitTimer);
            sendCodeToServer(authCode);
        }

        // استقبال بيانات WABA و phone_number_id من نافذة الـ signup
        window.addEventListener("message", (event) => {
            if (!event.origin.endsWith("facebook.com")) return;
            try {
                const data = JSON.parse(event.data);
                if (data.type === "WA_EMBEDDED_SIGNUP") {
                    console.log("message event:", data); // احذفها بعد الاختبار
                    if (data.event === "FINISH" || data.event === "FINISH_ONLY_WABA") {
                        signupSessionData = data.data;
                        tryFinish();
                    } else if (data.event === "CANCEL") {
                        showStatus("تم إلغاء العملية أو حدث خطأ أثناء الربط", true);
                        resetButton();
                    }
                }
            } catch (e) {
                console.log("message event (raw):", event.data);
            }
        });

        // FB.login callback
        const fbLoginCallback = (response) => {
            console.log("login response:", response); // احذفها بعد الاختبار

            if (response.authResponse && response.authResponse.code) {
                authCode = response.authResponse.code;
                tryFinish();

                // لو بيانات الحساب متوصلتش خلال 15 ثانية نوقف ونبلّغ
                waitTimer = setTimeout(() => {
                    if (!sent) {
                        showStatus("لم يتم استلام بيانات الحساب من Meta، حاول مرة أخرى", true);
                        resetButton();
                    }
                }, 15000);
            } else {
                showStatus("تم إلغاء عملية الربط", true);
                resetButton();
            }
        };

        function sendCodeToServer(code) {
            showStatus("جاري ربط الحساب...");

            fetch("{{ route('whatsapp.handle') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    code: code,
                    waba_id: signupSessionData.waba_id,
                    phone_number_id: signupSessionData.phone_number_id
                })
            })
            .then(r => r.json())
            .then(data => {
                console.log("server response:", data); // احذفها بعد الاختبار
                if (data.success) {
                    showStatus("تم الربط بنجاح، جاري التحويل...");
                    window.location.href = data.redirect;
                } else {
                    showStatus(data.error || data.message || "حصل خطأ أثناء الربط", true);
                    resetButton();
                }
            })
            .catch(err => {
                console.error("Error:", err);
                showStatus("حصل خطأ في الاتصال بالسيرفر", true);
                resetButton();
            });
        }

        function connectWhatsApp() {
            const btn = document.getElementById("connect-btn");
            btn.disabled = true;

            // reset الحالة لكل محاولة
            signupSessionData = null;
            authCode = null;
            sent = false;
            clearTimeout(waitTimer);
            showStatus("");

            FB.login(fbLoginCallback, {
                config_id: "{{ config('services.meta.whatsapp_config_id') }}",
                response_type: "code",
                override_default_response_type: true,
                extras: {
                    setup: {},
                    sessionInfoVersion: "3"
                }
            });
        }

        function showStatus(message, isError = false) {
            const el = document.getElementById("status-message");
            el.textContent = message;
            el.className = isError ? "error" : "";
        }

        function resetButton() {
            document.getElementById("connect-btn").disabled = false;
        }
    </script>

</body>
</html>

<!-- End New Code For Test -->

