<x-dashboard-layout>
    @section('title', 'Detail Officer')

    {{-- Header --}}
    <header class="flex justify-between">
        <h2 class="text-3xl font-extrabold leading-none text-gray-900 md:text-4xl dark:text-white">
            Detail {{ $officer->role }} | <span class="capitalize md:text-xl">{{ $officer->name }}</span>
        </h2>
        <a href="{{ route('officers') }}"
            class=" text-gray-900 block bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            Back
        </a>
    </header>
</x-dashboard-layout>
