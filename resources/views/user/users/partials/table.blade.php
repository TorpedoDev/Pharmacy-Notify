 <div class="overflow-x-auto">

                <table class="w-full text-left text-sm text-slate-600">

                    {{-- Table Head --}}
                    <thead class="bg-slate-50 text-xs uppercase text-slate-500">

                        <tr>

                            <th scope="col"
                                class="px-6 py-4 font-semibold">
                                #
                            </th>

                              <th scope="col"
                                class="px-6 py-4 font-semibold">
                                {{ __("custom.User Name") }}
                            </th>

                             <th scope="col"
                                class="px-6 py-4 font-semibold">
                                {{ __("custom.Email") }}
                            </th>

                            <th scope="col"
                                class="px-6 py-4 font-semibold">
                                {{ __("custom.Tenant Name") }}
                            </th>

                            <th scope="col"
                                class="px-6 py-4 text-right font-semibold">
                                {{ __("custom.Actions") }}
                            </th>

                        </tr>

                    </thead>


                    {{-- Table Body --}}
                    <tbody class="divide-y divide-slate-100">

                        @forelse ($users as $user)

                            <tr class="group transition hover:bg-slate-50">

                                {{-- ID --}}
                                <td class="whitespace-nowrap px-6 py-4
                                           font-medium text-slate-500">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Item --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        {{-- Avatar --}}
                                        <div class="flex h-10 w-10 items-center
                                                    justify-center rounded-lg
                                                    bg-indigo-100 text-sm font-bold
                                                    text-indigo-600">

                                            {{ strtoupper(substr($user->name, 0, 1)) }}

                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900">
                                                {{ $user->name }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                #{{ $user->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                  {{-- Price --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <span class="font-semibold text-slate-900">
                                        {{ $user->email}}
                                    </span>

                                </td>

                                {{-- Type --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <span class="rounded-full bg-slate-100 px-3 py-1
                                                 text-xs font-medium text-slate-600">
                                 {{ $user->tenant->name }}
                                    </span>

                                </td>



                        


                                {{-- Actions --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('users.edit', $user) }}"
                                           title="Edit"
                                           class="inline-flex h-9 w-9 items-center
                                                  justify-center rounded-lg
                                                  border border-slate-200
                                                  bg-white text-slate-500
                                                  transition
                                                  hover:border-indigo-200
                                                  hover:bg-indigo-50
                                                  hover:text-indigo-600">

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

                                        </a>


                                        {{-- Delete --}}
                                        {{-- <form
                                            action="{{ route('admin.plans.destroy', $plan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">

                                            @csrf
                                            @method('DELETE') --}}

                                            <button
                                            data-url="{{ route('users.destroy', $user->id) }}"
                                            data-name="{{ $user->name }}"
                                                type="submit"
                                                title="Delete"
                                                class="delete-btn inline-flex h-9 w-9 items-center
                                                       justify-center rounded-lg
                                                       border border-slate-200
                                                       bg-white text-slate-500
                                                       transition
                                                       hover:border-red-200
                                                       hover:bg-red-50
                                                       hover:text-red-600">

                                                <svg class="h-4 w-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142
                                                             A2 2 0 0116.138
                                                             21H7.862a2 2 0
                                                             01-1.995-1.858L5
                                                             7m5 4v6m4-6v6m1-10V4
                                                             a1 1 0 00-1-1h-4a1
                                                             1 0 00-1 1v3M4 7h16"/>

                                                </svg>

                                            </button>

                                        {{-- </form> --}}

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="mb-4 flex h-16 w-16 items-center
                                                    justify-center rounded-full
                                                    bg-slate-100">

                                            <svg class="h-8 w-8 text-slate-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.5"
                                                      d="M20 13V6a2 2 0
                                                         00-2-2H6a2 2 0
                                                         00-2 2v7m16 0v5a2
                                                         2 0 01-2 2H6a2
                                                         2 0 01-2-2v-5m16
                                                         0h-3.586a1 1 0
                                                         00-.707.293l-1.414
                                                         1.414a1 1 0
                                                         01-.707.293h-3.172a1
                                                         1 0 01-.707-.293L8.293
                                                         13.293A1 1 0
                                                         007.586 13H4"/>

                                            </svg>

                                        </div>

                                        <h3 class="text-base font-semibold text-slate-900">
                                            {{ __("custom.No users found") }}
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            {{ __("custom.Get started by creating first user.") }}
                                        </p>

                                        <a href="{{ route('users.create') }}"
                                           class="mt-4 inline-flex items-center gap-2
                                                  rounded-lg bg-indigo-600 px-4 py-2
                                                  text-sm font-semibold text-white
                                                  hover:bg-indigo-700">

                                            <span>+</span>
                                            {{ __("custom.Create User") }}

                                        </a>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($users->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $users->links() }}
                </div>

            @endif
