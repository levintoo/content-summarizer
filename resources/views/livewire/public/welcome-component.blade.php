@push('seometa')
    @php
        $title = 'Welcome';
        $description = 'An AI-powered tool that summarizes YouTube videos instantly. Get the essential insights and skip the lengthy watch times. Perfect for busy professionals and learners who want information fast.';
    @endphp

    <!-- Primary Meta Tags -->
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="title" content="{{ $title }}" />
    <meta name="description" content="{{ $description }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content={{ config('app.url') }}/assets/og.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="content="{{ config('app.url') }}" />
    <meta property="twitter:title" content="{{ $title }}" />
    <meta property="twitter:description" content="{{ $description }}" />
    <meta property="twitter:image" content="{{ config('app.url') }}/assets/og.jpg" />
@endpush

<main class="text-slate-600 relative isolate bg-slate-50">
    foo
</main>
