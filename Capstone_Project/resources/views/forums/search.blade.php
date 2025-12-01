<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      Search Results
    </h2>
  </x-slot>

  <!--Primary Container-->
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <!-- Search Form -->
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

      <!-- Content container for search results -->
      <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

        @if($results->isEmpty())
          <p class="text-gray-700 dark:text-gray-300">No results for "{{ $query }}"</p>
        @else
        
            @foreach($results as $forum)
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
                                <p class="text-sm text-white font-bold mb-4">
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

                            <!-- Category Link -->
                            <div>
                                <a href="{{ route('forums.' . $forum->category, $forum) }}" class="text-blue-500 hover:text-blue-700 font-bold">
                                  {{ $forum->category }} ➜
                                </a>
                            </div>

                        </div>
            @endforeach
        @endif
    </div>
    </div>
  </div>
</x-app-layout>
