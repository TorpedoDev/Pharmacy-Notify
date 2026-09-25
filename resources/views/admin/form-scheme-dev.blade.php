{{-- Breadcrumb --}}

<style>
    .color{
        background-color: #146356;
        background-color: #043e34;
    }
</style>

        <nav class="mb-6 flex items-center text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        Dashboard
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li>
                    <a href="{{ route('admin.items.index') }}"
                       class="font-medium text-slate-500 transition hover:text-indigo-600">
                        Items
                    </a>
                </li>

                <li class="text-slate-300">/</li>

                <li class="font-semibold text-slate-800">
                    Create
                </li>
            </ol>
        </nav>


        {{-- Page Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Create New Item
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Add a new item to your system.
                </p>
            </div>

            <a href="{{ route('admin.items.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300
                      bg-white px-4 py-2.5 text-sm font-semibold text-slate-700
                      shadow-sm transition hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>

                Back
            </a>

        </div>


        {{-- Form Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="border-b border-slate-200 bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">
                    Item Information
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Fill in the information below to create the item.
                </p>
            </div>


            {{-- Form --}}
            <form method="POST" action="{{ route('admin.items.store') }}">
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
                                        Please fix the following errors:
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
                                Name
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter item name"
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


                        {{-- Category --}}
                        <div>
                            <label for="category_id"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Category
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="category_id"
                                name="category_id"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100
                                       @error('category_id') border-red-400 @enderror"
                            >
                                <option value="">Select category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Price --}}
                        <div>
                            <label for="price"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Price
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


                        {{-- Quantity --}}
                        <div>
                            <label for="quantity"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Quantity
                            </label>

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                value="{{ old('quantity', 0) }}"
                                placeholder="0"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3
                                       text-sm text-slate-900 outline-none transition
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
                            >

                            @error('quantity')
                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>


                    {{-- Description --}}
                    <div>
                        <label for="description"
                               class="mb-2 block text-sm font-semibold text-slate-700">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Enter a description..."
                            class="w-full resize-none rounded-lg border border-slate-300 bg-white
                                   px-4 py-3 text-sm text-slate-900 outline-none transition
                                   placeholder:text-slate-400
                                   focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                {{-- Footer Buttons --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50
                            px-6 py-4 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.items.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border
                              border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold
                              text-slate-700 shadow-sm transition hover:bg-slate-100">
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg
                               bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white
                               shadow-sm transition
                               hover:bg-indigo-700
                               focus:outline-none focus:ring-4 focus:ring-indigo-200
                               active:scale-[0.98]"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                        Create Item
                    </button>

                </div>

            </form>
        </div>
