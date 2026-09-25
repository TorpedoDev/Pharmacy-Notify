@extends('admin.layout.admin')
@section("title" , __("custom.Add Plan"))
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
                    <a href="{{ route('admin.plans.index') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        {{ __("custom.Plans") }}
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li class="font-semibold text-slate-800">
                    {{ __("custom.Add New Plan") }}
                </li>
            </ol>
        </nav>


        {{-- Page Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    {{ __("custom.Add New Plan") }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Add a new plan to your system.") }}
                </p>
            </div>

            <a href="{{ route('admin.plans.index') }}"
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
                    {{ __("custom.Plan Information") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Fill in the information below to add the plan.") }}
                </p>
            </div>


            {{-- Form --}}
            <form method="POST" action="{{ route('admin.plans.store') }}">
                @csrf

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

                        {{-- Name --}}
                        <div>
                            <label for="name"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Name") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="{{ __("custom.Enter plan name") }}"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('name') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            >

                            @error('name')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>



                        

                       


                        {{-- Period type --}}
                        <div>
                            <label for="period_type"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Period Type") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="period_type"
                                name="period_type"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('period_type') border-red-400 @enderror"
                            >
                                <option value="" disabled selected>{{ __("custom.Select Type") }}</option>

                                @foreach ($periodTypes as $type)
                                    <option value="{{ $type->value }}"
                                        @selected(old('period_type') == $type->value)>
                                        {{ __("custom." .  $type->name ) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('period_type')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                         {{-- period_value --}}
                        <div>
                            <label for="period_value"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Period Value") }}
                                <span class="text-red-500">*</span>
                            </label>

                               

                                <input
                                    type="number"
                                    step="1"
                                    min="0"
                                    id="period_value"
                                    name="period_value"
                                    value="{{ old('period_value') }}"
                                    placeholder="1"
                                    class="w-full rounded-lg border border-slate-300 bg-white
                                           py-3 pl-9 pr-4 text-sm text-slate-900 outline-none
                                           transition focus:border-indigo-500 focus:ring-4
                                           focus:ring-indigo-100"
                                >

                            @error('period_value')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>



                        {{-- Price --}}
                        <div>
                            <label for="price"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Price") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2
                                             text-sm font-medium text-slate-400">
                                    $
                                </span>

                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    placeholder="0.00"
                                    class="w-full rounded-lg border border-slate-300 bg-white
                                           py-3 pl-9 pr-4 text-sm text-slate-900 outline-none
                                           transition focus:border-indigo-500 focus:ring-4
                                           focus:ring-indigo-100"
                                >
                            </div>

                            @error('price')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Allowed Customers --}}
                        <div>
                            <label for="allowed_customers"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Allowed Customers") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                min="0"
                                id="allowed_customers"
                                name="allowed_customers"
                                value="{{ old('allowed_customers') }}"
                                placeholder="1"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
                            >

                            @error('allowed_customers')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                     {{-- Allowed Users --}}
                        <div>
                            <label for="allowed_users"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Allowed Users") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                min="0"
                                id="allowed_users"
                                name="allowed_users"
                                value="{{ old('allowed_users') }}"
                                placeholder="1"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
                            >

                            @error('allowed_users')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label for="features"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Features") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <textarea
                                id="features"
                                name="features"
                                rows="6"
                                placeholder="{{ __("custom.Enter features each one in one line") }}"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('features') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            ></textarea>

                            @error('features')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                     {{-- checkbox --}}




<div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
    <div>
        <label for="is_popular" class="text-sm font-medium text-slate-800">
            {{ __('custom.Is Popular') }}
        </label>

        <p class="mt-0.5 text-xs text-slate-500">
            {{ __('custom.Mark this plan as a popular plan') }}
        </p>
    </div>

    <label class="relative inline-flex cursor-pointer items-center">
        <input
            type="checkbox"
            name="is_popular"
            id="is_popular"
            value="1"
            class="peer sr-only"
            {{ old('is_popular', $plan->is_popular ?? false) ? 'checked' : '' }}
        >

        <div class="h-6 w-16 rounded-full bg-slate-300 transition-colors
                    peer-checked:bg-indigo-600
                    peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-100
                    after:absolute after:left-[2px] after:top-[2px]
                    after:h-5 after:w-5 after:rounded-full after:border
                    after:border-slate-300 after:bg-white after:transition-all
                    peer-checked:after:translate-x-full
                    peer-checked:after:border-white">
        </div>
    </label>
</div>





                     {{-- checkbox --}}




</div>
                    </div>
                </div>


                {{-- Footer Buttons --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50
                            px-6 py-4 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.plans.index') }}"
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
                    
                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                       {{ __("custom.Add Plan") }}
                    </button>

                </div>

            </form>
        </div>




@endsection