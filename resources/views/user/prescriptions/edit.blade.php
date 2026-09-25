```blade
@extends("user.layout.user")

@section("title", __("custom.Edit Prescription"))

@section("content")

{{-- Breadcrumb --}}
<nav class="mb-6 flex items-center text-sm" aria-label="Breadcrumb">
    <ol class="flex items-center gap-2">

        <li>
            <a href="{{ route('dashboard') }}"
               class="font-medium text-slate-500 transition hover:text-indigo-600">
                {{ __("custom.Dashboard") }}
            </a>
        </li>

        <li class="text-slate-300">/</li>

        <li>
            <a href="{{ route('prescriptions.index') }}"
               class="font-medium text-slate-500 transition hover:text-indigo-600">
                {{ __("custom.Prescriptions") }}
            </a>
        </li>

        <li class="text-slate-300">/</li>

        <li class="font-semibold text-slate-800">
            {{ __("custom.Edit Prescription") }}
        </li>

    </ol>
</nav>


{{-- Page Header --}}
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __("custom.Edit Prescription") }}
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            {{ __("custom.Update prescription information and medications.") }}
        </p>
    </div>

    <a href="{{ route('prescriptions.index') }}"
       class="inline-flex items-center justify-center gap-2 rounded-lg
              border border-slate-300 bg-white px-4 py-2.5
              text-sm font-semibold text-slate-700 shadow-sm
              transition hover:bg-slate-50">

        @if (app()->getLocale() == 'en')

            <svg class="h-4 w-4"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>

        @else

            <svg class="h-4 w-4"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>

        @endif

        {{ __("custom.Back") }}

    </a>

</div>


{{-- Main Form Card --}}
<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    {{-- Card Header --}}
    <div class="border-b border-slate-200 bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-5">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white shadow-sm">

                <svg class="h-5 w-5 text-[#146356]"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                </svg>

            </div>

            <div>

                <h2 class="text-lg font-bold text-slate-900">
                    {{ __("custom.Prescription Information") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Update the prescription details and medications below.") }}
                </p>

            </div>

        </div>

    </div>


    {{-- Form --}}
    <form method="POST"
          action="{{ route('prescriptions.update', $prescription) }}"
          id="prescription-form">

        @csrf
        @method("PUT")


        <div class="space-y-8 p-6">


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


            {{-- ========================= --}}
            {{-- BASIC INFORMATION --}}
            {{-- ========================= --}}

            <div>

                <div class="mb-4">

                    <h3 class="text-base font-bold text-slate-900">
                        {{ __("custom.Basic Information") }}
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ __("custom.Enter the main prescription information.") }}
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                    {{-- Prescription Name --}}
                    <div>

                        <label for="prescription_name"
                               class="mb-2 block text-sm font-semibold text-slate-700">

                            {{ __("custom.Prescription Name") }}

                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            id="prescription_name"
                            name="prescription_name"
                            value="{{ old('prescription_name', $prescription->prescription_name) }}"
                            placeholder="{{ __("custom.Enter prescription name") }}"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-900
                                   outline-none transition
                                   placeholder:text-slate-400
                                   focus:border-[#146356]
                                   focus:ring-4 focus:ring-indigo-100
                                   @error('prescription_name')
                                       border-red-400
                                       focus:border-red-500
                                       focus:ring-red-100
                                   @enderror"
                        >

                        @error('prescription_name')

                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Patient --}}
                    <div>

                        <label for="patient_id"
                               class="mb-2 block text-sm font-semibold text-slate-700">

                            {{ __("custom.Patient") }}

                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            id="patient_id"
                            name="patient_id"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-900
                                   outline-none transition
                                   focus:border-[#146356]
                                   focus:ring-4 focus:ring-indigo-100
                                   @error('patient_id')
                                       border-red-400
                                       focus:border-red-500
                                       focus:ring-red-100
                                   @enderror">

                            <option value="">
                                {{ __("custom.Select patient") }}
                            </option>

                            @foreach ($patients as $patient)

                                <option
                                    value="{{ $patient->id }}"
                                    {{ old('patient_id', $prescription->patient_id) == $patient->id ? 'selected' : '' }}>

                                    {{ $patient->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('patient_id')

                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Prescription Date --}}
                    <div>

                        <label for="prescription_date"
                               class="mb-2 block text-sm font-semibold text-slate-700">

                            {{ __("custom.Prescription Date") }}

                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="datetime-local"
                            id="prescription_date"
                            name="prescription_date"
                            value="{{ old('prescription_date', $prescription->prescription_date?->format('Y-m-d\TH:i')) }}"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-900
                                   outline-none transition
                                   focus:border-[#146356]
                                   focus:ring-4 focus:ring-indigo-100
                                   @error('prescription_date')
                                       border-red-400
                                       focus:border-red-500
                                       focus:ring-red-100
                                   @enderror"
                        >

                        @error('prescription_date')

                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div>

                        <label for="status"
                               class="mb-2 block text-sm font-semibold text-slate-700">

                            {{ __("custom.Status") }}

                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            id="status"
                            name="status"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-900
                                   outline-none transition
                                   focus:border-[#146356]
                                   focus:ring-4 focus:ring-indigo-100">

                            @foreach ([
                                'pending' => 'Pending',
                                'partially_dispensed' => 'Partially Dispensed',
                                'fully_dispensed' => 'Fully Dispensed',
                                'cancelled' => 'Cancelled'
                            ] as $value => $label)

                                <option
                                    value="{{ $value }}"
                                    {{ old('status', $prescription->status) === $value ? 'selected' : '' }}>

                                    {{ __("custom." . $label) }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

            </div>


            {{-- Divider --}}
            <div class="border-t border-slate-200"></div>


            {{-- ========================= --}}
            {{-- MEDICATIONS --}}
            {{-- ========================= --}}

            <div>

                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h3 class="text-base font-bold text-slate-900">
                            {{ __("custom.Medications") }}
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __("custom.Add and manage medications for this prescription.") }}
                        </p>

                    </div>

                    <button
                        type="button"
                        id="add-medication"
                        class="inline-flex items-center justify-center gap-2
                               rounded-lg bg-[#146356]
                               px-4 py-2.5 text-sm font-semibold text-white
                               shadow-sm transition
                               hover:bg-[#1C8272]
                               focus:outline-none
                               focus:ring-4 focus:ring-indigo-200
                               active:scale-[0.98]">

                        <svg class="h-5 w-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                        {{ __("custom.Add Medication") }}

                    </button>

                </div>


                {{-- Medication Rows --}}
                <div id="medication-items" class="space-y-5">


                    @php

                        $items = old(
                            'items',
                            $prescription->items->map(function ($item) {

                                return [
                                    'medication_id' => $item->medication_id,
                                    'dosage' => $item->dosage,
                                    'frequency' => $item->frequency,
                                    'duration_value' => $item->duration_value,
                                    'duration_unit' => $item->duration_unit,
                                    'prescribed_quantity' => $item->prescribed_quantity,
                                    'is_chronic' => $item->is_chronic,
                                    'refill_enabled' => $item->refill_enabled,
                                    'refill_cycle_days' => $item->refill_cycle_days,
                                ];

                            })->toArray()
                        );

                    @endphp


                    @foreach ($items as $index => $item)

                        <div class="medication-item rounded-xl border border-slate-200
                                    bg-slate-50 p-5"
                             data-index="{{ $index }}">

                            {{-- Row Header --}}
                            <div class="mb-5 flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center
                                                rounded-lg bg-white text-sm font-bold
                                                text-[#146356] shadow-sm">

                                        {{ $index + 1 }}

                                    </div>

                                    <div>

                                        <h4 class="text-sm font-bold text-slate-800">
                                            {{ __("custom.Medication") }}
                                        </h4>

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="remove-medication inline-flex items-center
                                           gap-1.5 rounded-lg border border-red-200
                                           bg-white px-3 py-2 text-sm font-semibold
                                           text-red-600 transition
                                           hover:bg-red-50">

                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"/>

                                    </svg>

                                    {{ __("custom.Remove") }}

                                </button>

                            </div>


                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">


                                {{-- Medication --}}
                                <div class="lg:col-span-2">

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Medication") }}

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <select
                                        name="items[{{ $index }}][medication_id]"
                                        class="medication-select w-full rounded-lg
                                               border border-slate-300 bg-white
                                               px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                        <option value="">
                                            {{ __("custom.Select medication") }}
                                        </option>

                                        @foreach ($medications as $medication)

                                            <option
                                                value="{{ $medication->id }}"
                                                {{ $item['medication_id'] == $medication->id ? 'selected' : '' }}>

                                                {{ $medication->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- Quantity --}}
                                <div>

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Prescribed Quantity") }}

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        name="items[{{ $index }}][prescribed_quantity]"
                                        value="{{ $item['prescribed_quantity'] }}"
                                        placeholder="{{ __("custom.Enter quantity") }}"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               placeholder:text-slate-400
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                </div>


                                {{-- Dosage --}}
                                <div>

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Dosage") }}

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="items[{{ $index }}][dosage]"
                                        value="{{ $item['dosage'] }}"
                                        placeholder="{{ __("custom.Example: 500 mg") }}"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               placeholder:text-slate-400
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                </div>


                                {{-- Frequency --}}
                                <div>

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Frequency") }}

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="items[{{ $index }}][frequency]"
                                        value="{{ $item['frequency'] }}"
                                        placeholder="{{ __("custom.Example: 3 times daily") }}"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               placeholder:text-slate-400
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                </div>


                                {{-- Duration Value --}}
                                <div>

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Duration") }}

                                    </label>

                                    <input
                                        type="number"
                                        min="1"
                                        name="items[{{ $index }}][duration_value]"
                                        value="{{ $item['duration_value'] }}"
                                        placeholder="{{ __("custom.Enter duration") }}"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               placeholder:text-slate-400
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                </div>


                                {{-- Duration Unit --}}
                                <div>

                                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                                        {{ __("custom.Duration Unit") }}

                                    </label>

                                    <select
                                        name="items[{{ $index }}][duration_unit]"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                        <option value="">
                                            {{ __("custom.Select unit") }}
                                        </option>

                                        <option value="days"
                                            {{ $item['duration_unit'] === 'days' ? 'selected' : '' }}>
                                            {{ __("custom.Days") }}
                                        </option>

                                        <option value="weeks"
                                            {{ $item['duration_unit'] === 'weeks' ? 'selected' : '' }}>
                                            {{ __("custom.Weeks") }}
                                        </option>

                                        <option value="months"
                                            {{ $item['duration_unit'] === 'months' ? 'selected' : '' }}>
                                            {{ __("custom.Months") }}
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- Chronic / Refill --}}
                            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">


                                {{-- Chronic --}}
                                <label class="flex cursor-pointer items-center gap-3
                                              rounded-lg border border-slate-200
                                              bg-white p-4 transition hover:border-[#146356]">

                                    <input
                                        type="checkbox"
                                        name="items[{{ $index }}][is_chronic]"
                                        value="1"
                                        class="chronic-checkbox h-4 w-4 rounded
                                               border-slate-300 text-[#146356]
                                               focus:ring-[#146356]"
                                        {{ $item['is_chronic'] ? 'checked' : '' }}>

                                    <div>

                                        <span class="block text-sm font-semibold text-slate-800">
                                            {{ __("custom.Chronic Medication") }}
                                        </span>

                                        <span class="block text-xs text-slate-500">
                                            {{ __("custom.Keep this medication as part of the patient's chronic treatment.") }}
                                        </span>

                                    </div>

                                </label>


                                {{-- Refill --}}
                                <label class="flex cursor-pointer items-center gap-3
                                              rounded-lg border border-slate-200
                                              bg-white p-4 transition hover:border-[#146356]">

                                    <input
                                        type="checkbox"
                                        name="items[{{ $index }}][refill_enabled]"
                                        value="1"
                                        class="refill-checkbox h-4 w-4 rounded
                                               border-slate-300 text-[#146356]
                                               focus:ring-[#146356]"
                                        {{ $item['refill_enabled'] ? 'checked' : '' }}>

                                    <div>

                                        <span class="block text-sm font-semibold text-slate-800">
                                            {{ __("custom.Enable Refill") }}
                                        </span>

                                        <span class="block text-xs text-slate-500">
                                            {{ __("custom.Allow this medication to be refilled automatically.") }}
                                        </span>

                                    </div>

                                </label>

                            </div>


                            {{-- Refill Cycle --}}
                            <div class="refill-cycle mt-4
                                        {{ $item['refill_enabled'] ? '' : 'hidden' }}">

                                <label class="mb-2 block text-sm font-semibold text-slate-700">

                                    {{ __("custom.Refill Cycle") }}

                                </label>

                                <div class="flex max-w-sm items-center gap-3">

                                    <input
                                        type="number"
                                        min="1"
                                        name="items[{{ $index }}][refill_cycle_days]"
                                        value="{{ $item['refill_cycle_days'] }}"
                                        placeholder="{{ __("custom.Example: 30") }}"
                                        class="w-full rounded-lg border border-slate-300
                                               bg-white px-4 py-3 text-sm text-slate-900
                                               outline-none transition
                                               placeholder:text-slate-400
                                               focus:border-[#146356]
                                               focus:ring-4 focus:ring-indigo-100">

                                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">
                                        {{ __("custom.days") }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Empty State --}}
                <div id="no-medications"
                     class="{{ count($items) > 0 ? 'hidden' : '' }}
                            rounded-xl border border-dashed border-slate-300
                            bg-slate-50 px-6 py-10 text-center">

                    <div class="mx-auto flex h-12 w-12 items-center justify-center
                                rounded-full bg-white shadow-sm">

                        <svg class="h-6 w-6 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19.428 15.341A8 8 0 016.66 5.77m12.768 9.571A8 8 0 015.77 17.34m13.658-2A8.001 8.001 0 0112 20a8.001 8.001 0 01-7.428-4.659M15 9h.01M9 9h.01"/>

                        </svg>

                    </div>

                    <h4 class="mt-3 text-sm font-semibold text-slate-800">

                        {{ __("custom.No medications added") }}

                    </h4>

                    <p class="mt-1 text-sm text-slate-500">

                        {{ __("custom.Click Add Medication to add a medication to this prescription.") }}

                    </p>

                </div>

            </div>


        </div>


        {{-- Footer --}}
        <div class="flex flex-col-reverse gap-3 border-t border-slate-200
                    bg-slate-50 px-6 py-4 sm:flex-row sm:justify-end">

            <a href="{{ route('prescriptions.index') }}"
               class="inline-flex items-center justify-center rounded-lg
                      border border-slate-300 bg-white px-5 py-2.5
                      text-sm font-semibold text-slate-700 shadow-sm
                      transition hover:bg-slate-100">

                {{ __("custom.Cancel") }}

            </a>


            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2
                       rounded-lg bg-[#146356]
                       px-6 py-2.5 text-sm font-semibold text-white
                       shadow-sm transition
                       hover:bg-[#1C8272]
                       focus:outline-none
                       focus:ring-4 focus:ring-indigo-200
                       active:scale-[0.98]
                       submitbtn">

                <svg class="h-4 w-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>

                </svg>

                {{ __("custom.Update Prescription") }}

            </button>

        </div>

    </form>

</div>


@endsection


@push("scripts")

<script>

$(document).ready(function () {

    let medicationIndex = {{ count($items) }};


    /*
    |--------------------------------------------------------------------------
    | Add Medication
    |--------------------------------------------------------------------------
    */

    $('#add-medication').on('click', function () {

        let index = medicationIndex++;

        let medicationOptions = `
            <option value="">
                {{ __("custom.Select medication") }}
            </option>

            @foreach ($medications as $medication)
                <option value="{{ $medication->id }}">
                    {{ $medication->name }}
                </option>
            @endforeach
        `;


        let html = `

        <div class="medication-item rounded-xl border border-slate-200
                    bg-slate-50 p-5"
             data-index="${index}">


            {{-- Header --}}
            <div class="mb-5 flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="medication-number flex h-9 w-9
                                items-center justify-center rounded-lg
                                bg-white text-sm font-bold
                                text-[#146356] shadow-sm">

                        ${index + 1}

                    </div>

                    <h4 class="text-sm font-bold text-slate-800">

                        {{ __("custom.Medication") }}

                    </h4>

                </div>


                <button
                    type="button"
                    class="remove-medication inline-flex items-center
                           gap-1.5 rounded-lg border border-red-200
                           bg-white px-3 py-2 text-sm font-semibold
                           text-red-600 transition hover:bg-red-50">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"/>

                    </svg>

                    {{ __("custom.Remove") }}

                </button>

            </div>


            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">


                {{-- Medication --}}
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Medication") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        name="items[${index}][medication_id]"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                        ${medicationOptions}

                    </select>

                </div>


                {{-- Quantity --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Prescribed Quantity") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="items[${index}][prescribed_quantity]"
                        placeholder="{{ __("custom.Enter quantity") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                </div>


                {{-- Dosage --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Dosage") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="items[${index}][dosage]"
                        placeholder="{{ __("custom.Example: 500 mg") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                </div>


                {{-- Frequency --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Frequency") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="items[${index}][frequency]"
                        placeholder="{{ __("custom.Example: 3 times daily") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                </div>


                {{-- Duration --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Duration") }}

                    </label>

                    <input
                        type="number"
                        min="1"
                        name="items[${index}][duration_value]"
                        placeholder="{{ __("custom.Enter duration") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                </div>


                {{-- Duration Unit --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Duration Unit") }}

                    </label>

                    <select
                        name="items[${index}][duration_unit]"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                        <option value="">
                            {{ __("custom.Select unit") }}
                        </option>

                        <option value="days">
                            {{ __("custom.Days") }}
                        </option>

                        <option value="weeks">
                            {{ __("custom.Weeks") }}
                        </option>

                        <option value="months">
                            {{ __("custom.Months") }}
                        </option>

                    </select>

                </div>

            </div>


            {{-- Chronic / Refill --}}
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">


                {{-- Chronic --}}
                <label class="flex cursor-pointer items-center gap-3
                              rounded-lg border border-slate-200
                              bg-white p-4 transition hover:border-[#146356]">

                    <input
                        type="checkbox"
                        name="items[${index}][is_chronic]"
                        value="1"
                        class="chronic-checkbox h-4 w-4 rounded
                               border-slate-300 text-[#146356]
                               focus:ring-[#146356]">

                    <div>

                        <span class="block text-sm font-semibold text-slate-800">

                            {{ __("custom.Chronic Medication") }}

                        </span>

                        <span class="block text-xs text-slate-500">

                            {{ __("custom.Keep this medication as part of the patient's chronic treatment.") }}

                        </span>

                    </div>

                </label>


                {{-- Refill --}}
                <label class="flex cursor-pointer items-center gap-3
                              rounded-lg border border-slate-200
                              bg-white p-4 transition hover:border-[#146356]">

                    <input
                        type="checkbox"
                        name="items[${index}][refill_enabled]"
                        value="1"
                        class="refill-checkbox h-4 w-4 rounded
                               border-slate-300 text-[#146356]
                               focus:ring-[#146356]">

                    <div>

                        <span class="block text-sm font-semibold text-slate-800">

                            {{ __("custom.Enable Refill") }}

                        </span>

                        <span class="block text-xs text-slate-500">

                            {{ __("custom.Allow this medication to be refilled automatically.") }}

                        </span>

                    </div>

                </label>

            </div>


            {{-- Refill Cycle --}}
            <div class="refill-cycle mt-4 hidden">

                <label class="mb-2 block text-sm font-semibold text-slate-700">

                    {{ __("custom.Refill Cycle") }}

                </label>

                <div class="flex max-w-sm items-center gap-3">

                    <input
                        type="number"
                        min="1"
                        name="items[${index}][refill_cycle_days]"
                        placeholder="{{ __("custom.Example: 30") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100">

                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">

                        {{ __("custom.days") }}

                    </span>

                </div>

            </div>

        </div>
        `;


        $('#medication-items').append(html);

        updateMedicationNumbers();

        $('#no-medications').addClass('hidden');

    });


    /*
    |--------------------------------------------------------------------------
    | Remove Medication
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.remove-medication', function () {

        $(this).closest('.medication-item').remove();

        updateMedicationNumbers();

        if ($('.medication-item').length === 0) {

            $('#no-medications').removeClass('hidden');

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Refill Toggle
    |--------------------------------------------------------------------------
    */

    $(document).on('change', '.refill-checkbox', function () {

        let row = $(this).closest('.medication-item');

        let cycle = row.find('.refill-cycle');

        if ($(this).is(':checked')) {

            cycle.removeClass('hidden');

        } else {

            cycle.addClass('hidden');

            cycle.find('input').val('');

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Update Numbers
    |--------------------------------------------------------------------------
    */

    function updateMedicationNumbers() {

        $('.medication-item').each(function (index) {

            $(this)
                .find('.medication-number')
                .text(index + 1);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Submit Protection
    |--------------------------------------------------------------------------
    */

    $('#prescription-form').on('submit', function () {

        $('.submitbtn')
            .prop('disabled', true)
            .addClass('opacity-70 cursor-not-allowed');

    });

});

</script>

@endpush

