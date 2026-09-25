@extends('admin.layout.admin')
@section('content')
Admin Dashboard

 <!-- greeting -->
      <div class="flex flex-wrap items-end justify-between gap-4 mb-8">
        <div>
          <p class="font-mono text-xs uppercase tracking-[0.16em] text-[var(--ink-soft)] mb-1">Tuesday, August 25</p>
          <h1 class="font-display text-3xl">Good afternoon, Amara</h1>
        </div>
        <button class="flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-medium text-white" style="background:var(--ink)">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><line x1="12" y1="5" x2="12" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          New prescription
        </button>
      </div>

      <!-- stat cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

        <div class="rx-card px-5 pt-5 pb-0 overflow-hidden">
          <div class="flex items-start justify-between mb-4">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:rgba(20,99,86,0.10)">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><rect x="4" y="9" width="16" height="7" rx="3.5" stroke="#146356" stroke-width="1.8"/><line x1="12" y1="9" x2="12" y2="16" stroke="#146356" stroke-width="1.8"/></svg>
            </div>
            <span class="badge text-[10px] text-[var(--ink-faint)]">RX-4471</span>
          </div>
          <p class="text-xs text-[var(--ink-soft)] mb-1">Prescriptions filled today</p>
          <p class="font-display text-3xl mb-3">248</p>
          <p class="text-xs chip-trend-up flex items-center gap-1 mb-4">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M5 15l7-7 7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            12.4% vs. yesterday
          </p>
          <div class="perf"></div>
        </div>

        <div class="rx-card px-5 pt-5 pb-0 overflow-hidden">
          <div class="flex items-start justify-between mb-4">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:rgba(240,169,59,0.14)">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="#96650E" stroke-width="1.8"/><path d="M3.5 19c.8-3.2 3-4.8 5.5-4.8s4.7 1.6 5.5 4.8" stroke="#96650E" stroke-width="1.8" stroke-linecap="round"/><circle cx="17.5" cy="9" r="2.4" stroke="#96650E" stroke-width="1.8"/></svg>
            </div>
            <span class="badge text-[10px] text-[var(--ink-faint)]">PAT-1120</span>
          </div>
          <p class="text-xs text-[var(--ink-soft)] mb-1">Active patients</p>
          <p class="font-display text-3xl mb-3">1,842</p>
          <p class="text-xs chip-trend-up flex items-center gap-1 mb-4">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M5 15l7-7 7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            4.1% this week
          </p>
          <div class="perf"></div>
        </div>

        <div class="rx-card px-5 pt-5 pb-0 overflow-hidden">
          <div class="flex items-start justify-between mb-4">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:rgba(225,87,63,0.12)">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><path d="M12 3l9 16H3l9-16z" stroke="#C0442F" stroke-width="1.8" stroke-linejoin="round"/><line x1="12" y1="10" x2="12" y2="14" stroke="#C0442F" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="17" r="0.9" fill="#C0442F"/></svg>
            </div>
            <span class="badge text-[10px] text-[var(--ink-faint)]">INV-0093</span>
          </div>
          <p class="text-xs text-[var(--ink-soft)] mb-1">Low stock alerts</p>
          <p class="font-display text-3xl mb-3">9</p>
          <p class="text-xs chip-trend-down flex items-center gap-1 mb-4">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M5 9l7 7 7-7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            3 need reorder today
          </p>
          <div class="perf"></div>
        </div>

        <div class="rx-card px-5 pt-5 pb-0 overflow-hidden">
          <div class="flex items-start justify-between mb-4">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:rgba(157,187,160,0.22)">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none"><path d="M4 17V9a2 2 0 012-2h12a2 2 0 012 2v8" stroke="#3E6B49" stroke-width="1.8"/><path d="M2 17h20l-1.5 4h-17L2 17z" stroke="#3E6B49" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </div>
            <span class="badge text-[10px] text-[var(--ink-faint)]">REV-2208</span>
          </div>
          <p class="text-xs text-[var(--ink-soft)] mb-1">Revenue today</p>
          <p class="font-display text-3xl mb-3">$6,214</p>
          <p class="text-xs chip-trend-up flex items-center gap-1 mb-4">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M5 15l7-7 7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            8.7% vs. yesterday
          </p>
          <div class="perf"></div>
        </div>
      </div>

      <!-- charts row -->
      <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">

        <!-- line chart -->
        <div class="xl:col-span-2 rx-card p-6">
          <div class="flex items-center justify-between mb-1">
            <div>
              <p class="font-display text-lg">Prescription volume</p>
              <p class="text-xs text-[var(--ink-soft)]">Filled vs. queued, last 7 days</p>
            </div>
            <div class="flex gap-4 text-xs">
              <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full inline-block" style="background:var(--teal)"></span>Filled</span>
              <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full inline-block" style="background:var(--amber)"></span>Queued</span>
            </div>
          </div>

          <svg viewBox="0 0 600 220" class="w-full mt-4" preserveAspectRatio="none">
            <defs>
              <linearGradient id="areaFill" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#146356" stop-opacity="0.22"/>
                <stop offset="100%" stop-color="#146356" stop-opacity="0"/>
              </linearGradient>
            </defs>
            <line x1="0" y1="30" x2="600" y2="30" stroke="var(--line)" stroke-width="1"/>
            <line x1="0" y1="90" x2="600" y2="90" stroke="var(--line)" stroke-width="1"/>
            <line x1="0" y1="150" x2="600" y2="150" stroke="var(--line)" stroke-width="1"/>
            <line x1="0" y1="210" x2="600" y2="210" stroke="var(--line)" stroke-width="1"/>

            <path d="M0,190 L100,175 L200,140 L300,155 L400,95 L500,110 L600,60"
                  fill="none" stroke="#F0A93B" stroke-width="2.5" stroke-dasharray="1 7" stroke-linecap="round"/>

            <path d="M0,150 L100,130 L200,95 L300,115 L400,60 L500,75 L600,30 L600,210 L0,210 Z"
                  fill="url(#areaFill)"/>
            <path d="M0,150 L100,130 L200,95 L300,115 L400,60 L500,75 L600,30"
                  fill="none" stroke="#146356" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>

            <g fill="#146356">
              <circle cx="0" cy="150" r="4"/><circle cx="100" cy="130" r="4"/><circle cx="200" cy="95" r="4"/>
              <circle cx="300" cy="115" r="4"/><circle cx="400" cy="60" r="4"/><circle cx="500" cy="75" r="4"/><circle cx="600" cy="30" r="4"/>
            </g>
          </svg>
          <div class="flex justify-between text-[11px] text-[var(--ink-faint)] font-mono mt-1 px-1">
            <span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span><span>Mon</span><span>Tue</span>
          </div>
        </div>

        <!-- donut -->
        <div class="rx-card p-6 flex flex-col">
          <p class="font-display text-lg mb-1">Inventory health</p>
          <p class="text-xs text-[var(--ink-soft)] mb-6">Across 1,204 SKUs</p>

          <div class="flex-1 flex items-center justify-center">
            <div class="relative w-40 h-40 rounded-full" style="background:conic-gradient(var(--teal) 0% 68%, var(--amber) 68% 90%, var(--coral) 90% 100%)">
              <div class="absolute inset-3 rounded-full flex flex-col items-center justify-center" style="background:var(--card)">
                <p class="font-display text-2xl">68%</p>
                <p class="text-[10px] text-[var(--ink-soft)]">healthy stock</p>
              </div>
            </div>
          </div>

          <div class="space-y-2.5 mt-4 text-sm">
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:var(--teal)"></span>In stock</span>
              <span class="font-mono text-[var(--ink-soft)]">819</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:var(--amber)"></span>Low stock</span>
              <span class="font-mono text-[var(--ink-soft)]">265</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:var(--coral)"></span>Out of stock</span>
              <span class="font-mono text-[var(--ink-soft)]">120</span>
            </div>
          </div>
        </div>
      </div>

      <!-- bottom row: refill queue + alerts -->
      <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 pb-10">

        <!-- refill queue table -->
        <div class="xl:col-span-2 rx-card p-6 overflow-hidden">
          <div class="flex items-center justify-between mb-5">
            <p class="font-display text-lg">Refill queue</p>
            <a href="#" class="text-xs font-medium text-[var(--teal)] hover:underline">View all</a>
          </div>

          <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm min-w-[560px]">
              <thead>
                <tr class="text-left text-[11px] uppercase tracking-wide text-[var(--ink-faint)] border-b" style="border-color:var(--line)">
                  <th class="pb-3 font-medium">Patient</th>
                  <th class="pb-3 font-medium">Medication</th>
                  <th class="pb-3 font-medium">Dosage</th>
                  <th class="pb-3 font-medium">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y" style="border-color:var(--line)">
                <tr>
                  <td class="py-3.5">
                    <div class="flex items-center gap-2.5">
                      <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#146356">JM</div>
                      <span class="font-medium">Jamal Muriithi</span>
                    </div>
                  </td>
                  <td class="py-3.5">
                    <span class="flex items-center gap-2"><span class="w-2 h-4 rounded-full" style="background:var(--coral)"></span>Amoxicillin 500mg</span>
                  </td>
                  <td class="py-3.5 font-mono text-[var(--ink-soft)]">3× daily / 7d</td>
                  <td class="py-3.5"><span class="status-pending px-2.5 py-1 rounded-full text-xs font-medium">Pending</span></td>
                </tr>
                <tr>
                  <td class="py-3.5">
                    <div class="flex items-center gap-2.5">
                      <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#E1573F">LN</div>
                      <span class="font-medium">Liu Na</span>
                    </div>
                  </td>
                  <td class="py-3.5">
                    <span class="flex items-center gap-2"><span class="w-2 h-4 rounded-full" style="background:var(--amber)"></span>Metformin 850mg</span>
                  </td>
                  <td class="py-3.5 font-mono text-[var(--ink-soft)]">2× daily / 30d</td>
                  <td class="py-3.5"><span class="status-ready px-2.5 py-1 rounded-full text-xs font-medium">Ready</span></td>
                </tr>
                <tr>
                  <td class="py-3.5">
                    <div class="flex items-center gap-2.5">
                      <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#9DBBA0">SO</div>
                      <span class="font-medium">Sade Okafor</span>
                    </div>
                  </td>
                  <td class="py-3.5">
                    <span class="flex items-center gap-2"><span class="w-2 h-4 rounded-full" style="background:var(--sage)"></span>Atorvastatin 20mg</span>
                  </td>
                  <td class="py-3.5 font-mono text-[var(--ink-soft)]">1× nightly / 30d</td>
                  <td class="py-3.5"><span class="status-dispensed px-2.5 py-1 rounded-full text-xs font-medium">Dispensed</span></td>
                </tr>
                <tr>
                  <td class="py-3.5">
                    <div class="flex items-center gap-2.5">
                      <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#F0A93B">RP</div>
                      <span class="font-medium">Rosa Petrova</span>
                    </div>
                  </td>
                  <td class="py-3.5">
                    <span class="flex items-center gap-2"><span class="w-2 h-4 rounded-full" style="background:#146356"></span>Levothyroxine 75mcg</span>
                  </td>
                  <td class="py-3.5 font-mono text-[var(--ink-soft)]">1× daily / 90d</td>
                  <td class="py-3.5"><span class="status-pending px-2.5 py-1 rounded-full text-xs font-medium">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- low stock blister alerts -->
        <div class="rx-card p-6">
          <div class="flex items-center justify-between mb-5">
            <p class="font-display text-lg">Reorder soon</p>
            <span class="badge text-[10px] text-[var(--ink-faint)]">3 items</span>
          </div>

          <div class="space-y-5">
            <div>
              <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium">Amoxicillin 500mg</span>
                <span class="text-xs font-mono text-[var(--ink-soft)]">4 left</span>
              </div>
              <div class="flex gap-1">
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium">Insulin Glargine</span>
                <span class="text-xs font-mono text-[var(--ink-soft)]">6 left</span>
              </div>
              <div class="flex gap-1">
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--amber)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium">Salbutamol Inhaler</span>
                <span class="text-xs font-mono text-[var(--ink-soft)]">2 left</span>
              </div>
              <div class="flex gap-1">
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full" style="background:var(--coral)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
                <span class="w-4 h-4 rounded-full border" style="border-color:var(--line)"></span>
              </div>
            </div>
          </div>

          <button class="w-full mt-6 rounded-xl py-2.5 text-sm font-medium border" style="border-color:var(--line)">
            Generate purchase order
          </button>
        </div>
      </div>


@endsection