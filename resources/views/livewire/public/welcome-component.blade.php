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

<main class="text-slate-600 relative isolate bg-slate-50 min-h-screen">
    <div class="container mx-auto py-3">
        <header class="w-full flex justify-between gap-3 items-center">
            <x-app-logo class="size-10" />

            <ul class="flex gap-5 items-center">
                <li>
                    <x-link size="sm" secondary wire:navigate href="/">Pricing</x-link>
                </li>
                <li>
                    <x-link size="sm" secondary wire:navigate href="/">Guide</x-link>
                </li>
                <li>
                    <x-link size="sm" secondary wire:navigate href="/">Blog</x-link>
                </li>
                <li>
                    <x-link size="sm" secondary wire:navigate href="/">Login</x-link>
                </li>
                <li>
                    <x-button>Get Started Now</x-button>
                </li>
            </ul>
        </header>

        <div class="hidden">
            <h1>Summarise & Chat with youtube videos</h1>
            <h2>Start saving time now, with ai generated youtube video summarization</h2>
            <div>
                <x-button>Get Started Now</x-button>
                <x-button flat>Pricing</x-button>
            </div>
            <p>The next 100 customers get a 20% discount</p>
        </div>

        <div class="container">
            <div class="flex flex-col items-center px-4">
                <div class="flex flex-col items-center gap-y-2 mb-6"><a
                        class="flex items-center gap-x-1.5 py-[3px] pr-[7px] pl-[11px] rounded-full border border-black/[0.03] bg-[rgba(30,31,37,0.04)] backdrop-blur-[10px] hover:not-active:bg-[rgba(30,31,37,0.08)] text-xs font-medium transition-background duration-150 ease-in-out"
                        target="_blank" href="https://finta.com/docs/credits">Intro to R&amp;D Tax Credits
                        <svg width="16" height="16" fill="none">
                            <path stroke="#1E1F25" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".5"
                                  stroke-width="1.25" d="M8 4.75 11.25 8m0 0L8 11.25M11.25 8h-6.5"></path>
                        </svg>
                    </a></div>
                <h1 class="lg:hidden text-center text-4xl font-medium text-pretty">Magically&nbsp;simplify<br>accounting
                    and&nbsp;taxes</h1>
                <h1 class="hidden lg:block mt-6 max-w-176 text-center text-5xl font-medium [word-spacing:0.02em]">
                    Summarise & Chat with youtube videos
                </h1>
                <div
                    class="mt-4 max-w-160 text-finta-900 font-book text-center text-balance [word-spacing:0.01em] text-sm lg:text-lg [&amp;_strong]:text-finta-950 [&amp;_strong]:font-medium">
                    <p class="inline-block"><span class="inline">
                        Start saving time now, with ai generated youtube video summarization
                        </span><span><span
                                class="[font-variant-numeric:tabular-nums]">9</span><span
                                class="transition-opacity duration-150 opacity-100">:</span><span
                                class="[font-variant-numeric:tabular-nums]">01</span>pm</span>.</p></div>
                <div class="mt-6 flex items-center gap-x-1.5">
                    <x-button>Get Started Now</x-button>
                    <x-button flat>Pricing</x-button>
                </div>
                <p class="text-finta-950/40 font-book mt-6 text-xs">The next 100 customers get a 20% discount</p></div>
        </div>
    </div>
</main>
