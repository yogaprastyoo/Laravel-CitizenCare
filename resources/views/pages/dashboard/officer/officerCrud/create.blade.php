<x-dashboard-layout>
    @section('title', 'Create Officer')

    {{-- Header --}}
    <header>
        <h2 class="text-3xl font-extrabold leading-none text-gray-900 md:text-4xl dark:text-white">
            Create Officer
        </h2>
    </header>

    {{-- Form Create Section --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto py-4 lg:py-8">
            {{-- Form Create --}}
            <form action="{{ route('officer.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    {{-- Name --}}
                    <div class="w-full">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" maxlength="60" value="{{ old('name') }}"
                            class="bg-gray-50 capitalize border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Name" autocomplete="off" autofocus>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="email@example.com" autocomplete="off">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Phone Number --}}
                    <div class="w-full">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" maxlength="13"
                            value="{{ old('phone_number') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Phone number" autocomplete="off"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);">
                        @error('phone_number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div>
                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select role</option>
                            <option value="admin" @if (old('role') == 'admin') selected @endif>Admin</option>
                            <option value="officer" @if (old('role') == 'officer') selected @endif>Officer</option>
                        </select>
                        @error('role')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password
                        </label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="••••••••" autocomplete="off">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="w-full">
                        <label for="confirm_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Confirm Password
                        </label>
                        <input type="password" name="confirm_password" id="confirm_password"
                            value="{{ old('password') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="••••••••" autocomplete="off">
                        @error('confirm_password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oh, snapp!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Button Submit --}}
                <button type="Submit"
                    class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Create
                </button>

                {{-- Button Submit --}}
                <a href="{{ route('officers') }}"
                    class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Cancel
                </a>
            </form>
        </div>
    </section>
</x-dashboard-layout>
