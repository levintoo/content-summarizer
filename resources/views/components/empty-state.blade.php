@props(['title', 'description' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center gap-3 rounded-xl border border-dashed border-gray-300 bg-gray-50/60 px-6 py-12 text-center']) }}>
    @isset($icon)
        <div class="flex size-12 items-center justify-center rounded-full bg-blue-50 text-blue-500">
            {{ $icon }}
        </div>
    @endisset

    <div class="space-y-1">
        <h3 class="font-medium text-gray-900">{{ $title }}</h3>

        @if($description)
            <p class="max-w-sm text-sm text-gray-600">{{ $description }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="mt-2 flex flex-wrap items-center justify-center gap-2">
            {{ $actions }}
        </div>
    @endisset
</div>
