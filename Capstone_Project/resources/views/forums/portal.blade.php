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
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Welcome to the Forums Portal!</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Select a topic to join the discussion.</p>
                </div>

                <form method="GET" action="{{ route('forums.search') }}" class="mb-6">
                    <div class="flex justify-center">
                        <input type="text" name="query" placeholder="Search forums..." 
                               class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg shadow">
                            Search
                        </button>
                    </div>
                </form>

                <!--- Forum Portal Container -->
                <div class="grid grid-cols-3 gap-x-0 gap-y-5 bg-gray-800 p-6 place-items-center">

                    <!-- Forum Portal Componenets -->
                    <x-forum-card href="/forums/General Discussion" title="General Discussion" emoji='<i class="fa-solid fa-comments"></i>' desc="All things Columbus State" />
                    <x-forum-card href="/forums/Homework Help" title="Homework Help" emoji="🕮" desc="Get assistance with your coursework" />
                    <x-forum-card href="/forums/Off Topic" title="Off Topic" emoji='<i class="fa-solid fa-mug-hot"></i>' desc="Talk about anything" />
                    <x-forum-card href="/forums/Support" title="Support" emoji='<i class="fa-sharp fa-solid fa-question"></i>' desc="Technical support" />
                    <x-forum-card href="/forums/Introductions" title="Introductions" emoji='<i class="fa-solid fa-handshake"></i>' desc="Say hi and introduce yourself" />
                    <x-forum-card href="/forums/Events" title="Events" emoji='<i class="fa-regular fa-calendar-days"></i>' desc="Upcoming campus events" />
                </div>
            </div>
    </div>
</div>
</x-app-layout>


            