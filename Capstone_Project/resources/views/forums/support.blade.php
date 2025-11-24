<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Support</h2>
    </x-slot>

    <!--Primary Container-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Create Forum Button if user is authenticated -->
            @auth
            <div class="flex justify-end mb-6">
                <a href="{{ route('forums.crud.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    New Thread
                </a>
            </div>

            <!-- If user is not authenticated, show alert on button click -->
            @else
            <div class="flex justify-end mb-6">
                <button onclick="alert('Please log in to create a forum.')" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    New Thread
                </button>
            </div>
            @endauth

            <!-- Content container for created forums -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                
            @php
                $forums = \App\Models\Forums::where('category', 'Support')->latest()->get();
            @endphp
                    @forelse($forums as $forum)
                        <div class="mb-8 border border-gray-700 pb-6 bg-gray-900 rounded-lg p-4">

                            <!-- Title and Dropdown menu for Edit and Delete -->   
                        <div class="flex mt-4">

                            <!-- Title -->
                            <h3 class="text-white text-2xl font-bold mb-2">
                                {{ $forum->title }}
                            </h3>

                            @auth
                                @if($forum->user_id === auth()->id())
                                    <x-forum-settings :forum="$forum" />
                                @endif
                            @endauth
                        </div>

                            <!-- Date and View Discussion Button-->
                            <div class="flex mt-4">
                                <p class="text-sm text-white mb-4">
                                Posted by {{ $forum->user->name }}
                                on {{ $forum->created_at->format('M d, Y, h:i A') }}
                                </p>

                                <div class=" justify-end flex ml-auto">
                                    <a href="{{ route('forums.crud.show', $forum) }}">
                                        <x-primary-button>
                                        {{ __('View Discussion ➜') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @empty
                        <p class="text-white">No posts available</p>
                    @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
