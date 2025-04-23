@push('seometa')
    @php
        $title = 'Welcome';
        $description = 'An AI-powered tool that summarizes YouTube videos instantly. Get the essential insights and skip the lengthy watch times. Perfect for busy professionals and learners who want information fast.';
    @endphp

        <!-- Primary Meta Tags -->
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="title" content="{{ $title }}"/>
    <meta name="description" content="{{ $description }}"/>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:title" content="{{ $title }}"/>
    <meta property="og:description" content="{{ $description }}"/>
    <meta property="og:image" content={{ config('app.url') }}/assets/og.jpg"/>

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image"/>
    <meta property="twitter:url" content="content="{{ config('app.url') }}" />
    <meta property="twitter:title" content="{{ $title }}"/>
    <meta property="twitter:description" content="{{ $description }}"/>
    <meta property="twitter:image" content="{{ config('app.url') }}/assets/og.jpg"/>
@endpush

<main class="text-slate-600 relative isolate min-h-screen">
    <!-- Announcement Banner -->
    <a class="hidden group block bg-gray-100 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 p-3 rounded-lg text-center transition duration-300" href="#">
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <p class="me-2 inline-block text-sm text-gray-800">
                Shop for everyone on your list with the Preline Guide.
            </p>
            <span class="group-hover:underline group-focus:underline decoration-2 inline-flex justify-center items-center gap-x-2 font-semibold text-blue-600 text-sm">
      Shop now
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </span>
        </div>
    </a>
    <!-- End Announcement Banner -->

    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap lg:justify-start lg:flex-nowrap z-50 w-full py-5">
        <nav class="relative max-w-7xl w-full flex flex-wrap lg:grid lg:grid-cols-12 basis-full items-center px-4 md:px-6 lg:px-8 mx-auto">
            <div class="lg:col-span-3 flex items-center">
                <!-- Logo -->
                <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="../templates/creative-agency/index.html" aria-label="Preline">
                    <x-app-logo class="size-12" />
                </a>
                <!-- End Logo -->

                <div class="ms-1 sm:ms-2">

                </div>
            </div>

            <!-- Button Group -->
            <div class="flex items-center gap-x-1 lg:gap-x-2 ms-auto py-1 lg:ps-6 lg:order-3 lg:col-span-3">
                <a wire:navigate href="{{ route('login') }}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    Login
                </a>
                <a wire:navigate href="{{ route('register') }}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-blue-500 text-white hover:bg-blue-500 focus:outline-hidden focus:bg-blue-500 transition disabled:opacity-50 disabled:pointer-events-none">
                    Sign Up
                </a>

                <div class="lg:hidden">
                    <button type="button" class="hs-collapse-toggle size-9.5 flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
                        <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                        <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
            <!-- End Button Group -->

            <!-- Collapse -->
            <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
                <div class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:justify-center lg:items-center lg:gap-y-0 lg:gap-x-7 lg:mt-0">
                    <div>
                        <a class="relative inline-block text-black focus:outline-hidden before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blue-400" href="#" aria-current="page">Home</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Services</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">About</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Careers</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Blog</a>
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- Hero -->
    <div class="overflow-hidden before:absolute before:-z-10 before:top-0 before:start-1/2 before:opacity-30 before:bg-[url('{{ asset('assets/squared-bg-element.svg') }}')] before:bg-no-repeat before:bg-top before:size-full before:-z-1 before:transform before:-translate-x-1/2">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-20 sm:pt-32 pb-10 sm:pb-16">
            <!-- Announcement Banner -->
            <div class="flex justify-center">
                <a wire:navigate class="inline-flex items-center gap-x-2 bg-white border border-gray-200 text-xs text-gray-600 p-2 px-3 rounded-full transition hover:border-gray-300 focus:outline-hidden focus:border-gray-300" href="{{ route('register') }}">
                    💸 Save Hours in Seconds
                    <span class="flex items-center gap-x-1">
          <span class="border-s border-gray-200 text-blue-600 ps-2">Try it now</span>
                        <x-hugeicons-arrow-right-01 class="size-4 shrink-0 text-blue-600" stroke-width="2" />
        </span>
                </a>
            </div>
            <!-- End Announcement Banner -->

            <!-- Title -->
            <div class="mt-5 max-w-xl text-center mx-auto">
                <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-6xl">
                    Summarize and Chat with YouTube videos
                </h1>
            </div>
            <!-- End Title -->

            <div class="mt-5 max-w-3xl text-center mx-auto">
                <p class="text-lg text-gray-600">

                    No more wasting time. Summarize videos, ask questions, and get what matters — instantly.
                </p>
            </div>

            <!-- Buttons -->
            <div class="mt-8 gap-3 flex justify-center">
                <a class="py-3 px-4 gap-x-3 inline-flex items-center font-medium text-sm rounded-xl bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600" href="{{ route('register') }}">
                    Start saving time
                    <x-hugeicons-arrow-right-01 class="shrink-0 size-4" stroke-width="2" />
                </a>
                <button type="button" class="relative group p-2 ps-3 inline-flex items-center gap-x-2 text-sm rounded-xl border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                    See Example
                    <x-hugeicons-arrow-right-01 class="shrink-0 size-4" stroke-width="2" />
                </button>
            </div>
            <!-- End Buttons -->

            <div class="px-3 sm:px-0 mt-8 flex flex-col sm:flex-row sm:justify-center sm:items-center gap-3">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="rounded-full bg-blue-100 p-0.5"><x-hugeicons-tick-01 class="size-4" /></span>
                    <span class="text-sm text-gray-600 dark:text-neutral-400">Free For 7 Day Trial.</span>
                </div>
                <svg class="hidden sm:block size-5 text-gray-300 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
                </svg>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="rounded-full bg-blue-100 p-0.5"><x-hugeicons-tick-01 class="size-4" /></span>

                    <span class="text-sm text-gray-600 dark:text-neutral-400">No Credit Card Required</span>
                </div>
                <svg class="hidden sm:block size-5 text-gray-300 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
                </svg>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="rounded-full bg-blue-100 p-0.5"><x-hugeicons-tick-01 class="size-4" /></span>

                    <span class="text-sm text-gray-600 dark:text-neutral-400">Money Back Guarantee</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <div class="mt-8 py-10 max-w-7xl w-full mx-auto px-4 md:px-6 lg:px-8">
        <picture>
            <source media="(min-width: 640px)" srcset="{{ asset('assets/demo.png') }}">
            <img src="{{ asset('assets/demo-mobile.png') }}" alt="Demo of summarizer in action" class="rounded-xl border shadow-xl w-full" />
        </picture>
    </div>


</main>
