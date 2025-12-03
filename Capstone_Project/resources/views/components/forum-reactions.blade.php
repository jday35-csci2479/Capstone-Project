@props(['forum'])

<div x-data="forumReactions({ 
    forumId: {{ $forum->id }}, 
    initialLikes: {{ $forum->likes->count() }}, 
    initialDislikes: {{ $forum->dislikes->count() }}, 
    initialType: '{{ optional($forum->reactions()->where('user_id', auth()->id())->first())->type }}' 
})" class="flex items-center space-x-4 mt-2 text-lg">
    <!-- Like Button -->
    <button @click="react('like')" :class="type === 'like' ? 'text-blue-500' : 'text-white'" class="flex items-center space-x-1 focus:outline-none">
        <i class="fa-solid fa-thumbs-up"></i>
        <span x-text="likes"></span>
    </button>

    <!-- Dislike Button -->
    <button @click="react('dislike')" :class="type === 'dislike' ? 'text-red-500' : 'text-white'" class="flex items-center space-x-1 focus:outline-none">
        <i class="fa-solid fa-thumbs-down"></i>
        <span x-text="dislikes"></span>
    </button>
</div>
