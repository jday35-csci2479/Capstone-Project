<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <!-- Primary container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <!-- Flex container for welcome message and image -->
                    <div class="flex items-center justify-between flex-wrap">
                        
                        <!-- Left side description -->
                        <div class="max-w-xl">

                            <!-- Welcome message if user is authorized-->
                            @auth
                            <h1 class="p-20 text-4xl font-bold text-gray-900 dark:text-gray-100">
                                Welcome {{ Auth::user()->name }} To Cougar Connect!
                            </h1>
                            <p class="p-20 -mt-32 text-lg text-gray-600 dark:text-gray-400">
                                Your gateway to connecting with the Columbus State community.
                            </p>

                            <!-- Welcome message if user is unauthorized -->
                            @else
                            <h1 class="p-20 text-4xl font-bold text-gray-900 dark:text-gray-100">
                                Welcome To Cougar Connect!
                            </h1>
                            <p class="p-20 -mt-32 text-lg text-gray-600 dark:text-gray-400">
                                Your gateway to connecting with the Columbus State community.
                            </p>

                            <p class="p-20 -mt-32 text-lg text-white font-bold">
                                Register an account or login to get started!
                            </p>
                            @endauth
                        </div>

                        <!-- Right side image -->
                        <div class="mt-6 sm:mt-0">
                            <img 
                                class="border-2 border-gray-300 dark:border-gray-600 rounded-lg"
                                src="{{ asset('images/Cougar_Head.jpg') }}" 
                                alt="Welcome Image" 
                                width="400"
                            />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
