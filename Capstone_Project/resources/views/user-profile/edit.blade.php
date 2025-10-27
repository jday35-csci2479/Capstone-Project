<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ Auth::user()->name }}'s Profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <!-- Profile Edit Grid Layout -->
                <div class="h-screen w-full flex justify-center items-center p-6">
                    <div class="grid grid-cols-10 grid-row-4 gap-4 h-full w-full">

                        <!-- Profile picture  -->
                        <div class="col-span-4 row-span-4 bg-gray-700 rounded-3xl flex justify-center items-center">
                            1
                        </div>

                        <div class="col-span-6 row-span-2 bg-gray-700 rounded-3xl flex justify-center items-center">2</div>
                        <div class="col-span-6 row-span-2 bg-gray-700 rounded-3xl flex justify-center items-center">3</div>
                        <div class="col-start-5 col-span-6 row-span-2 bg-gray-700 rounded-3xl flex justify-center items-center">4</div>
                        <div class="col-span-4 row-start-5 row-span-1 bg-gray-700 rounded-3xl flex justify-center items-center">5</div>
                        <div class="col-span-4 row-span-1 bg-gray-700 rounded-3xl flex justify-center items-center">6</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
