<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Forums') }}
        </h2>
    </x-slot>

<!-- Primary container -->
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <!-- Welcome Message -->
                <div class="place-items-center mb-6">
                    <h3 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Welcome to the Forums Portal!</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Select a topic to join the discussion.</p>
                </div>

                <!--- Forum Portal Container -->
                <div class="grid grid-cols-3 gap-x-0 gap-y-5 bg-gray-800 p-6 place-items-center">

                    <!-- Columns and Links -->
                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">🗪</h1>
                        <a href="/forums/generalDiscussion" class=" text-white text-center text-xl mt-24 block hover:text-blue-600">General Discussion</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">All things Columbus State</p>
                    </div>

                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">📚</h1>
                        <a href="/forums/homeworkHelp" class="text-white text-center text-xl mt-24 block hover:text-blue-600">Homework Help</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">Get assistance with your coursework</p>
                    </div>

                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">🗣</h1>
                        <a href="/forums/offTopic" class="text-white text-center text-xl mt-24 block hover:text-blue-600">Off Topic</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">Talk about anything</p>
                    </div>

                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">❓</h1>
                        <a href="/forums/support" class="text-white text-center text-xl mt-24 block hover:text-blue-600">Support</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">Technical support</p>
                    </div>

                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">👋</h1>
                        <a href="/forums/introductions" class="text-white text-center text-xl mt-24 block hover:text-blue-600">Introductions</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">Say hi and introduce yourself</p>
                    </div>

                    <div class="relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700">
                        <h1 class="absolute text-[50px] text-center text-white top-4 left-20">📆</h1>
                        <a href="/forums/events" class="text-white text-center text-xl mt-24 block hover:text-blue-600">Events</a>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">Upcoming campus events</p>
                    </div>
                </div>
            </div>
    </div>
</div>
</x-app-layout>


            