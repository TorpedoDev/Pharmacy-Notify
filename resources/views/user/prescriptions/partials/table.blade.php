<div class="overflow-x-auto">

    <table class="w-full text-left text-sm text-slate-600">

        <thead class="bg-slate-50 text-xs uppercase text-slate-500">

            <tr>

                <th class="px-6 py-4 font-semibold">
                    {{ __("custom.Prescription") }}
                </th>

                <th class="px-6 py-4 font-semibold">
                    {{ __("custom.Patient") }}
                </th>

                <th class="px-6 py-4 font-semibold">
                    {{ __("custom.Date") }}
                </th>

                <th class="px-6 py-4 font-semibold">
                    {{ __("custom.Items") }}
                </th>

                <th class="px-6 py-4 font-semibold">
                    {{ __("custom.Status") }}
                </th>

                <th class="px-6 py-4 text-right font-semibold">
                    {{ __("custom.Actions") }}
                </th>

            </tr>

        </thead>

        <tbody class="divide-y divide-slate-100">

            @forelse($prescriptions as $prescription)

                <tr class="transition hover:bg-slate-50">

                    <td class="whitespace-nowrap px-6 py-4">

                        <div>
                            <p class="font-semibold text-slate-900">
                                {{ $prescription->prescription_name }}
                            </p>

                            <p class="text-xs text-slate-400">
                                #{{ $prescription->id }}
                            </p>
                        </div>

                    </td>

                    <td class="whitespace-nowrap px-6 py-4">

                        <a href="{{ route('patients.show', $prescription->patient_id) }}"
                           class="font-medium text-slate-800 transition
                                  hover:text-[#146356]">

                            {{ $prescription->patient->name }}

                        </a>

                    </td>

                    <td class="whitespace-nowrap px-6 py-4">

                        {{ $prescription->prescription_date?->format('Y-m-d H:i') }}

                    </td>

                    <td class="px-6 py-4">

                        <span class="inline-flex items-center rounded-full
                                     bg-slate-100 px-2.5 py-1 text-xs
                                     font-semibold text-slate-700">

                            {{ $prescription->items_count }}

                            {{ __("custom.Items") }}

                        </span>

                    </td>

                    <td class="whitespace-nowrap px-6 py-4">

                        @php
                            $statusClasses = [
                                'pending' =>
                                    'bg-amber-100 text-amber-700',

                                'partially_dispensed' =>
                                    'bg-blue-100 text-blue-700',

                                'fully_dispensed' =>
                                    'bg-emerald-100 text-emerald-700',

                                'cancelled' =>
                                    'bg-red-100 text-red-700',
                            ];
                        @endphp

                        <span class="inline-flex rounded-full px-3 py-1
                                     text-xs font-semibold
                                     {{ $statusClasses[$prescription->status] ?? 'bg-slate-100 text-slate-700' }}">

                            {{ __("custom." . ucfirst(str_replace('_', ' ', $prescription->status))) }}

                        </span>

                    </td>

                    <td class="whitespace-nowrap px-6 py-4">

                        <div class="flex items-center justify-end gap-2">

                            <a href="{{ route('prescriptions.show', $prescription) }}"
                               class="rounded-lg p-2 text-slate-500 transition
                                      hover:bg-slate-100 hover:text-indigo-600"
                               title="{{ __("custom.View") }}">

                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M2.458 12C3.732 7.943
                                             7.523 5 12 5c4.478 0
                                             8.268 2.943 9.542 7
                                             -1.274 4.057-5.064
                                             7-9.542 7-4.477
                                             0-8.268-2.943-9.542-7z"/>

                                </svg>

                            </a>

                            <a href="{{ route('prescriptions.edit', $prescription) }}"
                               class="rounded-lg p-2 text-slate-500 transition
                                      hover:bg-slate-100 hover:text-[#146356]"
                               title="{{ __("custom.Edit") }}">

                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11
                                             a2 2 0 002 2h11a2 2 0
                                             002-2v-5"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M18.5 2.5a2.121
                                             2.121 0 013 3L12 15l-4
                                             1 1-4 9.5-9.5z"/>

                                </svg>

                            </a>

                            @if($prescription->status !== 'fully_dispensed'
                                && $prescription->status !== 'cancelled')

                                <a href="{{ route('dispensations.create', ['prescription' => $prescription->id]) }}"
                                   class="rounded-lg p-2 text-slate-500 transition
                                          hover:bg-emerald-50 hover:text-emerald-600"
                                   title="{{ __("custom.Dispense") }}">

                                    <svg class="h-5 w-5" fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M20 7l-8-4-8 4m16 0
                                                 l-8 4m8-4v10l-8 4
                                                 m0-10L4 7m8 4v10M4
                                                 7v10l8 4"/>

                                    </svg>

                                </a>

                            @endif

                            <button
                                type="button"
                                class="delete-btn rounded-lg p-2
                                       text-slate-500 transition
                                       hover:bg-red-50 hover:text-red-600"
                                data-url="{{ route('prescriptions.destroy', $prescription) }}"
                                data-name="{{ $prescription->prescription_name }}"
                                title="{{ __("custom.Delete") }}">

                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 7l-.867 12.142
                                             A2 2 0 0116.138 21H7.862
                                             a2 2 0 01-1.995-1.858L5
                                             7m5 4v6m4-6v6M9 7V4a1
                                             1 0 011-1h4a1 1 0
                                             011 1v3m-9 0h14"/>

                                </svg>

                            </button>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="px-6 py-12 text-center">

                        <div class="flex flex-col items-center">

                            <div class="mb-3 flex h-12 w-12 items-center
                                        justify-center rounded-full bg-slate-100">

                                <svg class="h-6 w-6 text-slate-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 12h6m-6 4h6m2
                                             5H7a2 2 0 01-2-2V5a2
                                             2 0 012-2h5.586a1 1
                                             0 01.707.293l5.414
                                             5.414a1 1 0 01.293.707
                                             V19a2 2 0 01-2 2z"/>

                                </svg>

                            </div>

                            <p class="font-semibold text-slate-700">
                                {{ __("custom.No prescriptions found") }}
                            </p>

                            <p class="mt-1 text-sm text-slate-400">
                                {{ __("custom.Get started by creating your first prescription.") }}
                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@if($prescriptions->hasPages())

    <div class="border-t border-slate-200 px-6 py-4">

        {{ $prescriptions->links() }}

    </div>

@endif

