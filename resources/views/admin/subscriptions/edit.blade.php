@extends('admin.layout.admin')
@section("title" , __("custom.Edit Subscription"))
@section("content")


{{-- Breadcrumb --}}
        <nav class="mb-6 flex items-center text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        {{ __("custom.Dashboard") }}
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li>
                    <a href="{{ route('admin.subscriptions.index') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        {{ __("custom.Subscriptions") }}
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li class="font-semibold text-slate-800">
                    {{ __("custom.Edit Subscription") }}
                </li>
            </ol>
        </nav>


        {{-- Page Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    {{ __("custom.Edit Subscription") }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Edit subscription in your system.") }}
                </p>
            </div>

            <a href="{{ route('admin.subscriptions.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300
                      bg-white px-4 py-2.5 text-sm font-semibold text-slate-700
                      shadow-sm transition hover:bg-slate-50">
                 @if (app()->getLocale() == 'en')
                           <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                @else
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M14 5l7 7m0 0l-7 7m7-7H3"/>
</svg>

                      @endif

                {{ __("custom.Back") }}
            </a>

        </div>


        {{-- Form Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-slate-200 bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">
                    {{ __("custom.Subscription Information") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Update the information below to edit the subscription.") }}
                </p>
            </div>


            {{-- Form --}}
            <form method="POST" action="{{ route('admin.subscriptions.update' , $subscription) }}">
                @csrf
                @method("PUT")
                <div class="space-y-6 p-6">

                    {{-- Validation --}}
                    @if ($errors->any())
                        <div class="rounded-lg border border-red-200 bg-red-50 p-4">
                            <div class="flex gap-3">
                                <svg class="h-5 w-5 shrink-0 text-red-500"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>

                                <div>
                                    <p class="font-semibold text-red-800">
                                        {{ __("custom.Please fix the following errors:") }}
                                    </p>

                                    <ul class="mt-1 list-disc pl-5 text-sm text-red-700">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                    {{-- Fields --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- tenant_id --}}
                        <div>
                            <label for="tenant_id"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Tenant Name") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="tenant_id"
                                name="tenant_id"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('tenant_id') border-red-400 @enderror"
                            >
                                <option value="" disabled selected>{{ __("custom.Select Tenant") }}</option>

                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}"
                                        @selected($subscription->tenant_id == $tenant->id)>
                                        {{ $tenant->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('tenant_id')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>






 {{-- plan_id --}}
                        <div>
                            <label for="plan_id"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Plan Name") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="plan_id"
                                name="plan_id"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('plan_id') border-red-400 @enderror"
                            >
                                <option value="" disabled selected>{{ __("custom.Select Plan") }}</option>

                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}"
                                        @selected($subscription->plan_id == $plan->id)>
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('plan_id')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>



                        <div>
                            <label for="start_at"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Start Date") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="date"
                                id="start_at"
                                name="start_at"
                                value="{{ \Carbon\Carbon::parse($subscription->start_at)->format('Y-m-d') }}"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('start_at') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            >

                            @error('start_at')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                      
</div>
                    </div>
                </div>


                {{-- Footer Buttons --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50
                            px-6 py-4 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.subscriptions.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border
                              border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold
                              text-slate-700 shadow-sm transition hover:bg-slate-100">
                        {{ __("custom.Cancel") }}
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg
                               {{-- bg-indigo-600  --}}
                               px-6 py-2.5 text-sm font-semibold text-white
                               shadow-sm transition
                               {{-- hover:bg-indigo-700 --}}
                               focus:outline-none focus:ring-4 focus:ring-indigo-200
                               active:scale-[0.98] 
                               submitbtn
                               "
                               
                               >
                    
                       
                        <svg class="h-4 w-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M11 5H6a2 2 0
                                                         00-2 2v11a2 2 0
                                                         002 2h11a2 2 0
                                                         002-2v-5"/>

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M18.5 2.5a2.121
                                                         2.121 0 013 3L12
                                                         15l-4 1 1-4 9.5-9.5z"/>

                                            </svg>
                        {{ __("custom.Edit Subscription") }}
                    </button>

                </div>

            </form>
        </div>




@endsection

