@extends('user.layout.user')

@section('title', __('custom.Prescription Details'))

@section('content')

<div class="min-h-screen bg-[#F5F7FA] px-4 py-6 sm:px-6 lg:px-8">

    {{-- Page Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            {{-- Breadcrumb --}}
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">

                <a href="{{ route('prescriptions.index') }}"
                   class="transition hover:text-indigo-600">
                    {{ __('custom.Prescriptions') }}
                </a>

                <svg class="h-4 w-4 rtl:rotate-180"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>
                </svg>

                <span class="text-slate-700">
                    {{ __('custom.Details') }}
                </span>

            </div>

            <h1 class="text-2xl font-bold text-slate-900">
                {{ __('custom.Prescription Details') }}
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                {{ __('custom.View prescription information and prescription items.') }}
            </p>
        </div>


        {{-- Actions --}}
        <div class="flex items-center gap-3">

            {{-- Back --}}
            <a href="{{ route('prescriptions.index') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-slate-300
                      bg-white px-4 py-2.5 text-sm font-medium text-slate-700
                      shadow-sm transition hover:bg-slate-50">

                <svg class="h-4 w-4 rtl:rotate-180"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>

                {{ __('custom.Back') }}
            </a>


            {{-- Edit --}}
            <a href="{{ route('prescriptions.edit', $prescription) }}"
               class="inline-flex items-center gap-2 rounded-lg submitbtn
                      px-4 py-2.5 text-sm font-medium text-white shadow-sm
                      transition">

                <svg class="h-4 w-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0
                             002 2h11a2 2 0 002-2v-5
                             M18.5 2.5a2.121 2.121 0
                             013 3L12 15l-4 1 1-4
                             9.5-9.5z"/>
                </svg>

                {{ __('custom.Edit') }}
            </a>

        </div>

    </div>


    {{-- Prescription Information --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- Main Information --}}
        <div class="lg:col-span-2">

            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-50 submitbtn">

                            <svg class="h-6 w-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0
                                         01-2-2V5a2 2 0 012-2h6.586a1
                                         1 0 01.707.293l3.414 3.414a1
                                         1 0 01.293.707V19a2 2 0
                                         01-2 2z"/>
                            </svg>

                        </div>

                        <div>

                            <h2 class="text-lg font-semibold text-slate-900">
                                {{ __('custom.Prescription Information') }}
                            </h2>

                            <p class="text-sm text-slate-500">
                                {{ __('custom.Basic information about this prescription.') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Information --}}
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 p-6 sm:grid-cols-2">

                    {{-- Prescription Name --}}
                    <div class="sm:col-span-2">

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Prescription Name') }}
                        </p>

                        <p class="text-base font-semibold text-slate-900">
                            {{ $prescription->prescription_name }}
                        </p>

                    </div>


                    {{-- Patient --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Patient') }}
                        </p>

                        <p class="text-sm font-semibold text-slate-900">
                            {{ $prescription->patient?->name ?? __('custom.N/A') }}
                        </p>

                    </div>


                    {{-- Prescription Date --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Prescription Date') }}
                        </p>

                        <p class="text-sm font-semibold text-slate-900">
                            {{ $prescription->prescription_date?->format('M d, Y h:i A') ?? __('custom.N/A') }}
                        </p>

                    </div>


                    {{-- Status --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Status') }}
                        </p>

                        @if($prescription->status === 'active')

                            <span class="inline-flex items-center gap-1.5 rounded-full
                                         bg-emerald-50 px-3 py-1 text-xs font-semibold
                                         text-emerald-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                {{ __('custom.Active') }}

                            </span>

                        @elseif($prescription->status === 'completed')

                            <span class="inline-flex items-center gap-1.5 rounded-full
                                         bg-blue-50 px-3 py-1 text-xs font-semibold
                                         text-blue-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                {{ __('custom.Completed') }}

                            </span>

                        @elseif($prescription->status === 'cancelled')

                            <span class="inline-flex items-center gap-1.5 rounded-full
                                         bg-red-50 px-3 py-1 text-xs font-semibold
                                         text-red-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                {{ __('custom.Cancelled') }}

                            </span>

                        @else

                            <span class="inline-flex items-center rounded-full
                                         bg-slate-100 px-3 py-1 text-xs font-semibold
                                         text-slate-700">

                                {{ $prescription->status ?? __('custom.N/A') }}

                            </span>

                        @endif

                    </div>


                    {{-- Created By --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Created By') }}
                        </p>

                        <p class="text-sm font-semibold text-slate-900">
                            {{ $prescription->addedBy?->name ?? __('custom.N/A') }}
                        </p>

                    </div>


                    {{-- Created At --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Created At') }}
                        </p>

                        <p class="text-sm text-slate-700">
                            {{ $prescription->created_at?->format('M d, Y h:i A') ?? __('custom.N/A') }}
                        </p>

                    </div>


                    {{-- Updated At --}}
                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ __('custom.Last Updated') }}
                        </p>

                        <p class="text-sm text-slate-700">
                            {{ $prescription->updated_at?->format('M d, Y h:i A') ?? __('custom.N/A') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Prescription Items --}}
            <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-lg font-semibold text-slate-900">
                                {{ __('custom.Prescription Items') }}
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                {{ __('custom.Medications included in this prescription.') }}
                            </p>

                        </div>

                        <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold submitbtn">
                            {{ $prescription->items->count() }}
                            {{ __('custom.Items') }}
                        </span>

                    </div>

                </div>


                @if($prescription->items->count())

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-slate-200">

                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="px-6 py-3 text-start text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        #
                                    </th>

                                    <th class="px-6 py-3 text-start text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        {{ __('custom.Medication') }}
                                    </th>

                                    <th class="px-6 py-3 text-start text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        {{ __('custom.Quantity') }}
                                    </th>

                                    <th class="px-6 py-3 text-start text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        {{ __('custom.Dosage') }}
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100 bg-white">

                                @foreach($prescription->items as $index => $item)

                                    <tr class="transition hover:bg-slate-50">

                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4">

                                            <div class="font-medium text-slate-900">
                                                {{ $item->medication?->name ?? $item->medication_name ?? __('custom.N/A') }}
                                            </div>

                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                            {{ $item->quantity ?? __('custom.N/A') }}
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                            {{ $item->dosage ?? __('custom.N/A') }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="px-6 py-12 text-center">

                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">

                            <svg class="h-6 w-6 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0
                                         01-2-2V5a2 2 0 012-2h6"/>
                            </svg>

                        </div>

                        <h3 class="mt-3 text-sm font-semibold text-slate-900">
                            {{ __('custom.No prescription items') }}
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __('custom.No medications have been added to this prescription.') }}
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- Right Sidebar --}}
        <div class="space-y-6">

            {{-- Patient Card --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-lg font-semibold text-slate-900">
                        {{ __('custom.Patient') }}
                    </h2>

                </div>

                <div class="p-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full submitbtn">

                            <span class="text-lg font-bold">
                                {{ strtoupper(substr($prescription->patient?->name ?? 'P', 0, 1)) }}
                            </span>

                        </div>

                        <div class="min-w-0">

                            <p class="truncate text-sm font-semibold text-slate-900">
                                {{ $prescription->patient?->name ?? __('custom.N/A') }}
                            </p>

                            @if($prescription->patient?->phone)
                                <p class="mt-1 text-xs text-slate-500">
                                    {{ $prescription->patient->phone }}
                                </p>
                            @endif

                        </div>

                    </div>


                    @if($prescription->patient)

                        <a href="{{ route('patients.show', $prescription->patient) }}"
                           class="mt-5 inline-flex w-full items-center justify-center rounded-lg
                                  border border-slate-300 bg-white px-4 py-2.5 text-sm
                                  font-medium text-slate-700 transition hover:bg-slate-50">

                            {{ __('custom.View Patient') }}

                        </a>

                    @endif

                </div>

            </div>


            {{-- Prescription Summary --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-lg font-semibold text-slate-900">
                        {{ __('custom.Summary') }}
                    </h2>

                </div>

                <div class="space-y-5 p-6">

                    {{-- Items --}}
                    <div class="flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            {{ __('custom.Items') }}
                        </span>

                        <span class="text-sm font-semibold text-slate-900">
                            {{ $prescription->items->count() }}
                        </span>

                    </div>


                    {{-- Dispensations --}}
                    <div class="flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            {{ __('custom.Dispensations') }}
                        </span>

                        <span class="text-sm font-semibold text-slate-900">
                            {{ $prescription->dispensations->count() }}
                        </span>

                    </div>


                    {{-- Date --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-slate-500">
                            {{ __('custom.Date') }}
                        </span>

                        <span class="text-end text-sm font-semibold text-slate-900">
                            {{ $prescription->prescription_date?->format('M d, Y') ?? __('custom.N/A') }}
                        </span>

                    </div>


                    {{-- Status --}}
                    <div class="flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            {{ __('custom.Status') }}
                        </span>

                        <span class="text-sm font-semibold text-slate-900">
                            {{ ucfirst($prescription->status ?? __('custom.N/A')) }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- Delete --}}
            <div class="rounded-xl border border-red-100 bg-white p-6 shadow-sm">

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-50">

                        <svg class="h-5 w-5 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0
                                     0116.138 21H7.862a2 2 0
                                     01-1.995-1.858L5 7m5
                                     4v6m4-6v6m1-10V4a1 1
                                     0 00-1-1h-4a1 1 0
                                     00-1 1v3M4 7h16"/>
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-sm font-semibold text-slate-900">
                            {{ __('custom.Delete Prescription') }}
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            {{ __('custom.This action cannot be undone.') }}
                        </p>

                    </div>

                </div>


                <form action="{{ route('prescriptions.destroy', $prescription) }}"
                      method="POST"
                      class="mt-4"
                      onsubmit="return confirm('{{ __('custom.Are you sure you want to delete this prescription?') }}')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="w-full rounded-lg border border-red-200 bg-red-50
                                   px-4 py-2.5 text-sm font-semibold text-red-600
                                   transition hover:bg-red-100">

                        {{ __('custom.Delete Prescription') }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection