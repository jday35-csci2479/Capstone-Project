<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $forum->category }} - {{ __($forum->title) }}
        </h2>
    </x-slot>

    <!-- Primary Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Container for forum post -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="mb-8 border border-gray-700 pb-6 bg-gray-900 rounded-lg p-4">
                    <!-- Title and Dropdown menu for Edit and Delete -->
                    <div class="flex mt-4">
                        <h3 class="text-white text-2xl font-bold mb-2">
                            {{ $forum->title }}
                        </h3>

                        @auth
                            @if($forum->user_id === auth()->id())
                                <x-forum-settings :forum="$forum" />
                            @endif
                        @endauth
                    </div>

                    <!-- Date -->
                    <div class="flex mt-4">
                        <p class="text-sm text-white mb-4">
                            Posted by {{ $forum->user->name }} on {{ $forum->created_at->format('M d, Y, h:i A') }}
                        </p>
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <p class="text-white whitespace-pre-line">{{ $forum->body }}</p>
                    </div>
                </div>
            </div>

            <!-- Comment Form -->
            @auth
                <form method="POST" action="{{ route('forums.comments.store', $forum) }}" class="mt-6">
                    @csrf
                    <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <x-input-label for="comment" :value="__('Join the conversation')" />
                        <textarea 
                            id="comment" 
                            name="body" 
                            rows="4" 
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            required
                        ></textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Post Comment') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            @endauth

            <!-- Container for comments -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
                <h3 class="text-white text-xl font-bold mb-4">Comments</h3>

                @forelse($forum->comments as $comment)
                    <div class="mb-4 border border-gray-700 pb-4 bg-gray-900 rounded-lg p-4">
                        <div class="flex mb-2">
                            <p class="text-sm text-white mb-2">
                                {{ $comment->user->name }} commented on {{ $comment->created_at->format('M d, Y, h:i A') }}
                            </p>

                            @auth
                                @if($comment->user_id === auth()->id())
                                    <x-comment-settings :comment="$comment" />
                                @endif
                            @endauth
                        </div>

                        <div>
                            <p class="text-white whitespace-pre-line">{{ $comment->body }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-white">No comments yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
