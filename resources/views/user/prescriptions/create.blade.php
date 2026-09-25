@extends('user.layout.user')

@section("title", __("custom.Create Prescription"))

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
            {{ __("custom.Create Prescription") }}
        </li>

    </ol>

</nav>

{{-- Header --}}
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __("custom.Create Prescription") }}
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            {{ __("custom.Create a new prescription for a patient.") }}
        </p>

    </div>

    <a href="{{ route('prescriptions.index') }}"
       class="inline-flex items-center justify-center gap-2 rounded-lg
              border border-slate-300 bg-white px-4 py-2.5
              text-sm font-semibold text-slate-700 shadow-sm
              transition hover:bg-slate-50">

        @if(app()->getLocale() == 'en')

            <svg class="h-4 w-4" fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

            </svg>

        @else

            <svg class="h-4 w-4" fill="none"
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

<form method="POST" action="{{ route('prescriptions.store') }}">

    @csrf

    <div class="space-y-6">

        @if($errors->any())

            <div class="rounded-lg border border-red-200 bg-red-50 p-4">

                <div class="flex gap-3">

                    <svg class="h-5 w-5 shrink-0 text-red-500"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M21
                                 12a9 9 0 11-18 0
                                 9 9 0 0118 0z"/>

                    </svg>

                    <div>

                        <p class="font-semibold text-red-800">
                            {{ __("custom.Please fix the following errors:") }}
                        </p>

                        <ul class="mt-1 list-disc pl-5 text-sm text-red-700">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif

        {{-- Prescription Information --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200
                    bg-white shadow-sm">

            <div class="border-b border-slate-200
                        bg-gradient-to-r from-indigo-50 to-blue-50
                        px-6 py-5">

                <h2 class="text-lg font-bold text-slate-900">
                    {{ __("custom.Prescription Information") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Enter the basic prescription information.") }}
                </p>

            </div>

            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

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
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100
                               @error('patient_id')
                                   border-red-400
                                   focus:border-red-500
                                   focus:ring-red-100
                               @enderror">

                        <option value="">
                            {{ __("custom.Select patient") }}
                        </option>

                        @foreach($patients as $patient)

                            <option
                                value="{{ $patient->id }}"
                                @selected(old('patient_id', request('patient_id')) == $patient->id)>

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
                        value="{{ old('prescription_name') }}"
                        placeholder="{{ __("custom.Enter prescription name") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100
                               @error('prescription_name')
                                   border-red-400
                                   focus:border-red-500
                                   focus:ring-red-100
                               @enderror">

                    @error('prescription_name')

                        <p class="mt-1.5 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                {{-- Date --}}
                <div>

                    <label for="prescription_date"
                           class="mb-2 block text-sm font-semibold text-slate-700">

                        {{ __("custom.Prescription Date") }}

                    </label>

                    <input
                        type="datetime-local"
                        id="prescription_date"
                        name="prescription_date"
                        value="{{ old('prescription_date', now()->format('Y-m-d\TH:i')) }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm text-slate-900
                               outline-none transition
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                </div>

            </div>

        </div>

        {{-- Prescription Items --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200
                    bg-white shadow-sm">

            <div class="flex flex-col gap-4 border-b border-slate-200
                        bg-gradient-to-r from-indigo-50 to-blue-50
                        px-6 py-5 sm:flex-row sm:items-center
                        sm:justify-between">

                <div>

                    <h2 class="text-lg font-bold text-slate-900">
                        {{ __("custom.Medications") }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ __("custom.Add the medications included in this prescription.") }}
                    </p>

                </div>

                <button
                    type="button"
                    id="add-item"
                    class="inline-flex items-center justify-center gap-2
                           rounded-lg bg-[#146356] px-4 py-2.5
                           text-sm font-semibold text-white
                           shadow-sm transition hover:bg-[#1C8272]">

                    <svg class="h-4 w-4" fill="none"
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

            <div class="p-6">

                <div id="items-container" class="space-y-5">

                    {{-- First item is generated by JS --}}

                </div>

            </div>

        </div>

    </div>

    {{-- Footer --}}
    <div class="mt-6 flex flex-col-reverse gap-3
                border-t border-slate-200 bg-slate-50
                px-6 py-4 sm:flex-row sm:justify-end">

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
                   rounded-lg bg-[#146356] px-6 py-2.5
                   text-sm font-semibold text-white shadow-sm
                   transition hover:bg-[#1C8272]
                   focus:outline-none focus:ring-4
                   focus:ring-indigo-200 active:scale-[0.98]">

            <svg class="h-4 w-4" fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 13l4 4L19 7"/>

            </svg>

            {{ __("custom.Create Prescription") }}

        </button>

    </div>

</form>

@endsection

@push("scripts")

<script>

let itemIndex = 0;

const medications = @json($medications);

function medicationOptions(selected = '') {

    let html = `
        <option value="">
            {{ __("custom.Select medication") }}
        </option>
    `;

    medications.forEach(function (medication) {

        html += `
            <option value="${medication.id}"
                ${selected == medication.id ? 'selected' : ''}>
                ${medication.name}
            </option>
        `;

    });

    return html;
}

function addItem(data = {}) {

    let index = itemIndex++;

    let html = `

        <div class="prescription-item rounded-xl border
                    border-slate-200 bg-slate-50 p-5">

            <div class="mb-5 flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center
                                justify-center rounded-lg
                                bg-indigo-100 text-sm font-bold
                                text-indigo-600">

                        ${index + 1}

                    </div>

                    <div>

                        <h3 class="font-semibold text-slate-800">
                            {{ __("custom.Medication") }}
                        </h3>

                        <p class="text-xs text-slate-400">
                            {{ __("custom.Prescription item") }}
                        </p>

                    </div>

                </div>

                <button
                    type="button"
                    class="remove-item rounded-lg p-2
                           text-slate-400 transition
                           hover:bg-red-100 hover:text-red-600">

                    <svg class="h-5 w-5" fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 7l-.867 12.142
                                 A2 2 0 0116.138 21H7.862
                                 a2 2 0 01-1.995-1.858L5
                                 7m5 4v6m4-6v6M9 7V4a1 1
                                 0 011-1h4a1 1 0 011 1v3
                                 m-9 0h14"/>

                    </svg>

                </button>

            </div>

            <div class="grid grid-cols-1 gap-5
                        md:grid-cols-2 lg:grid-cols-3">

                <div>

                    <label class="mb-2 block text-sm
                                   font-semibold text-slate-700">

                        {{ __("custom.Medication") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        name="items[${index}][medication_id]"
                        required
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm
                               text-slate-900 outline-none
                               transition focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                        ${medicationOptions(data.medication_id ?? '')}

                    </select>

                </div>

                <div>

                    <label class="mb-2 block text-sm
                                   font-semibold text-slate-700">

                        {{ __("custom.Dosage") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="items[${index}][dosage]"
                        value="${data.dosage ?? ''}"
                        placeholder="{{ __("custom.Example: 500 mg") }}"
                        required
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm
                               text-slate-900 outline-none
                               placeholder:text-slate-400
                               transition focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                </div>

                <div>

                    <label class="mb-2 block text-sm
                                   font-semibold text-slate-700">

                        {{ __("custom.Frequency") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="items[${index}][frequency]"
                        value="${data.frequency ?? ''}"
                        placeholder="{{ __("custom.Example: 3 times daily") }}"
                        required
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm
                               text-slate-900 outline-none
                               placeholder:text-slate-400
                               transition focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                </div>

                <div>

                    <label class="mb-2 block text-sm
                                   font-semibold text-slate-700">

                        {{ __("custom.Duration") }}

                    </label>

                    <div class="flex gap-2">

                        <input
                            type="number"
                            min="1"
                            name="items[${index}][duration_value]"
                            value="${data.duration_value ?? ''}"
                            placeholder="{{ __("custom.Value") }}"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm
                                   text-slate-900 outline-none
                                   placeholder:text-slate-400
                                   focus:border-indigo-500
                                   focus:ring-4 focus:ring-indigo-100">

                        <select
                            name="items[${index}][duration_unit]"
                            class="w-full rounded-lg border border-slate-300
                                   bg-white px-4 py-3 text-sm
                                   text-slate-900 outline-none
                                   focus:border-indigo-500
                                   focus:ring-4 focus:ring-indigo-100">

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

                <div>

                    <label class="mb-2 block text-sm
                                   font-semibold text-slate-700">

                        {{ __("custom.Prescribed Quantity") }}

                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0.01"
                        name="items[${index}][prescribed_quantity]"
                        value="${data.prescribed_quantity ?? ''}"
                        required
                        placeholder="{{ __("custom.Enter quantity") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 text-sm
                               text-slate-900 outline-none
                               placeholder:text-slate-400
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                </div>

            </div>

            <div class="mt-5 flex flex-wrap gap-6
                        border-t border-slate-200 pt-5">

                <label class="inline-flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="items[${index}][is_chronic]"
                        value="1"
                        ${data.is_chronic ? 'checked' : ''}
                        class="h-4 w-4 rounded border-slate-300
                               text-[#146356]
                               focus:ring-indigo-200">

                    <span class="text-sm font-semibold text-slate-700">
                        {{ __("custom.Chronic Medication") }}
                    </span>

                </label>

                <label class="inline-flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="items[${index}][refill_enabled]"
                        value="1"
                        ${data.refill_enabled ? 'checked' : ''}
                        class="h-4 w-4 rounded border-slate-300
                               text-[#146356]
                               focus:ring-indigo-200">

                    <span class="text-sm font-semibold text-slate-700">
                        {{ __("custom.Enable Refill") }}
                    </span>

                </label>

            </div>

            <div class="mt-4 hidden refill-cycle">

                <label class="mb-2 block text-sm
                               font-semibold text-slate-700">

                    {{ __("custom.Refill Cycle") }}

                </label>

                <div class="relative max-w-xs">

                    <input
                        type="number"
                        min="1"
                        name="items[${index}][refill_cycle_days]"
                        value="${data.refill_cycle_days ?? ''}"
                        placeholder="{{ __("custom.Days") }}"
                        class="w-full rounded-lg border border-slate-300
                               bg-white px-4 py-3 pr-16 text-sm
                               text-slate-900 outline-none
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100">

                    <span class="pointer-events-none absolute
                                 inset-y-0 right-4 flex items-center
                                 text-sm text-slate-400">

                        {{ __("custom.days") }}

                    </span>

                </div>

            </div>

        </div>
    `;

    $('#items-container').append(html);

    let item = $('#items-container .prescription-item').last();

    let refillCheckbox =
        item.find('input[name$="[refill_enabled]"]');

    let refillCycle =
        item.find('.refill-cycle');

    function toggleRefill() {

        if (refillCheckbox.is(':checked')) {
            refillCycle.removeClass('hidden');
        } else {
            refillCycle.addClass('hidden');
        }

    }

    refillCheckbox.on('change', toggleRefill);

    toggleRefill();
}

$('#add-item').on('click', function () {
    addItem();
});

$(document).on('click', '.remove-item', function () {

    $(this).closest('.prescription-item').remove();

});

addItem();

</script>

@endpush

