<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Profile') }}
    </h2>
  </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <form method="POST" action="{{ route('user-profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                <!-- Profile Edit Grid Layout -->
                <div class="h-screen w-full p-6">
                  <div class="grid grid-cols-4 grid-rows-5 gap-5 h-full w-full">

                        <!-- Profile picture  -->
                        <div class="col-span-2 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex justify-center items-center position-relative">
                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm/6 font-medium text-white">Profile Picture</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-600">
                                            <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm/6 text-gray-400">
                                            <label for="profile_picture" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                                <span>Upload a file</span>
                                                <input id="profile_picture" type="file" name="profile_picture" accept="image/*" class="sr-only" />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
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
                                    <input name="birthday" type="date" value="{{ old('birthday', $user->birthday ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                                </div>
                                <div class="flex space-x-4">
                                    <label class="text-white text-lg font-medium mt-2">City:</label>
                                    <input name="city" type="text" value="{{ old('city', $user->city ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your city" />
                                </div>
                            </div>
                        </div>

                        <!-- About Me -->
                        <div class="col-span-3 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                About Me
                            </label>
                            <textarea name="about_me" rows="6" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tell us about yourself...">{{ old('about_me', $user->about_me ?? '') }}</textarea>
                        </div>

                        <!-- My Hobbies -->
                        <div class="col-span-1 row-span-2 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Hobbies
                            </label>
                            <textarea name="hobbies" rows="6" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="List your hobbies...">{{ old('hobbies', $user->hobbies ?? '') }}</textarea>
                        </div>

                        <!-- Majors -->
                        <div class="col-span-2 row-span-4 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Majors
                            </label>
                            <textarea name="majors" rows="14" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your major(s) and any relevant academic information...">{{ old('majors', $user->majors ?? '') }}</textarea>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-span-2 row-span-4 dark:bg-gray-900 border border-gray-700 rounded-3xl flex flex-col justify-start items-start p-6">
                            <label class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                                Contact Information
                            </label>
                            <textarea name="contact_information" rows="14" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your contact details (email, phone, social media, etc.)...">{{ old('contact_information', $user->contact_information ?? '') }}</textarea>
                        </div>

                        
                        <div class=" justify-start items-start -mb-10">
                            <x-primary-button type="submit">
                            {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
