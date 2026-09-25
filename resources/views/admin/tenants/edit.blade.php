@extends('admin.layout.admin')
@section("title" , __("custom.Edit Tenant"))
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
                    <a href="{{ route('admin.tenants.index') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        {{ __("custom.Tenants") }}
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li class="font-semibold text-slate-800">
                    {{ __("custom.Edit Tenant") }}
                </li>
            </ol>
        </nav>


        {{-- Page Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    {{ __("custom.Edit Tenant") }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Edit tenant in your system.") }}
                </p>
            </div>

            <a href="{{ route('admin.tenants.index') }}"
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
                    {{ __("custom.Tenant Information") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Update the information below to edit the tenant.") }}
                </p>
            </div>


            {{-- Form --}}
            <form method="POST" action="{{ route('admin.tenants.update' , $tenant) }}" enctype="multipart/form-data">
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
                                value="{{ $tenant->name }}"
                                placeholder="{{ __("custom.Enter tenant name") }}"
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



                         <div>
                            <label for="phone"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Phone") }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ $tenant->phone }}"
                                placeholder="01xxxxxxxxx"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('phone') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            >

                            @error('phone')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label for="logo"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Logo") }}
                            </label>

                            <input
                                type="file"
                                id="logo"
                                name="logo"
                                accept="image/jpeg,image/png,image/jpg"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('logo') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            >

                            @error('logo')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>



                        <div id="logoPreviewContainer" class="mt-4 {{ $tenant->logo ? '' : 'hidden' }}">
    <p class="mb-2 text-sm font-medium text-slate-600">
        {{ __("custom.Preview") }}
    </p>

    <div class="relative inline-block">

        <img
            id="logoPreview"
            src="{{ $tenant->logo ? Storage::url($tenant->logo) : '' }}"
            alt="Logo Preview"
            class="h-32 w-32 rounded-xl border border-slate-200
                   object-cover shadow-sm"
        >

        <button
            type="button"
            id="removeLogo"
            class="absolute -right-2 -top-2 flex h-7 w-7
                   items-center justify-center rounded-full
                   bg-red-600 text-white shadow-md
                   transition hover:bg-red-700"
        >
            ×
        </button>

    </div>
</div>

                        
                         <div>
                            <label for="commercial_number"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                {{ __("custom.Commercial Number") }}
                            </label>

                            <input
                                type="text"
                                id="commercial_number"
                                name="commercial_number"
                                value="{{ $tenant->commercial_number }}"
                                placeholder="Enter Commercial Number"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('commercial_number') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror"
                            >

                            @error('commercial_number')
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

                    <a href="{{ route('admin.tenants.index') }}"
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

                        {{ __("custom.Edit Tenant") }}
                    </button>

                </div>

            </form>
        </div>




@endsection

@push("scripts")
    <script>
        $(document).ready(function () {

    $('#logo').on('change', function (event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        // Validate image
        if (!file.type.startsWith('image/')) {

            alert('{{ __("custom.Please select a valid image.") }}');

            $(this).val('');

            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {

            // Replace existing logo with new preview
            $('#logoPreview')
                .attr('src', e.target.result);

            $('#logoPreviewContainer')
                .removeClass('hidden');
        };

        reader.readAsDataURL(file);
    });


    $('#removeLogo').on('click', function () {

        // Clear selected file
        $('#logo').val('');

        // Hide preview
        $('#logoPreviewContainer')
            .addClass('hidden');

        $('#logoPreview')
            .attr('src', '');

    });

});
    </script>
@endpush