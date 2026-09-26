 <!-- SIDEBAR -->
  <aside class="sidebar hidden lg:flex lg:w-64 flex-col px-5 py-6 shrink-0">
    <div class="flex items-center gap-3 px-2 mb-9">
      <svg width="30" height="30" viewBox="0 0 34 34" fill="none">
        <rect width="34" height="34" rx="10" fill="#F5F2E8" fill-opacity="0.12"/>
        <rect x="8" y="13" width="18" height="8" rx="4" fill="none" stroke="#F5F2E8" stroke-width="1.6"/>
        <line x1="17" y1="13" x2="17" y2="21" stroke="#F5F2E8" stroke-width="1.6"/>
        <circle cx="21.4" cy="17" r="1" fill="#F0A93B"/>
      </svg>
      <span class="font-display text-[#F5F2E8] text-lg">Capsule</span>
    </div>

    <nav class="flex-1 space-y-1">
      <p class="px-3 text-[10px] uppercase tracking-[0.16em] text-[#F5F2E8]/35 mb-2 mt-2">{{ __("custom.Workspace") }}</p>

      <a href="{{ route("dashboard") }}" class="nav-item {{ request()->is('dashboard*') ? "active" : "" }}  flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="8" height="8" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="3" width="8" height="8" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="3" y="13" width="8" height="8" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="8" height="8" rx="2" stroke="currentColor" stroke-width="1.7"/></svg>
        {{ __("custom.Dashboard") }}
      </a>
       <a href="{{ route("prescriptions.index") }}" class="nav-item {{ request()->is('prescriptions*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><rect x="5" y="4" width="14" height="17" rx="2" stroke="currentColor" stroke-width="1.7"/><line x1="8.5" y1="9" x2="15.5" y2="9" stroke="currentColor" stroke-width="1.7"/><line x1="8.5" y1="13" x2="15.5" y2="13" stroke="currentColor" stroke-width="1.7"/><line x1="8.5" y1="17" x2="12.5" y2="17" stroke="currentColor" stroke-width="1.7"/></svg>
        {{ __("custom.Prescriptions") }}
      </a>
      <a href="{{ route("patients.index") }}" class="nav-item {{ request()->is('patients*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><path d="M3 8l9-5 9 5-9 5-9-5z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M3 8v8l9 5 9-5V8" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
        {{ __("custom.Patients") }}
      </a>
      <a href="{{ route("medications.index") }}" class="nav-item {{ request()->is('medications*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><rect x="4" y="9" width="16" height="7" rx="3.5" stroke="currentColor" stroke-width="1.7"/><line x1="12" y1="9" x2="12" y2="16" stroke="currentColor" stroke-width="1.7"/></svg>
        {{ __("custom.Medications") }}
      </a>

        <a href="{{ route("missingmedications.index") }}" class="nav-item {{ request()->is('missingmedications*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>



<svg width="17" height="17" viewBox="0 0 24 24" fill="none">
    <rect x="4" y="9" width="16" height="7" rx="3.5"
          stroke="currentColor" stroke-width="1.7"/>

    <line x1="12" y1="9" x2="12" y2="16"
          stroke="currentColor" stroke-width="1.7"/>

    <path d="M19 4v3"
          stroke="currentColor"
          stroke-width="1.7"
          stroke-linecap="round"/>

    <circle cx="19" cy="9" r="0.9"
            fill="currentColor"/>
</svg>

        {{ __("custom.Missing Medications") }}
      </a>
      
      <a href="{{ route("users.index") }}" class="nav-item {{ request()->is('users*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19c.8-3.2 3-4.8 5.5-4.8s4.7 1.6 5.5 4.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="17.5" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/><path d="M15.8 14.6c1.9.3 3.3 1.7 3.9 4.4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
        {{ __("custom.Users") }}
      </a>
     
      <a href="#" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><line x1="6" y1="20" x2="6" y2="12" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/><line x1="12" y1="20" x2="12" y2="6" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/><line x1="18" y1="20" x2="18" y2="15" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg>
        {{ __("custom.Reports") }}
      </a>

      <p class="px-3 text-[10px] uppercase tracking-[0.16em] text-[#F5F2E8]/35 mb-2 mt-6">{{ __("custom.Account") }}</p>
      <a href="{{ route("profile.index") }}" class="nav-item {{ request()->is('profile*') ? "active" : "" }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
        <span class="dot w-1.5 h-1.5 rounded-full bg-transparent"></span>
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M12 2v3M12 19v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M2 12h3M19 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
        {{ __("custom.Settings") }}
      </a>
    
 
      <div class="shrink-0 bg-teal-950 hover:bg-[--ink] rounded-lg">
      <!-- Logout -->
<form action="{{ route('admin.logout') }}" method="POST" class="mt-8">
    @csrf

    <button
        type="submit"
        class="group flex w-full items-center gap-3 rounded-lg px-3 py-2.5
               text-sm font-medium text-[#F5F2E8]/70
               transition-all duration-200
               hover:bg-red-500/10 hover:text-red-400
               focus:outline-none focus:ring-2 focus:ring-red-400/30"
    >
        <span class="flex h-7 w-7 items-center justify-center rounded-md
                     bg-[#F5F2E8]/5
                     transition-all duration-200
                     group-hover:bg-red-500/10">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.7"
                class="h-[17px] w-[17px]"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 12h9m0 0-3-3m3 3-3 3"
                />
            </svg>
        </span>

        <span>{{ __("custom.Logout") }}</span>
    </button>
</form>
</div>
    </nav>


{{-- <!-- Logout -->
<form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
    @csrf

    <button
        type="submit"
        class="group flex w-full items-center gap-3 rounded-lg px-3 py-2.5
               text-sm font-medium text-[#F5F2E8]/70
               transition-all duration-200
               hover:bg-red-500/10 hover:text-red-400
               focus:outline-none focus:ring-2 focus:ring-red-400/30"
    >
        <span class="flex h-7 w-7 items-center justify-center rounded-md
                     bg-[#F5F2E8]/5
                     transition-all duration-200
                     group-hover:bg-red-500/10">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.7"
                class="h-[17px] w-[17px]"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 12h9m0 0-3-3m3 3-3 3"
                />
            </svg>
        </span>

        <span>Logout</span>
    </button>
</form> --}}








    <div class="mt-6 rounded-xl p-4" style="background:rgba(245,242,232,0.06)">
      <p class="text-[#F5F2E8] text-xs font-medium mb-1">Storage temp check</p>
      <p class="font-mono text-[#F0A93B] text-lg leading-none mb-1">4.2°C</p>
      <p class="text-[#F5F2E8]/45 text-[11px]">Cold-chain fridge · nominal</p>
    </div>
    
  </aside>
