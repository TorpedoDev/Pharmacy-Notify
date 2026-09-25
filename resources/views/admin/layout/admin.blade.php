@include('admin.layout.partials.header')
@include('admin.layout.partials.sidebar')

<main class="flex-1 min-w-0">

    <!-- topbar -->
    <header class="flex items-center gap-4 px-6 lg:px-10 py-5 border-b" style="border-color:var(--line)">
      <div class="lg:hidden font-display text-lg">Capsule</div>
      <div class="field flex-1 max-w-md hidden sm:flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl border" style="border-color:var(--line); background:#fff">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="opacity-40"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><line x1="21" y1="21" x2="16.5" y2="16.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <input placeholder="Search patients, Rx#, medication…" class="text-sm w-full bg-transparent placeholder:text-[var(--ink-faint)]" />
      </div>
      <div class="flex-1"></div>
      <button class="relative w-9 h-9 rounded-full flex items-center justify-center border" style="border-color:var(--line)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M6 9a6 6 0 0112 0c0 4 1.5 5.5 1.5 5.5H4.5S6 13 6 9z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9.5 17a2.5 2.5 0 005 0" stroke="currentColor" stroke-width="1.6"/></svg>
        <span class="absolute -top-0.5 -right-0.5 w-3.5 h-3.5 rounded-full text-[9px] flex items-center justify-center text-white" style="background:var(--coral)">3</span>
      </button>

 

      <a href="{{ route("app.setlocale" , app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="flex items-center gap-2 justify-center border">
        <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7 text-[var(--teal)]"
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
      </a>

      <div class="flex items-center gap-2.5 pl-2">
              @php
    $initials = collect(explode(' ', trim(auth("admin")->user()->name)))
        ->filter()
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->join('');
@endphp
        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-medium" style="background:var(--teal)">{{ $initials }}</div>
        <div class="hidden sm:block leading-tight">
    
           <p class="text-sm font-medium">{{ auth("admin")->user()->name }}</p> 
          <p class="text-xs text-[var(--ink-soft)]">{{ __("custom.Adminstrator") }}</p>
        </div>
      </div>
    </header>

   
    <div class="px-6 lg:px-10 py-8 max-w-[1400px]">

       @yield('content')
     
    </div>
  </main>
  </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('scripts')
</body>
</html>
