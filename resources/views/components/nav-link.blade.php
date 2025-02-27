@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-700 w-full text-blue-800 bg-slate-200/70 items-center gap-3 py-2 px-3 inline-flex rounded-lg'
            : 'text-gray-700 w-full hover:bg-slate-200/70 items-center gap-4 py-2 px-3 inline-flex rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
