<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">General Discussion</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Create Forum Button -->
            <div class="flex justify-end mb-6">
                <a href="{{ route('forums.generalDiscussion') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + Create Forum
                </a>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <p class="text-gray-700 dark:text-gray-200">Welcome to General Discussion. Add threads here.</p>
            </div>
        </div>
    </div>
</x-app-layout>
