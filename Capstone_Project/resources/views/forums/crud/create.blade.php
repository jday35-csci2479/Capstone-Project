<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Thread') }}
        </h2>
    </x-slot>

<!-- Primary container -->
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <!-- Forum Creation Form -->
                <form method="POST" action="{{ route('forums.crud.store') }}">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Body -->
                    <div class="mt-4">
                        <x-input-label for="body" :value="__('Body')" />
                        <textarea id="body" name="body" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Chooose Topic')" />
                        <select id="category" name="category" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="generalDiscussion">General Discussion</option>
                            <option value="introductions">Introductions</option>
                            <option value="support">Support</option>
                            <option value="events">Events</option>
                            <option value="offTopic">Off Topic</option>
                            <option value ="homeworkHelp">Homework Help</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Create Thread') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
    </div>
</div>
</x-app-layout>


            