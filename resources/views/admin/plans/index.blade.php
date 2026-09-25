@extends("admin.layout.admin")
@section("title" , __("custom.All Plans"))
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

                <li class="font-semibold text-slate-800">
                    {{ __("custom.Plans") }}
                </li>

            </ol>
        </nav>


        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    {{ __("custom.Plans") }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Manage all plans in your system.") }}
                </p>
            </div>

            {{-- Add Button --}}
            <a href="{{ route('admin.plans.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg
                      bg-[#146356]
                      px-5 py-2.5 text-sm font-semibold text-white
                      shadow-sm transition
                      hover:bg-[#1C8272]
                      focus:outline-none focus:ring-4 focus:ring-indigo-200
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

                {{ __("custom.Add New Plan") }}
            </a>

        </div>


        {{-- Main Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200
                    bg-white shadow-sm">


            {{-- Search / Filters --}}
            <div class="border-b border-slate-200 px-6 py-4">

                <div class="flex flex-col gap-3 md:flex-row md:items-center
                            md:justify-between">

                    {{-- Search --}}
                    <div class="relative w-full md:max-w-sm">

                        <div class="pointer-events-none absolute inset-y-0 left-0
                                    flex items-center pl-3">

                            <svg class="h-5 w-5 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0
                                         8 8 0 0 1 16 0z"/>
                            </svg>

                        </div>

                        <input
                        id="search"
                        name="search"
                            type="text"
                            placeholder="{{ __("custom.Search plans...") }}"
                            class="w-full rounded-lg border border-slate-300 bg-white
                                   py-2.5 pl-10 pr-4 text-sm text-slate-900
                                   outline-none transition
                                   placeholder:text-slate-400
                                   focus:border-[#146356]
                                   focus:ring-4 focus:ring-indigo-100"
                        >

                    </div>


                    {{-- Filter type--}}
                    <div class="flex gap-2">

                        <select
                            id="period_filter"
                            name="period_type"
                            class="rounded-lg border border-slate-300 bg-white px-4 py-2.5
                                   text-sm text-slate-700 outline-none transition
                                   focus:[#1C8272]
                                   focus:ring-4 focus:ring-[#146356]">

                            <option value="">{{ __("custom.All Types") }}</option>
                              @foreach ($periodTypes as $type)
                                  <option value="{{ $type->value }}">{{ __("custom." . $type->name) }}</option>
                              @endforeach
                            
                           
                        </select>

                    </div>

                                        {{-- Filter status--}}
                    <div class="flex gap-2">

                        <select
                        id="status_filter"
                           name="is_active"
                            class="rounded-lg border border-slate-300 bg-white px-4 py-2.5
                                   text-sm text-slate-700 outline-none transition
                                   focus:[#1C8272]
                                   focus:ring-4 focus:ring-[#146356]">

                            <option value="">{{ __("custom.All Status") }}</option>
                            <option value="1">{{ __("custom.Active") }}</option>
                            <option value="0">{{ __("custom.Inactive") }}</option>

                        </select>

                    </div>

                </div>

            </div>


             {{-- Loading indicator --}}
            <div id="loading"
                 class="hidden px-6 py-3 text-sm text-indigo-600">
                {{ __("custom.Loading...") }}
            </div>

            <div id="plans-table">
                @include('admin.plans.partials.table')
            </div>

            {{-- Table --}}
           
        </div>



@endsection

@push("scripts")


@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ __("custom.Success!") }}',
            text: @json(session('success')),

            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: true,

            customClass: {
                popup: 'rounded-2xl shadow-2xl',
                title: 'text-xl font-bold text-slate-800',
                htmlContainer: 'text-sm text-slate-500'
            }
        });
    </script>
@endif


   <script>
$(document).ready(function () {

    let searchTimeout;

    function loadPlans(url = "{{ route('admin.plans.index') }}") {

        let search = $('#search').val();
        let periodType = $('#period_filter').val();
        let isActive = $('#status_filter').val();

        $('#loading').removeClass('hidden');

        $.ajax({

            url: url,

            type: 'GET',

            data: {
                search: search,
                period_type: periodType,
                is_active: isActive
            },

            success: function (response) {

                $('#plans-table').html(response);

            },

            error: function () {

                alert('{{ __("custom.Something went wrong.") }}');

            },

            complete: function () {

                $('#loading').addClass('hidden');

            }

        });
    }


    // Search while typing
    $('#search').on('keyup', function () {

        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {

            loadPlans();

        }, 400);

    });


    // Period filter
    $('#period_filter').on('change', function () {

        loadPlans();

    });


    // Status filter
    $('#status_filter').on('change', function () {

        loadPlans();

    });


    // AJAX pagination
    $(document).on('click', '#plans-table .pagination a', function (e) {

        e.preventDefault();

        let url = $(this).attr('href');

        loadPlans(url);

    });

});
</script>

<script>
    $(document).on('click', '.delete-btn', function () {

    let url = $(this).data('url');
    let name = $(this).data('name');

    Swal.fire({
        title: '{{ __("custom.Delete Plan?") }}',
        html: `
            {{ __("custom.Are you sure you want to delete") }}
            <strong>${name}</strong> {{ __("custom.?") }}
            
            <br>
            <span style="color:#ef4444">
                {{ __("custom.This action cannot be undone.") }}
            </span>
        `,
        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: '{{ __("custom.Yes, Delete") }}',
        cancelButtonText: '{{ __("custom.Cancel") }}',

        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#64748b',

        reverseButtons: true,

        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-lg px-5 py-2.5',
            cancelButton: 'rounded-lg px-5 py-2.5'
        }
    }).then((result) => {

        if (!result.isConfirmed) {
            return;
        }

        // Show loading
        Swal.fire({
            title: '{{ __("custom.Deleting...") }}',
            text: '{{ __("custom.Please wait") }}',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: false,

            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: url,
            type: 'DELETE',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                Swal.fire({
                    icon: 'success',
                    title: '{{ __("custom.Deleted!") }}',
                    text: response.message ?? '{{ __("custom.Plan deleted successfully.") }}',
                    confirmButtonColor: '#146356',
                    confirmButtonText: '{{ __("custom.OK") }}',
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-lg px-5 py-2.5'
                    }
                });

                    window.location.reload();

                // Reload table
                // loadPlans();
            },

            error: function (xhr) {

                Swal.fire({
                    icon: 'error',
                    title: '{{ __("custom.Error!") }}',
                    text: xhr.responseJSON?.message ??
                          '{{ __("custom.Something went wrong.") }}',
                    confirmButtonColor: '#146356',
                    confirmButtonText: '{{ __("custom.OK") }}'
                });

            }
        });
    });
});
</script>
@endpush