<!-- Forum card component -->
@props([
    'href' => '#',
    'title' => '',
    'emoji' => '',
    'desc' => '',
])

<div {{ $attributes->merge(['class' => 'relative h-56 w-56 bg-gray-900 shadow sm:rounded-lg border-2 border-gray-700']) }}>
    <h1 class="absolute text-[50px] text-center text-white top-4 left-20">{!! $emoji !!}</h1>

    <a href="{{ $href }}" class="text-white text-center text-xl mt-24 block hover:text-blue-600">{{ $title }}</a>

    @if($desc)
        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 text-center">{{ $desc }}</p>
    @endif
</div>
