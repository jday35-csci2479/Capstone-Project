<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($forum->title) }}
        </h2>
    </x-slot>

<!-- Primary container -->
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="max-w-xl">
                    <h1 class="text-white text-2xl font-bold mb-4">{{ $forum->title }}</h1>
                    <p class="text-gray-700 dark:text-gray-200 mb-6">{{ $forum->body }}</p>

                    <!-- Forum Actions -->
                    <div class="flex space
            </div>
    </div>
</div>
</x-app-layout>


            