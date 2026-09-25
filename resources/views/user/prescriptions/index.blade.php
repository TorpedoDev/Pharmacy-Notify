@extends("user.layout.user")

@section("title", __("custom.All Prescriptions"))

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

            <li class="font-semibold text-slate-800">
                {{ __("custom.Prescriptions") }}
            </li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                {{ __("custom.Prescriptions") }}
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                {{ __("custom.Manage patient prescriptions and medications.") }}
            </p>
        </div>

        <a href="{{ route('prescriptions.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg
                  bg-[#146356] px-5 py-2.5 text-sm font-semibold text-white
                  shadow-sm transition hover:bg-[#1C8272]
                  focus:outline-none focus:ring-4 focus:ring-indigo-200
                  active:scale-[0.98]">

            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>

            {{ __("custom.Create Prescription") }}
        </a>
    </div>

    {{-- Main Card --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200
                bg-white shadow-sm">

        {{-- Search --}}
        <div class="border-b border-slate-200 px-6 py-4">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

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
                        placeholder="{{ __("custom.Search prescriptions or patients...") }}"
                        class="w-full rounded-lg border border-slate-300 bg-white
                               py-2.5 pl-10 pr-4 text-sm text-slate-900
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-[#146356]
                               focus:ring-4 focus:ring-indigo-100"
                    >
                </div>

            </div>
        </div>

        {{-- Loading --}}
        <div id="loading"
             class="hidden px-6 py-3 text-sm text-indigo-600">
            {{ __("custom.Loading...") }}
        </div>

        {{-- Table --}}
        <div id="prescriptions-table">
            @include('user.prescriptions.partials.table')
        </div>

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

    function loadPrescriptions(url = "{{ route('prescriptions.index') }}") {

        let search = $('#search').val();

        $('#loading').removeClass('hidden');

        $.ajax({
            url: url,
            type: 'GET',

            data: {
                search: search
            },

            success: function (response) {
                $('#prescriptions-table').html(response);
            },

            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: '{{ __("custom.Error!") }}',
                    text: '{{ __("custom.Something went wrong.") }}',
                    confirmButtonColor: '#146356'
                });
            },

            complete: function () {
                $('#loading').addClass('hidden');
            }
        });
    }

    $('#search').on('keyup', function () {

        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            loadPrescriptions();
        }, 400);

    });

    $(document).on(
        'click',
        '#prescriptions-table .pagination a',
        function (e) {

            e.preventDefault();

            let url = $(this).attr('href');

            loadPrescriptions(url);
        }
    );

});
</script>

<script>

$(document).on('click', '.delete-btn', function () {

    let url = $(this).data('url');
    let name = $(this).data('name');

    Swal.fire({

        title: '{{ __("custom.Delete Prescription?") }}',

        html: `
            {{ __("custom.Are you sure you want to delete") }}
            <strong>${name}</strong>?
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

        $.ajax({

            url: url,

            type: 'DELETE',

            headers: {
                'X-CSRF-TOKEN':
                    $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                Swal.fire({

                    icon: 'success',

                    title: '{{ __("custom.Deleted!") }}',

                    text: response.message ??
                        '{{ __("custom.Prescription deleted successfully.") }}',

                    confirmButtonColor: '#146356',

                    confirmButtonText: '{{ __("custom.OK") }}',

                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-lg px-5 py-2.5'
                    }

                }).then(() => {

                    loadPrescriptions();

                });

            },

            error: function (xhr) {

                Swal.fire({

                    icon: 'error',

                    title: '{{ __("custom.Error!") }}',

                    text: xhr.responseJSON?.message ??
                        '{{ __("custom.Something went wrong.") }}',

                    confirmButtonColor: '#146356'

                });

            }

        });

    });

});

</script>

@endpush



