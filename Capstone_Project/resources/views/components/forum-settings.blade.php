@props(['forum'])

<el-dropdown class="inline-block justify-end ml-auto">
    <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5 hover:bg-white/20">
        Options
        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
        </svg>
    </button>

    <el-menu anchor="bottom end" popover class="w-44 origin-top-right rounded-md bg-gray-700 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete mt-2 data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
        <div class="py-1">
            <a href="{{ route('forums.crud.edit', $forum) }}" class="block px-4 py-2 text-sm text-gray-300 dark:hover:bg-gray-800 focus:text-white focus:outline-hidden">📝 Edit</a>
            <form action="{{ route('forums.crud.destroy', $forum) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this thread?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 dark:hover:bg-gray-800 focus:text-white focus:outline-hidden">🗑️ Delete</button>
            </form>
        </div>
    </el-menu>
</el-dropdown>
