<div {{ $attributes->merge(['class' => 'md:grid md:gap-0']) }}>
    <x-old.section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-old.section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="sm:py-6 md">
            {{ $content }}
        </div>
    </div>
</div>
