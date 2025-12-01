<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ Auth::user()->name }}'s Profile
    </h2>
  </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <!-- Profile Edit Grid Layout -->
                <div class="h-screen w-full p-6">
                  <div class="grid grid-cols-4 grid-rows-5 gap-5 h-full w-full">

                        <!-- Profile picture  -->
                        <div class="col-span-2 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex justify-center items-center position-relative">
                            <div class="col-span-full">
                                @if($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="h-56 w-56 rounded-full object-cover">
                                @else
                                    <div class="h-48 w-48 rounded-full bg-gray-700 flex items-center justify-center text-gray-300 text-sm">No Picture</div>
                                @endif
                            </div>
                        </div>

                        <!-- Name Display -->
                        <div class="col-span-2 row-span-1 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-center items-center">
                            <label class="font-semibold text-4xl  text-gray-800 dark:text-gray-200 leading-tight">
                             Hello, I'm
                            </label>

                            <label class="font-semibold text-4xl  text-gray-800 dark:text-gray-200 leading-tight">
                                {{ Auth::user()->name }}
                            </label>
                        </div>

                        <!-- Birthday and City -->
                        <div class="col-span-2 row-span-1 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-center items-start p-10">
                            <div class="w-full space-y-4">
                                <div class="flex space-x-4">
                                    <label class="text-white text-lg font-medium mt-2">Birthday:</label>
                                    <p class="text-white text-lg mt-2">{{ $user->birthday }}</p>
                
                                </div>
                                <div class="flex space-x-4">
                                    <label class="text-white text-lg font-medium mt-2">City:</label>
                                    <p class="text-white text-lg mt-2">{{ $user->city }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- About Me -->
                        <div class="col-span-3 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                About Me
                            </label>
                            <p class="text-white text-base">{{ $user->about_me }}</p>
                        </div>

                        <!-- My Hobbies -->
                        <div class="col-span-1 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Hobbies
                            </label>
                            <p class="text-white text-base whitespace-pre-wrap">{{ $user->hobbies }}</p>
                        </div>

                        <!-- Majors -->
                        <div class="col-span-2 row-span-4 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Majors
                            </label>
                            <p class="text-white text-base whitespace-pre-wrap">{{ $user->majors }}</p>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-span-2 row-span-4 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Contact Information
                            </label>
                            <p class="text-white text-base whitespace-pre-wrap">{{ $user->contact_information }}</p>
                        </div>

                        @auth
                        @if ($user->user_id === auth()->id())
                        <div class="justify-start items-start -mb-10">
                            <a href="{{ route('user-profile.edit') }}">
                            <x-primary-button>
                            {{ __('Edit Profile') }}
                            </x-primary-button>
                            </a>
                        </div>
                        @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
