@push('seometa')
    <title>{{ $content->title }} - {{ config('app.name') }}</title>
    <meta name="robots" content="noindex">
@endpush

<div class="min-h-screen bg-gray-50">
    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-4">
            <a href="{{ url('/') }}" class="flex items-center gap-2 font-medium text-gray-900">
                <x-hugeicons-ai-cloud class="size-6 text-blue-500" />
                {{ config('app.name') }}
            </a>

            <a href="{{ route('summary.create') }}" class="rounded-lg bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700">
                Summarize a video
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-3xl space-y-6 px-4 py-8">
        <a target="_blank" rel="noopener nofollow" href="https://www.youtube.com/watch?v={{ $content->video_id }}"
           class="block overflow-hidden rounded-xl shadow-lg transition hover:opacity-90">
            <img class="aspect-video w-full object-cover"
                 src="https://i.ytimg.com/vi/{{ $content->video_id }}/maxresdefault.jpg"
                 alt="{{ $content->title }}">
        </a>

        <div class="space-y-1">
            <h1 class="text-xl font-semibold text-gray-900">{{ $content->title }}</h1>
            <p class="text-gray-600">{{ $content->channel }}</p>
        </div>

        <article class="prose max-w-none rounded-xl bg-white p-5 font-light shadow-sm ring-1 ring-gray-200">
            @if($content->summary)
                {!! Str::markdown(strip_tags($content->summary), ['html_input' => 'escape', 'allow_unsafe_links' => false]) !!}
            @else
                <p>This summary is not ready yet.</p>
            @endif
        </article>
    </main>
</div>
