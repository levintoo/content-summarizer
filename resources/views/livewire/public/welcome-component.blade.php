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
                <a wire:navigate href="{{ route('register') }}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 transition disabled:opacity-50 disabled:pointer-events-none">
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
                        <a class="relative inline-block focus:outline-hidden before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blue-400" href="#" aria-current="page">Home</a>
                    </div>
                    <div>
                        <a class="inline-block hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Services</a>
                    </div>
                    <div>
                        <a class="inline-block hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">About</a>
                    </div>
                    <div>
                        <a class="inline-block hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Careers</a>
                    </div>
                    <div>
                        <a class="inline-block hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Blog</a>
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
            <img src="{{ asset('assets/demo-mobile.png') }}" alt="Demo of summarizer in action" class="aspect-[3/4] sm:aspect-[16/10] rounded-xl border border-slate-200 shadow-xl w-full" />
        </picture>
    </div>

    <!-- Icon Blocks -->
    <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-center gap-12">
            <!-- Icon Block -->
            <div class="text-center">
                <div class="flex justify-center items-center size-12 bg-blue-600 border-2 border-blue-200 rounded-full mx-auto">
                    <svg class="shrink-0 size-5 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="10" height="14" x="3" y="8" rx="2"/><path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"/><path d="M8 18h.01"/></svg>
                </div>
                <div class="mt-3">
                    <h3 class="text-lg font-semibold text-gray-800">Responsive</h3>
                    <p class="mt-1 text-gray-600">Responsive, and mobile-first project on the web</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div class="text-center">
                <div class="flex justify-center items-center size-12 bg-blue-600 border-2 border-blue-200 rounded-full mx-auto">
                    <svg class="shrink-0 size-5 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                </div>
                <div class="mt-3">
                    <h3 class="text-lg font-semibold text-gray-800">Customizable</h3>
                    <p class="mt-1 text-gray-600">Preferences are easily customized and extendable</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div class="text-center">
                <div class="flex justify-center items-center size-12 bg-blue-600 border-2 border-blue-200 rounded-full mx-auto">
                    <svg class="shrink-0 size-5 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
                </div>
                <div class="mt-3">
                    <h3 class="text-lg font-semibold text-gray-800">24/7 human Support</h3>
                    <p class="mt-1 text-gray-600">Contact us 24 hours a day, 7 days a week</p>
                </div>
            </div>
            <!-- End Icon Block -->
        </div>
    </div>
    <!-- End Icon Blocks -->

    <section id="secondary-features" aria-label="Features for building a portfolio" class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight text-gray-900">
                    How it works
                </h2>
                <p class="mt-2 text-lg text-gray-600">Easy steps, endless possibilities</p>
            </div>

            <!-- Icon Blocks -->
            <div class="max-w-7xl py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-center gap-6 md:gap-10">
                    <!-- Card -->
                    <div class="size-full bg-white border border-dashed border-slate-200 ring-slate-200 ring-1 ring-offset-4 rounded-lg p-5">
                        <div class="flex items-center gap-x-4 mb-3">
                            <div class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-blue-50 bg-blue-100">
                                <x-hugeicons-copy-link class="shrink-0 size-6 text-blue-600" />
                            </div>
                            <div class="shrink-0">
                                <h3 class="block text-lg font-semibold text-gray-800">Paste a YouTube Link</h3>
                            </div>
                        </div>
                        <p class="text-gray-600">Drop the URL of any video — lecture, podcast, tutorial, or anything else.</p>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="size-full bg-white border border-dashed border-slate-200 ring-slate-200 ring-1 ring-offset-4 rounded-lg p-5">
                        <div class="flex items-center gap-x-4 mb-3">
                            <div class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-blue-50 bg-blue-100">
                                <x-hugeicons-ai-cloud-01 class="shrink-0 size-6 text-blue-600" />
                            </div>
                            <div class="shrink-0">
                                <h3 class="block text-lg font-semibold text-gray-800">Let AI Work Its Magic</h3>
                            </div>
                        </div>
                        <p class="text-gray-600">We instantly summarize the video and generate a chat interface so you can ask questions about it.</p>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="size-full bg-white border border-dashed border-slate-200 ring-slate-200 ring-1 ring-offset-4 rounded-lg p-5">
                        <div class="flex items-center gap-x-4 mb-3">

                            <div class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-blue-50 bg-blue-100">
                                <x-hugeicons-file-01 class="shrink-0 size-6 text-blue-600" />
                            </div>
                            <div class="shrink-0">
                                <h3 class="block text-lg font-semibold text-gray-800">Get Insights in Seconds</h3>
                            </div>
                        </div>
                        <p class="text-gray-600">Read the summary, ask questions, and get instant answers — no fluff, just what matters.</p>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Icon Blocks -->
        </div>
    </section>


    <section id="secondary-features" aria-label="Features for building a portfolio" class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center"><h2 class="text-3xl lg:text-4xl font-bold tracking-tight text-gray-900">
                    Now is the time to build your portfolio.</h2>
                <p class="mt-2 text-lg text-gray-600">With typical market returns, you have to start young to secure
                    your future. With Pocket, it’s never too late to build your nest egg.</p></div>
            <ul role="list"
                class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
                <template x-data="{ colors: ['Red', 'Orange', 'Yellow'] }" x-for="color in colors">
                    <li class="rounded-2xl border border-gray-200 p-8">
                        <div class="p-0.5 bg-slate-50 w-fit rounded-lg"><x-hugeicons-ai-cloud-01 class="size-8" /></div>
                        <h3 class="mt-6 font-semibold text-gray-900">Invest any amount</h3>
                        <p class="mt-2 text-gray-700">
                            Whether it’s $1 or $1,000,000, we can put your money to work for you.
                        </p>
                    </li>
                </template>
            </ul>
        </div>
    </section>

    <!-- Features -->
    <div class="overflow-hidden">
        <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Title -->
            <div class="mx-auto max-w-2xl mb-8 lg:mb-14 text-center">
                <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold">
                    No Tiers. No Tricks. Just Full Access.
                </h2>
            </div>
            <!-- End Title -->

            <div class="relative xl:w-10/12 xl:mx-auto">
                <!-- Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                    @forelse(\App\Models\Plan::query()->orderByDesc('amount')->limit(5)->get() as $plan)
                    <div>
                        <!-- Card -->
                        <div class="hover:shadow-xl shadow-gray-200 p-5 relative z-10 bg-white border border-gray-200 rounded-xl md:p-10">
                            <h3 class="text-xl font-bold text-gray-800">{{ $plan->name }}</h3>
                            <div class="text-sm text-gray-500">Just an option for convenience.</div>
                            @if($plan->interval === 'monthly')
                            <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3">Most popular</span>
                            @endif

                            <div class="mt-5">
                                <span class="text-6xl font-bold text-gray-800">${{ $plan->amount/100/100 }}</span>
                                <span class="text-lg font-bold text-gray-800">or {{ $plan->currency . $plan->amount / 100 }}</span>
                                <span class="ms-3 text-gray-500">/ {{$plan->interval}}</span>
                            </div>

                            <div class="mt-5 grid sm:grid-cols-1 gap-y-2 py-4 first:pt-0 last:pb-0 sm:gap-x-6 sm:gap-y-0">
                                <!-- List -->
                                <ul class="space-y-2 text-sm sm:text-base">
                                    <li class="flex gap-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                        <span class="text-gray-800">
                    Unlimited Summaries
                  </span>
                                    </li>

                                    <li class="flex gap-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                        <span class="text-gray-800">
                    Unlimited Questions
                  </span>
                                    </li>

                                    <li class="flex gap-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                        <span class="text-gray-800">
                    24/7 Human Support
                  </span>
                                    </li>

                                    <li class="flex gap-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                        <span class="text-gray-800">
                    Cancel Anytime
                  </span>
                                    </li>

                                    <li class="flex gap-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                        <span class="text-gray-800">
                    Secure & Private
                  </span>
                                    </li>
                                </ul>
                                <!-- End List -->
                            </div>

                            <div class="mt-5 grid grid-cols-2 gap-x-4 py-4 first:pt-0 last:pb-0">
                                <div>
                                    <p class="text-sm text-gray-500">Cancel anytime.</p>
                                    <p class="text-sm text-gray-500">No card required.</p>
                                </div>

                                <div class="flex justify-end">
                                    @if($plan->interval === 'monthly')
                                    <a href="{{ route('account') }}" wire:navigate type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Start free trial</a>
                                    @else
                                        <a href="{{ route('account') }}" wire:navigate type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50">Start free trial</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    @empty
                    @endforelse
                </div>
                <!-- End Grid -->

                <!-- SVG Element -->
                <div class="hidden md:block absolute top-0 end-0 translate-y-16 translate-x-16">
                    <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                    </svg>
                </div>
                <!-- End SVG Element -->

                <!-- SVG Element -->
                <div class="hidden md:block absolute bottom-0 start-0 translate-y-16 -translate-x-16">
                    <svg class="w-56 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                    </svg>
                </div>
                <!-- End SVG Element -->
            </div>

            <div class="mt-7 text-center">
                <p class="text-xs text-gray-400">
                    Prices in KSH. Prices you pay will likely be lower.
                </p>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <!-- FAQ -->
    <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800">
                Frequently Asked Questions
            </h2>
        </div>
        <!-- End Title -->

        <div class="max-w-5xl mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Can I cancel at anytime?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Yes, you can cancel anytime no questions are asked while you cancel but we would highly appreciate if you will give us some feedback.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        My team has credits. How do we use them?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Once your team signs up for a subscription plan. This is where we sit down, grab a cup of coffee and dial in the details.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        How does Preline's pricing work?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Our subscriptions are tiered. Understanding the task at hand and ironing out the wrinkles is key.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        How secure is Preline?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Protecting the data you trust to Preline is our first priority. This part is really crucial in keeping the project in line to completion.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Do you offer discounts?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        We've built in discounts at each tier for teams. The time has come to bring those ideas and plans to life.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        What is your refund policy?
                    </h3>
                    <p class="mt-2 text-gray-600">
                        We offer refunds. We aim high at being focused on building relationships with our clients and community.
                    </p>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </div>
    <!-- End FAQ -->

    <!-- Testimonials -->
    <div class="relative max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Blockquote -->
        <blockquote class="text-center lg:mx-auto lg:w-3/5">
            <div class="mt-6 lg:mt-10">
                <p class="relative text-xl sm:text-2xl md:text-3xl md:leading-normal font-medium text-gray-800">
                    <svg class="absolute top-0 start-0 transform -translate-x-8 -translate-y-8 size-16 text-gray-200 sm:h-24 sm:w-24" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M7.18079 9.25611C7.18079 10.0101 6.93759 10.6211 6.45119 11.0891C5.96479 11.5311 5.35039 11.7521 4.60799 11.7521C3.71199 11.7521 2.96958 11.4531 2.38078 10.8551C1.81758 10.2571 1.53598 9.39911 1.53598 8.28111C1.53598 7.08511 1.86878 5.91511 2.53438 4.77111C3.22559 3.60111 4.18559 2.67811 5.41439 2.00211L6.29759 3.36711C5.63199 3.83511 5.09439 4.35511 4.68479 4.92711C4.30079 5.49911 4.04479 6.16211 3.91679 6.91611C4.14719 6.81211 4.41599 6.76011 4.72319 6.76011C5.43999 6.76011 6.02879 6.99411 6.48959 7.46211C6.95039 7.93011 7.18079 8.52811 7.18079 9.25611ZM14.2464 9.25611C14.2464 10.0101 14.0032 10.6211 13.5168 11.0891C13.0304 11.5311 12.416 11.7521 11.6736 11.7521C10.7776 11.7521 10.0352 11.4531 9.44639 10.8551C8.88319 10.2571 8.60159 9.39911 8.60159 8.28111C8.60159 7.08511 8.93439 5.91511 9.59999 4.77111C10.2912 3.60111 11.2512 2.67811 12.48 2.00211L13.3632 3.36711C12.6976 3.83511 12.16 4.35511 11.7504 4.92711C11.3664 5.49911 11.1104 6.16211 10.9824 6.91611C11.2128 6.81211 11.4816 6.76011 11.7888 6.76011C12.5056 6.76011 13.0944 6.99411 13.5552 7.46211C14.016 7.93011 14.2464 8.52811 14.2464 9.25611Z" fill="currentColor"/>
                    </svg>
                    <span class="relative z-10 italic text-gray-800">I just wanted to say that I'm very happy with my purchase of Preline so far. The documentation is outstanding - clear and detailed.</span>
                </p>
            </div>

            <footer class="mt-6">
                <div class="font-semibold text-gray-800">Philip</div>
                <div class="text-sm text-gray-500">Product Manager | Airbnb</div>
            </footer>
        </blockquote>
        <!-- End Blockquote -->
    </div>
    <!-- End Testimonials -->

    <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-50 rounded-2xl">
        <!-- Title -->
        <div class="mt-5 max-w-xl text-center mx-auto">
            <h1 class="block font-bold text-gray-800 text-4xl">
                Switch sides. Join us.
            </h1>
        </div>
        <!-- End Title -->

        <div class="mt-5 max-w-3xl text-center mx-auto">
            <p class="text-lg text-gray-600">

                No more wasting time. Summarize videos, ask questions, and get what matters — instantly.
            </p>
        </div>

        <div class="mt-5 flex justify-center items-center">
            <a class="py-3 px-4 gap-x-3 inline-flex items-center font-medium text-sm rounded-xl bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600" href="{{ route('register') }}">
                Get started now
            </a>
        </div>
    </div>

    <!-- ========== FOOTER ========== -->
    <footer>
        <div class="mx-auto max-w-7xl space-y-8 px-4 py-10 sm:px-6 lg:space-y-16 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div>
                    <div class="text-teal-600">
                        <x-app-logo class="size-10" />
                    </div>

                    <p class="mt-4 max-w-xs text-gray-500">
                        Follow our socials - {{ config('app.name') }}
                    </p>

                    <ul class="mt-8 flex gap-6">
                        <li>
                            <a
                                href="#"
                                rel="noreferrer"
                                target="_blank"
                                class="text-gray-700 transition hover:opacity-75"
                            >
                                <span class="sr-only">Facebook</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a
                                href="#"
                                rel="noreferrer"
                                target="_blank"
                                class="text-gray-700 transition hover:opacity-75"
                            >
                                <span class="sr-only">Instagram</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a
                                href="#"
                                rel="noreferrer"
                                target="_blank"
                                class="text-gray-700 transition hover:opacity-75"
                            >
                                <span class="sr-only">Twitter</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                                    />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a
                                href="#"
                                rel="noreferrer"
                                target="_blank"
                                class="text-gray-700 transition hover:opacity-75"
                            >
                                <span class="sr-only">GitHub</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                    <div>
                        <p class="font-medium text-gray-900">Services</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> 1on1 Coaching </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Company Review </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> HR Consulting </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> SEO Optimisation </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Company</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> About </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Meet the Team </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Helpful Links</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Contact </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> FAQs </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Live Chat </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <p class="text-xs text-gray-500">&copy; {{ now()->year }}. {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->
</main>
