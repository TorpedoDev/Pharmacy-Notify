@extends('user.layout.user')

@section('title', __('custom.Patient Details'))

@section('content')

<div class="min-h-screen bg-[#F5F7FA] px-4 py-6 sm:px-6 lg:px-8">


{{-- Page Header --}}
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        {{-- Breadcrumb --}}
        <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">

            <a href="{{ route('patients.index') }}"
               class="transition hover:text-indigo-600">
                {{ __('custom.Patients') }}
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
            {{ __('custom.Patient Details') }}
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            {{ __('custom.View patient information and prescription history.') }}
        </p>
    </div>

    {{-- Actions --}}
    <div class="flex items-center gap-3">

        <a href="{{ route('patients.index') }}"
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

        <a href="{{ route('patients.edit', $patient) }}"
           class="inline-flex items-center gap-2 rounded-lg bg-indigo-600
                  px-4 py-2.5 text-sm font-medium text-white shadow-sm
                  transition hover:bg-indigo-700 submitbtn">

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

            {{ __('custom.Edit Patient') }}

        </a>

    </div>

</div>


{{-- Patient Information --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

    {{-- Main Patient Card --}}
    <div class="lg:col-span-2">

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            {{-- Header --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    {{-- Avatar --}}
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-full bg-indigo-100 submitbtn">

                        <span class="text-xl font-bold ">
                            {{ strtoupper(substr($patient->name ?? 'P', 0, 1)) }}
                        </span>

                    </div>

                    <div class="min-w-0">

                        <h2 class="truncate text-xl font-semibold text-slate-900">
                            {{ $patient->name ?? __('custom.N/A') }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __('custom.Patient ID') }} #{{ $patient->id }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Patient Details --}}
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 p-6 sm:grid-cols-2">

                {{-- Full Name --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Full Name') }}
                    </p>

                    <p class="text-sm font-semibold text-slate-900">
                        {{ $patient->name ?? __('custom.N/A') }}
                    </p>
                </div>


                {{-- Phone --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Phone') }}
                    </p>

                    <p class="text-sm text-slate-900">
                        {{ $patient->phone ?? __('custom.N/A') }}
                    </p>
                </div>


                {{-- Email --}}
                {{-- <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Email') }}
                    </p>

                    <p class="break-all text-sm text-slate-900">
                        {{ $patient->email ?? __('custom.N/A') }}
                    </p>
                </div> --}}


                {{-- Gender --}}
                {{-- <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Gender') }}
                    </p>

                    <p class="text-sm text-slate-900">
                        {{ $patient->gender ? ucfirst($patient->gender) : __('custom.N/A') }}
                    </p>
                </div> --}}


                {{-- Date of Birth --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Age') }}
                    </p>

                    <p class="text-sm text-slate-900">
                        @if($patient->date_of_birth)
                            {{ $patient->age }}
                        @else
                            {{ __('custom.N/A') }}
                        @endif
                    </p>
                </div>


                {{-- Address --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Address') }}
                    </p>

                    <p class="text-sm text-slate-900">
                        {{ $patient->address ?? __('custom.N/A') }}
                    </p>
                </div>


                {{-- Created At --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Registered At') }}
                    </p>

                    <p class="text-sm text-slate-700">
                        {{ $patient->created_at?->format('M d, Y h:i A') ?? __('custom.N/A') }}
                    </p>
                </div>


                {{-- Updated At --}}
                <div>
                    <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                        {{ __('custom.Last Updated') }}
                    </p>

                    <p class="text-sm text-slate-700">
                        {{ $patient->updated_at?->format('M d, Y h:i A') ?? __('custom.N/A') }}
                    </p>
                </div>

            </div>

        </div>


        {{-- Prescriptions --}}
        <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            {{-- Prescription Header --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">
                            {{ __('custom.Prescriptions') }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __('custom.Prescription history for this patient.') }}
                        </p>
                    </div>

                    <span class="inline-flex w-fit items-center rounded-full bg-indigo-50
                                 px-3 py-1 text-xs font-semibold submitbtn">
                        {{ $patient->prescriptions->count() }}
                        {{ __('custom.Prescriptions') }}
                    </span>

                </div>

            </div>


            {{-- Prescription List --}}
            @if($patient->prescriptions->count())

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-3 text-start text-xs font-semibold
                                           uppercase tracking-wide text-slate-500">
                                    #
                                </th>

                                <th class="px-6 py-3 text-start text-xs font-semibold
                                           uppercase tracking-wide text-slate-500">
                                    {{ __('custom.Prescription') }}
                                </th>

                                <th class="px-6 py-3 text-start text-xs font-semibold
                                           uppercase tracking-wide text-slate-500">
                                    {{ __('custom.Date') }}
                                </th>

                                <th class="px-6 py-3 text-start text-xs font-semibold
                                           uppercase tracking-wide text-slate-500">
                                    {{ __('custom.Status') }}
                                </th>

                                <th class="px-6 py-3 text-end text-xs font-semibold
                                           uppercase tracking-wide text-slate-500">
                                    {{ __('custom.Actions') }}
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach($patient->prescriptions as $index => $prescription)

                                <tr class="transition hover:bg-slate-50">

                                    {{-- Number --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                        {{ $index + 1 }}
                                    </td>


                                    {{-- Prescription Name --}}
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <div class="font-medium text-slate-900">
                                            {{ $prescription->prescription_name }}
                                        </div>

                                        <div class="mt-1 text-xs text-slate-500">
                                            #{{ $prescription->id }}
                                        </div>

                                    </td>


                                    {{-- Date --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">

                                        {{ $prescription->prescription_date?->format('M d, Y') ?? __('custom.N/A') }}

                                    </td>


                                    {{-- Status --}}
                                    <td class="whitespace-nowrap px-6 py-4">

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

                                    </td>


                                    {{-- Actions --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-end">

                                        <a href="{{ route('prescriptions.show', $prescription) }}"
                                           class="inline-flex items-center gap-1.5 rounded-lg border
                                                  border-slate-300 bg-white px-3 py-2 text-xs
                                                  font-medium text-slate-700 transition
                                                  hover:bg-slate-50">

                                            <svg class="h-4 w-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M15 12a3 3 0
                                                         11-6 0 3 3 0
                                                         016 0z"/>

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M2.458 12C3.732
                                                         7.943 7.523 5
                                                         12 5c4.478 0
                                                         8.268 2.943
                                                         9.542 7-1.274
                                                         4.057-5.064 7
                                                         -9.542 7-4.477
                                                         0-8.268-2.943
                                                         -9.542-7z"/>

                                            </svg>

                                            {{ __('custom.View') }}

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- Empty State --}}
                <div class="px-6 py-12 text-center">

                    <div class="mx-auto flex h-12 w-12 items-center justify-center
                                rounded-full bg-slate-100">

                        <svg class="h-6 w-6 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12h6m-6 4h6m2
                                     5H7a2 2 0 01-2-2V5a2
                                     2 0 012-2h6.586a1 1
                                     0 01.707.293l3.414
                                     3.414a1 1 0 01.293.707V19a2
                                     2 0 01-2 2z"/>

                        </svg>

                    </div>

                    <h3 class="mt-3 text-sm font-semibold text-slate-900">
                        {{ __('custom.No prescriptions') }}
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ __('custom.This patient has no prescriptions yet.') }}
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- Right Sidebar --}}
    <div class="space-y-6">

        {{-- Patient Summary --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-semibold text-slate-900">
                    {{ __('custom.Patient Summary') }}
                </h2>

            </div>

            <div class="space-y-5 p-6">

                {{-- Total Prescriptions --}}
                <div class="flex items-center justify-between">

                    <span class="text-sm text-slate-500">
                        {{ __('custom.Prescriptions') }}
                    </span>

                    <span class="text-sm font-semibold text-slate-900">
                        {{ $patient->prescriptions->count() }}
                    </span>

                </div>


                {{-- Active --}}
                <div class="flex items-center justify-between">

                    <span class="text-sm text-slate-500">
                        {{ __('custom.Active') }}
                    </span>

                    <span class="text-sm font-semibold text-emerald-600">
                        {{ $patient->prescriptions->where('status', 'active')->count() }}
                    </span>

                </div>


                {{-- Completed --}}
                <div class="flex items-center justify-between">

                    <span class="text-sm text-slate-500">
                        {{ __('custom.Completed') }}
                    </span>

                    <span class="text-sm font-semibold text-blue-600">
                        {{ $patient->prescriptions->where('status', 'completed')->count() }}
                    </span>

                </div>


                {{-- Cancelled --}}
                <div class="flex items-center justify-between">

                    <span class="text-sm text-slate-500">
                        {{ __('custom.Cancelled') }}
                    </span>

                    <span class="text-sm font-semibold text-red-600">
                        {{ $patient->prescriptions->where('status', 'cancelled')->count() }}
                    </span>

                </div>

            </div>

        </div>


        {{-- Contact Information --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-semibold text-slate-900">
                    {{ __('custom.Contact Information') }}
                </h2>

            </div>

            <div class="space-y-5 p-6">

                {{-- Phone --}}
                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center
                                rounded-lg bg-indigo-50 submitbtn">

                        <svg class="h-4 w-4 "
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1
                                     1 0 01.948.684l1.498
                                     4.493a1 1 0 01-.502
                                     1.21l-2.257 1.13a11.042
                                     11.042 0 005.516 5.516l1.13-2.257a1
                                     1 0 011.21-.502l4.493
                                     1.498A1 1 0 0121
                                     15.72V19a2 2 0 01-2
                                     2h-1C9.716 21 3
                                     14.284 3 6V5z"/>

                        </svg>

                    </div>

                    <div class="min-w-0">

                        <p class="text-xs font-medium text-slate-500">
                            {{ __('custom.Phone') }}
                        </p>

                        <p class="mt-1 break-all text-sm font-medium text-slate-900">
                            {{ $patient->phone ?? __('custom.N/A') }}
                        </p>

                    </div>

                </div>


                {{-- Email --}}
                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center
                                rounded-lg bg-indigo-50 submitbtn">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2
                                     0 002.22 0L21 8M5 19h14a2
                                     2 0 002-2V7a2 2 0
                                     00-2-2H5a2 2 0
                                     00-2 2v10a2 2 0
                                     002 2z"/>

                        </svg>

                    </div>

                    <div class="min-w-0">

                        <p class="text-xs font-medium text-slate-500">
                            {{ __('custom.Email') }}
                        </p>

                        <p class="mt-1 break-all text-sm font-medium text-slate-900">
                            {{ $patient->email ?? __('custom.N/A') }}
                        </p>

                    </div>

                </div>


                {{-- Address --}}
                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center
                                rounded-lg bg-indigo-50 submitbtn">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17.657 16.657L13.414
                                     20.9a1.998 1.998 0
                                     01-2.827 0l-4.244-4.243a8
                                     8 0 1111.314 0z"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 11a3 3 0
                                     11-6 0 3 3 0 016 0z"/>

                        </svg>

                    </div>

                    <div class="min-w-0">

                        <p class="text-xs font-medium text-slate-500">
                            {{ __('custom.Address') }}
                        </p>

                        <p class="mt-1 text-sm font-medium text-slate-900">
                            {{ $patient->address ?? __('custom.N/A') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


</div>

@endsection
