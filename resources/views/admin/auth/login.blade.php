{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- ************************************************************************************** --}}






<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar'? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ __('custom.Capsule — Sign in') }}</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
 @vite(['resources/css/app.css' , 'resources/js/app.js'])
<style>
  :root{
    --ink:#0E2B29;
    --ink-soft:rgba(14,43,41,0.64);
    --teal:#146356;
    --teal-2:#1C8272;
    --paper:#F5F2E8;
    --paper-2:#EDE8D8;
    --amber:#F0A93B;
    --coral:#E1573F;
    --sage:#9DBBA0;
    --line:rgba(14,43,41,0.14);
  }
  *{ box-sizing:border-box; }
  body{
    background:var(--paper);
    color:var(--ink);
    font-family:'Inter',sans-serif;
  }
  .font-display{ font-family:'Fraunces', serif; }
  .font-mono{ font-family:'IBM Plex Mono', monospace; }

  .brand-panel{
    background:
      radial-gradient(ellipse 700px 500px at 15% 10%, rgba(240,169,59,0.16), transparent 60%),
      radial-gradient(ellipse 600px 500px at 90% 90%, rgba(157,187,160,0.14), transparent 60%),
      linear-gradient(155deg, var(--ink) 0%, #103A36 55%, var(--teal) 130%);
  }
  .glow-ring{ animation: spin 60s linear infinite; transform-origin: 260px 300px; }
  @keyframes spin{ to{ transform: rotate(360deg); } }
  @media (prefers-reduced-motion: reduce){ .glow-ring{ animation: none; } }

  .chip{
    background:rgba(245,242,232,0.08);
    border:1px solid rgba(245,242,232,0.18);
    backdrop-filter: blur(6px);
  }

  .field{
    background:var(--paper);
    border:1.5px solid var(--line);
    transition: border-color .15s ease, box-shadow .15s ease;
  }
  .field:focus-within{
    border-color: var(--teal);
    box-shadow: 0 0 0 4px rgba(20,99,86,0.12);
  }
  input:focus{ outline:none; }

  .btn-primary{
    background: var(--ink);
    color: var(--paper);
    transition: transform .15s ease, background .15s ease;
  }
  .btn-primary:hover{ background: var(--teal); transform: translateY(-1px); }
  .btn-primary:active{ transform: translateY(0); }

  .sso-btn{
    border:1.5px solid var(--line);
    transition: border-color .15s ease, background .15s ease;
  }
  .sso-btn:hover{ border-color: var(--ink); background: rgba(14,43,41,0.03); }

  .stitch{
    background-image: repeating-linear-gradient(90deg, var(--line) 0 8px, transparent 8px 16px);
    height:1.5px;
  }

  ::selection{ background: var(--amber); color: var(--ink); }
</style>
</head>
<body class="min-h-screen">

  <div class="min-h-screen flex">

    <!-- LEFT BRAND PANEL -->
    <div class="hidden lg:flex lg:w-[46%] relative overflow-hidden brand-panel px-14 py-12 flex-col justify-between">


      <!-- logo -->
      <div class="flex items-center gap-3 relative z-10">
     
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none">
          <rect width="34" height="34" rx="10" fill="#F5F2E8" fill-opacity="0.12"/>
          <rect x="8" y="13" width="18" height="8" rx="4" fill="none" stroke="#F5F2E8" stroke-width="1.6"/>
          <line x1="17" y1="13" x2="17" y2="21" stroke="#F5F2E8" stroke-width="1.6"/>
          <circle cx="21.4" cy="17" r="1" fill="#F0A93B"/>
        </svg>
        <span class="font-display text-[#F5F2E8] text-lg tracking-wide">Capsule</span>
            <div class="text-end ml-48">

                <a href="{{ route("app.setlocale" , app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 text-blue-300"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="1.8"
         stroke-linecap="round"
         stroke-linejoin="round">
        <circle cx="12" cy="12" r="9"/>
        <path d="M3 12h18"/>
        <path d="M12 3c2.5 2.5 4 5.5 4 9s-1.5 6.5-4 9"/>
        <path d="M12 3c-2.5 2.5-4 5.5-4 9s1.5 6.5 4 9"/>
    </svg>

        <span class="font-display text-[#F5F2E8] text-lg tracking-wide">
         {{app()->getLocale() == 'ar' ? 'الانجليزية' : 'AR'}}
        </span>

  </a>
    </div>
      </div>
   
      
 

      <!-- illustration -->
      <div class="relative z-10 flex-1 flex items-center justify-center my-6">
        <svg viewBox="0 0 520 560" class="w-full max-w-md ">
          <circle class="glow-ring" cx="260" cy="300" r="225" fill="none" stroke="rgba(245,242,232,0.16)" stroke-width="1.5" stroke-dasharray="2 12"/>
          <circle cx="260" cy="300" r="185" fill="none" stroke="rgba(245,242,232,0.10)" stroke-width="1"/>

          <!-- satellite pills -->
          <g transform="translate(96,120) rotate(24)">
            <rect x="0" y="0" width="46" height="22" rx="11" fill="#E1573F" opacity="0.9"/>
          </g>
          <g transform="translate(392,108) rotate(-16)">
            <rect x="0" y="0" width="34" height="16" rx="8" fill="#9DBBA0" opacity="0.85"/>
          </g>
          <g transform="translate(78,392) rotate(-10)">
            <rect x="0" y="0" width="30" height="15" rx="7.5" fill="#F0A93B" opacity="0.9"/>
          </g>

          <!-- main capsule -->
          <defs>
            <clipPath id="capClip">
              <rect x="90" y="225" width="340" height="150" rx="75"/>
            </clipPath>
          </defs>
          <g transform="rotate(-18 260 300)">
            <g clip-path="url(#capClip)">
              <rect x="90" y="225" width="170" height="150" fill="#F0A93B"/>
              <rect x="260" y="225" width="170" height="150" fill="#F5F2E8"/>
              <circle cx="296" cy="262" r="6" fill="#E1573F"/>
              <circle cx="318" cy="300" r="5" fill="#146356"/>
              <circle cx="296" cy="330" r="4.5" fill="#9DBBA0"/>
              <circle cx="340" cy="278" r="4" fill="#146356"/>
              <circle cx="352" cy="322" r="6" fill="#E1573F"/>
              <circle cx="380" cy="252" r="4" fill="#9DBBA0"/>
              <circle cx="400" cy="300" r="5" fill="#146356"/>
            </g>
            <rect x="90" y="225" width="340" height="150" rx="75" fill="none" stroke="#0E2B29" stroke-width="4"/>
            <line x1="260" y1="225" x2="260" y2="375" stroke="#0E2B29" stroke-width="3"/>
          </g>

          <!-- heartbeat line -->
          <path d="M50,470 L150,470 L172,428 L196,512 L218,392 L240,470 L470,470"
                fill="none" stroke="#F0A93B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" opacity="0.9"/>
        </svg>
      </div>

      <!-- headline + chips -->
      {{-- <div class="relative z-10">
        <p class="font-display italic text-[#F5F2E8] text-3xl leading-snug mb-3">
          Every dose,<br/>accounted for.
        </p>
        <p class="text-[#F5F2E8]/70 text-sm max-w-xs mb-8">
          Dispensing, inventory and patient records — running from one calm, precise dashboard.
        </p>
        <div class="flex gap-3">
          <div class="chip rounded-xl px-4 py-3">
            <p class="font-mono text-[#F5F2E8] text-lg leading-none">12,400+</p>
            <p class="text-[#F5F2E8]/60 text-xs mt-1">pharmacies onboard</p>
          </div>
          <div class="chip rounded-xl px-4 py-3">
            <p class="font-mono text-[#F5F2E8] text-lg leading-none">99.98%</p>
            <p class="text-[#F5F2E8]/60 text-xs mt-1">dispensing accuracy</p>
          </div>
        </div>
      </div> --}}
    </div>

    <!-- RIGHT FORM PANEL -->
    <div class="flex-1 flex items-center justify-center px-6 sm:px-10 py-12">
      <div class="w-full max-w-md -mt-32">

        <!-- mobile logo -->
        <div class="flex lg:hidden items-center gap-3 mb-10">
          <svg width="32" height="32" viewBox="0 0 34 34" fill="none">
            <rect width="34" height="34" rx="10" fill="#0E2B29"/>
            <rect x="8" y="13" width="18" height="8" rx="4" fill="none" stroke="#F5F2E8" stroke-width="1.6"/>
            <line x1="17" y1="13" x2="17" y2="21" stroke="#F5F2E8" stroke-width="1.6"/>
            <circle cx="21.4" cy="17" r="1" fill="#F0A93B"/>
          </svg>
          <span class="font-display text-lg">Capsule</span>
        </div>

        <p class="font-mono text-xs uppercase tracking-[0.18em] text-[var(--ink-soft)] mb-2">{{ __("custom.Admin console") }}</p>
        <h1 class="font-display text-4xl mb-2">{{ __("custom.Welcome back") }}</h1>
        <p class="text-[var(--ink-soft)] text-sm mb-9">{{ __("custom.Sign in to continue managing today's queue.") }}</p>

        @if (session('status'))
            <div class="bg-red-500">
                {{ session('status') }}
            </div>
        @endif
        <form class="space-y-5" action="{{route('admin.login') }}" method="post">
          @csrf
          <div>
            <label class="block text-xs font-medium uppercase tracking-wide text-[var(--ink-soft)] mb-1.5">{{ __("custom.Work email") }}</label>
            <div class="field rounded-xl flex items-center gap-2.5 px-3.5 py-3">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="shrink-0 opacity-50">
                <rect x="3" y="5" width="18" height="14" rx="2.5" stroke="currentColor" stroke-width="1.6"/>
                <path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <input type="email" placeholder="you@pharmacy.com" name="email" class="bg-transparent w-full text-sm placeholder:text-[var(--ink-soft)]" />
             
            </div>
              @error('email')
                   <span class="text-red-500">{{ $message }}</span>
               @enderror
          </div>

          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-xs font-medium uppercase tracking-wide text-[var(--ink-soft)]">{{ __("custom.Password") }}</label>
              {{-- <a href="#" class="text-xs font-medium text-[var(--teal)] hover:underline">Forgot?</a> --}}
            </div>
            <div class="field rounded-xl flex items-center gap-2.5 px-3.5 py-3">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="shrink-0 opacity-50">
                <rect x="5" y="11" width="14" height="9" rx="2" stroke="currentColor" stroke-width="1.6"/>
                <path d="M8 11V8a4 4 0 018 0v3" stroke="currentColor" stroke-width="1.6"/>
              </svg>
              <input type="password" name="password" placeholder="••••••••••" class="bg-transparent w-full text-sm placeholder:text-[var(--ink-soft)]" />
            </div>
          </div>

          <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 text-sm text-[var(--ink-soft)] cursor-pointer">
              <input type="checkbox" name="remember" class="rounded border-[var(--line)] accent-[var(--teal)]" />
              {{ __("custom.Keep me signed in") }}
            </label>
          </div>

          <button type="submit" class="btn-primary w-full rounded-xl py-3.5 text-sm font-medium flex items-center justify-center gap-2 mt-2">
            {{ __("custom.Sign in to console") }}
            @if (app()->getLocale() == 'en ')
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            @else
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            @endif
          </button>
        </form>

      

   

   

        

      </div>
    </div>
  </div>

</body>
</html>







{{-- ************************************************************************************** --}}








