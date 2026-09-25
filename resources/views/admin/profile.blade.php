@extends("admin.layout.admin")
@section("title" , __("custom.Account Settings"))
@section("content")
<div class="min-h-full">

    {{-- Breadcrumb --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="text-slate-500 transition hover:text-slate-800">
                {{ __("custom.Dashboard") }}
            </a>

            <svg class="h-4 w-4 text-slate-300"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1.7">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m9 5 7 7-7 7"/>
            </svg>

            <span class="font-medium text-slate-800">
                {{ __("custom.Profile") }}
            </span>
        </div>

        <h1 class="mt-3 text-2xl font-semibold tracking-tight text-slate-900">
            {{ __("custom.My Profile") }}
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            {{ __("custom.Manage your personal information and account settings.") }}
        </p>
    </div>


    {{-- Profile Header --}}
    <div class="mb-6 overflow-hidden rounded-2xl
                border border-[#DCD5C2]
                bg-white shadow-sm">

        {{-- Decorative header --}}
        <div class="relative h-28 overflow-hidden"
             style="background:
                    linear-gradient(
                        135deg,
                        var(--ink) 0%,
                        #263D3B 65%,
                        #315A54 100%
                    );">

            <div class="absolute -right-10 -top-20
                        h-52 w-52 rounded-full
                        bg-[#F0A93B]/10">
            </div>

            <div class="absolute right-20 -bottom-24
                        h-48 w-48 rounded-full
                        bg-white/5">
            </div>

        </div>


        <div class="px-6 pb-6 mt-12">

            <div class="-mt-10 flex flex-col gap-5
                        sm:flex-row sm:items-end
                        sm:justify-between">

                {{-- User --}}
                <div class="flex items-end gap-4">

                    {{-- Avatar --}}
                    <div class="flex h-20 w-20 shrink-0
                                items-center justify-center
                                rounded-2xl
                                border-4 border-white
                                bg-[var(--teal)]
                                text-2xl font-semibold
                                text-[#F5F2E8]
                                shadow-lg">

                                  @php
    $initials = collect(explode(' ', trim(auth("admin")->user()->name)))
        ->filter()
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->join('');
@endphp
                        {{ $initials }}

                    </div>

                    <div class="pb-1">

                        <h2 class="text-xl font-semibold text-slate-900">
                            {{ auth("admin")->user()->name }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __("custom.Adminstrator") }}
                        </p>

                    </div>

                </div>


                {{-- Status --}}
                <div class="pb-1">

                    <span class="inline-flex items-center gap-2
                                 rounded-full
                                 border border-emerald-200
                                 bg-emerald-50
                                 px-3 py-1.5
                                 text-xs font-medium
                                 text-emerald-700">

                        <span class="h-1.5 w-1.5 rounded-full
                                     bg-emerald-500">
                        </span>

                        {{ __("custom.Active") }}

                    </span>

                </div>

            </div>

        </div>
    </div>


    {{-- Main --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">


        {{-- Personal Information --}}
        <div class="xl:col-span-2">

            <div class="rounded-2xl border border-[#DCD5C2]
                        bg-white shadow-sm">

                {{-- Header --}}
                <div class="border-b border-[#E6E0CF] px-6 py-5">

                    <h2 class="font-semibold text-slate-900">
                        {{ __("custom.Personal Information") }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ __("custom.Update your personal information and contact details.") }}
                    </p>

                </div>


                {{-- Form --}}
                <form action="{{ route('admin.profile.updateinfo') }}"
                      method="POST"
                      class="p-6">

                    @csrf
                    @method('PUT')


                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                        {{-- Name --}}
                        <div>
                            <label for="name"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.Name") }}
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', auth('admin')->user()->name) }}"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       placeholder:text-slate-400
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >

                            @error('name')
                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Email --}}
                        <div>
                            <label for="email"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.Email Address") }}
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', auth('admin')->user()->email) }}"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >

                            @error('email')
                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Phone --}}
                        {{-- <div>
                            <label for="phone"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', auth('admin')->user()->phone ?? '') }}"
                                placeholder="+20 100 000 0000"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       placeholder:text-slate-400
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >
                            
                        </div> --}}


                        {{-- Role --}}
                        <div>
                            <label for="role"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.Role") }}
                            </label>

                            <input
                                type="text"
                                value="{{ __("custom.Adminstrator") }}"
                                disabled
                                class="w-full cursor-not-allowed
                                       rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#F1EDE1]
                                       px-4 py-3
                                       text-sm text-slate-500"
                            >
                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="mt-8 flex items-center justify-end
                                gap-3 border-t border-[#E6E0CF]
                                pt-5">

                        <a href="{{ route('admin.dashboard') }}"
                           class="rounded-xl border
                                  border-[#D8D1BD]
                                  px-5 py-2.5
                                  text-sm font-medium
                                  text-slate-600
                                  transition
                                  hover:bg-[#F5F2E8]">
                            {{ __("custom.Cancel") }}
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center gap-2
                                   rounded-xl
                                   bg-[var(--teal)]
                                   px-5 py-2.5
                                   text-sm font-medium
                                   text-white
                                   shadow-sm
                                   transition
                                   hover:brightness-110
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-[var(--teal)]/20">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 12.5 9.5 17 19 7.5"/>
                            </svg>

                            {{ __("custom.Save Changes") }}

                        </button>

                    </div>

                </form>

                <hr>
                <div class="border-b border-[#E6E0CF] px-6 py-5">

                    <h2 class="font-semibold text-slate-900">
                        {{ __("custom.Change Password") }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ __("custom.Enter new password to change it.") }}
                    </p>

                </div>

                <form action="{{ route('admin.profile.updatepass') }}"
                      method="POST"
                      class="p-6">

                    @csrf
                    @method('PUT')

                     <div class="relative">
                            <label for="current_password"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.Current Password") }}
                            </label>

                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       placeholder:text-slate-400
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >
                         <button type="button" onclick="togglePassword('current_password', this)" class="absolute right-3 top-1/2 -translate-y-1/2  text-slate-400 transition hover:text-slate-600 mt-2" > <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" > <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6z" /> <circle cx="12" cy="12" r="2.5" /> </svg> </button>
                              @error("current_password")
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-2">
                            
                     <div class="relative">
                            <label for="new_password"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.New Password") }}
                            </label>

                            <input
                                type="password"
                                id="new_password"
                                name="new_password"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       placeholder:text-slate-400
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >
                   <button type="button" onclick="togglePassword('new_password', this)" class="absolute right-3 top-1/2 -translate-y-1/2  text-slate-400 transition hover:text-slate-600 mt-4" > <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" > <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6z" /> <circle cx="12" cy="12" r="2.5" /> </svg> </button>

                            @error("new_password")
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        
                     <div class="relative">
                            <label for="new_password_confirmation"
                                   class="mb-2 block text-sm
                                          font-medium text-slate-700">
                                {{ __("custom.Confirm New Password") }}
                            </label>

                            <input
                                type="password"
                                id="new_password_confirmation"
                                name="new_password_confirmation"
                                class="w-full rounded-xl
                                       border border-[#D8D1BD]
                                       bg-[#FDFCF8]
                                       px-4 py-3
                                       text-sm text-slate-900
                                       outline-none
                                       transition
                                       placeholder:text-slate-400
                                       focus:border-[var(--teal)]
                                       focus:ring-4
                                       focus:ring-[var(--teal)]/10"
                            >
                            <button type="button" onclick="togglePassword('new_password_confirmation', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 transition hover:text-slate-600 mt-4" > <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" > <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6z" /> <circle cx="12" cy="12" r="2.5" /> </svg> </button>
                        </div>

                        </div>

                        <div class="mt-8 flex items-center justify-end
                                gap-3 border-t border-[#E6E0CF]
                                pt-5">

                        <a href="{{ route('admin.dashboard') }}"
                           class="rounded-xl border
                                  border-[#D8D1BD]
                                  px-5 py-2.5
                                  text-sm font-medium
                                  text-slate-600
                                  transition
                                  hover:bg-[#F5F2E8]">
                            {{ __("custom.Cancel") }}
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center gap-2
                                   rounded-xl
                                   bg-[var(--teal)]
                                   px-5 py-2.5
                                   text-sm font-medium
                                   text-white
                                   shadow-sm
                                   transition
                                   hover:brightness-110
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-[var(--teal)]/20">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 12.5 9.5 17 19 7.5"/>
                            </svg>

                            {{ __("custom.Save Changes") }}

                        </button>

                    </div>

                </form>


                {{-- password form here --}}







                

            </div>
        </div>


        {{-- Right Column --}}
        <div class="space-y-6">


            {{-- Account --}}
            <div class="rounded-2xl border border-[#DCD5C2]
                        bg-white p-6 shadow-sm">

                <h2 class="font-semibold text-slate-900">
                    {{ __("custom.Account") }}
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __("custom.Your account information.") }}
                </p>


                <div class="mt-6 space-y-5">


                    <div>
                        <p class="text-[10px] font-semibold
                                  uppercase tracking-wider
                                  text-slate-400">
                            {{ __("custom.Status") }}
                        </p>

                        <div class="mt-2 flex items-center gap-2">

                            <span class="h-2 w-2 rounded-full
                                         bg-emerald-500">
                            </span>

                            <span class="text-sm font-medium
                                         text-slate-700">
                                {{ __("custom.Active") }}
                            </span>

                        </div>
                    </div>


                    <div>
                        <p class="text-[10px] font-semibold
                                  uppercase tracking-wider
                                  text-slate-400">
                            {{ __("custom.Member Since") }}
                        </p>

                        <p class="mt-2 text-sm font-medium text-slate-700">
                            {{ auth('admin')->user()->created_at?->format('M d, Y') }}
                        </p>
                    </div>


                    <div>
                        <p class="text-[10px] font-semibold
                                  uppercase tracking-wider
                                  text-slate-400">
                            {{ __("custom.Last Updated") }}
                        </p>

                        <p class="mt-2 text-sm font-medium text-slate-700">
                            {{ auth('admin')->user()->updated_at?->format('M d, Y') }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Security --}}
            {{-- <div class="rounded-2xl border border-[#DCD5C2]
                        bg-white p-6 shadow-sm">

                <div class="flex gap-4">

                    <div class="flex h-10 w-10 shrink-0
                                items-center justify-center
                                rounded-xl
                                bg-[#F0A93B]/10
                                text-[#D48C20]">

                        <svg class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.7">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/>

                        </svg>

                    </div>


                    <div>

                        <h3 class="text-sm font-semibold text-slate-900">
                            Security
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            Keep your account secure by regularly
                            updating your password.
                        </p>

                        <a href="#"
                           class="mt-4 inline-flex text-xs
                                  font-semibold
                                  text-[var(--teal)]
                                  transition
                                  hover:underline">
                            Change password →
                        </a>

                    </div>

                </div>

            </div> --}}


            <!-- Change Password -->

{{-- <div class="mt-6 rounded-2xl border border-[#DCD5C2] bg-white shadow-sm">

```
<!-- Header -->
<div class="border-b border-[#E6E0CF] px-6 py-5">

    <div class="flex items-start gap-4">

        <!-- Icon -->
        <div class="flex h-11 w-11 shrink-0 items-center justify-center
                    rounded-xl bg-[#F0A93B]/10 text-[#D48C20]">

            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.7"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.5 10.5V7a4.5 4.5 0 0 0-9 0v3.5"
                />

                <rect
                    x="4.5"
                    y="10.5"
                    width="15"
                    height="10"
                    rx="2"
                />

                <circle
                    cx="12"
                    cy="15.5"
                    r="1"
                />
            </svg>

        </div>

        <div>
            <h2 class="font-semibold text-slate-900">
                Change Password
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Update your password to keep your account secure.
            </p>
        </div>

    </div>

</div>


<!-- Form -->
<form action=""
{{-- {{ route('admin.password.update') }} --}}
      {{-- method="POST"
      class="p-6">

    @csrf
    @method('PUT') --}}







        </div>

    </div>

</div>
@endsection

@push("scripts")
    <script>
    function togglePassword(id, button) {
        const input = document.getElementById(id);

        input.type = input.type === 'password'
            ? 'text'
            : 'password';
    }
</script>
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

@endpush