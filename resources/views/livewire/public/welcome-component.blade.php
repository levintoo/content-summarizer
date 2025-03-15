@push('seometa')
    <title>Welcome - {{ config('app.name') }}</title>
@endpush

@push('styles')
    <style>
        .bg-fancy::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /*background-color: rgba(238, 85, 34, 0.1);*/
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 700 700"><defs><linearGradient gradientTransform="rotate(150, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%" id="ffflux-gradient"><stop stop-color="hsl(315, 100%, 72%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%"></stop></linearGradient><filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feTurbulence type="fractalNoise" baseFrequency="0.005 0.003" numOctaves="2" seed="2" stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence"></feTurbulence><feGaussianBlur stdDeviation="20 0" x="0%" y="0%" width="100%" height="100%" in="turbulence" edgeMode="duplicate" result="blur"></feGaussianBlur><feBlend mode="color-dodge" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur" result="blend"></feBlend></filter></defs><rect width="700" height="700" fill="url(%23ffflux-gradient)" filter="url(%23ffflux-filter)"></rect></svg>');
            background-attachment: fixed;
            background-size: cover;
            opacity: 0.1;
            /*filter: blur(90px);*/
            z-index: -1;
        }
    </style>
@endpush

<main class="text-slate-600 relative isolate bg-fancy">
    <div class="flex flex-col justify-between md:min-h-[75vh] mx-auto overflow-hidden px-4 sm:px-6 lg:px-0 max-w-4xl">
        <header class="w-full mt-3 flex justify-between items-center gap-5 p-2 mx-auto md:bg-white rounded-2xl md:border md:border-slate-200">
            <a class="text-blue-100">
                <x-app-logo class="size-10" />
            </a>

            <ul class="hidden md:flex gap-5">
                <li>
                    <a>
                        Pricing
                    </a>
                </li>
                <li>
                    <a>
                        Features
                    </a>
                </li>
                <li>
                    <a>
                        Blog
                    </a>
                </li>
                <li>
                    <a>
                        See Example
                    </a>
                </li>
            </ul>

            <ul class="hidden md:flex gap-5">
                <li>
                    <a>
                        Register
                    </a>
                </li>
                <li>
                    <a href="#" class="bg-white border border-gray-200 px-3 py-2 rounded-lg">Login</a>
                </li>
            </ul>

            <button class="md:hidden hover:bg-white/50 rounded-xl p-2 text-slate-600 grid place-items-center">
                <x-hugeicons-menu-01 class="size-6" />
            </button>
        </header>

        <div class="flex items-center justify-center flex-1">
            <div class="py-20 md:text-center">
                <h1 class="mx-auto max-w-4xl font-display text-5xl font-semibold tracking-tight text-slate-700 sm:text-6xl">
                    <span class="text-blue-600">Summarize & Chat </span> With <br /> YouTube Videos
                </h1>

                <p class="md:mx-auto mt-6 md:max-w-2xl text-md text-slate-500">
                    Skip ads, sponsors, and rambling—get straight to the point. Our AI instantly summarizes YouTube videos,
                    giving you key insights in seconds.
                </p>

                <div class="mt-10 flex md:justify-center gap-x-6">
                    <a class="group inline-flex items-center justify-center rounded-full py-3 px-5 text-sm font-semibold focus:outline-hidden focus-visible:outline-2 focus-visible:outline-offset-2 bg-blue-600 text-white hover:bg-blue-600 hover:text-slate-100 active:bg-blue-800 active:text-slate-300 focus-visible:outline-blue-900" href="/register">
                        Get Started Now
                    </a>
                    <a class="group inline-flex ring-1 items-center justify-center rounded-full py-3 px-5 text-sm focus:outline-hidden ring-blue-300 text-slate-700 hover:text-slate-900 hover:ring-slate-300 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        <x-hugeicons-play class="h-3 w-3 flex-none fill-blue-600 text-blue-600 group-active:fill-current" />
                        <span class="ml-3">Watch demo video</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden px-4 sm:px-6 lg:px-0 mt-12 max-w-5xl mx-auto rounded-xl">
        <div class="shadow-[0_20px_50px_rgba(8,_112,_184,_0.5)] overflow-hidden mx-auto bg-white border border-blue-200 rounded-xl">
            <img class="hidden sm:inline" src="{{ asset('assets/demo.png') }}" alt="demo" />
            <img class="sm:hidden" src="{{ asset('assets/demo-mobile.png') }}" alt="demo" />
        </div>
    </div>

    <div class="px-2 sm:px-6 lg:px-0 mt-12 max-w-4xl mx-auto">
        <div class="border border-slate-200 overflow-hidden shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px] bg-white/70 p-1.5 backdrop-blur-[1px] rounded-[calc(0.75rem+0.375rem)]">
            <div class="px-6 border py-4 border-slate-200 bg-white rounded-xl shadow-2xl shadow-slate-400/20">
                <img class="hidden sm:inline" src="{{ asset('assets/demo.png') }}" alt="demo" />
                <img class="sm:hidden" src="{{ asset('assets/demo-mobile.png') }}" alt="demo" />
            </div>
        </div>
    </div>

    @foreach([1,2,3,4,5,6,7,8] as $i)
        <div class="py-10 md:py-12 md:min-h-screen px-4 sm:px-6 lg:px-0 max-w-5xl mx-auto mt-20 lg:mt-0">
            <div class="mx-auto lg:text-center">
                <h2 class="text-base/7 font-semibold text-indigo-600">FAQs</h2>
                <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl lg:text-balance">
                    Everything You Need to Know
                </p>
                <p class="mt-6 text-gray-600">
                    Have questions about AI-powered YouTube video summaries? Here are the answers to help you get started quickly.
                </p>
            </div>

            <ul role="list" class="*:bg-white/70 mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 md:max-w-none lg:grid-cols-2">
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-clock-05 />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">Save Time, Learn Faster</h3>
                    <p class="mt-2 text-gray-700">Skip the fluff and get key takeaways in seconds—no more wasted hours.</p>
                </li>
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-blocked />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">No Ads, No Filler</h3>
                    <p class="mt-2 text-gray-700">
                        Say goodbye to ads, sponsors, and endless rambling—just pure insights.
                    </p>
                </li>
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-sliders-vertical />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">Custom Summaries, Your Way</h3>
                    <p class="mt-2 text-gray-700">Short, detailed, bullet points, or your own custom prompt—it's all up to you.</p>
                </li>
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-dollar-circle />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">Simple & Affordable Pricing</h3>
                    <p class="mt-2 text-gray-700">
                        Two simple plans, no hidden fees—just unlimited summaries at a low cost.
                    </p>
                </li>
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-key-01 />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">Bring Your Own API Key</h3>
                    <p class="mt-2 text-gray-700">
                        Use your own OpenAI key—no restrictions, just unlimited summaries.
                    </p>
                </li>
                <li class="rounded-2xl border border-gray-200 p-8">
                    <div class="w-fit rounded-xl p-2 bg-slate-50 border border-slate-200">
                        <x-hugeicons-encrypt />
                    </div>
                    <h3 class="mt-6 font-semibold text-gray-900">Encrypted & Private</h3>
                    <p class="mt-2 text-gray-700">
                        Your API key is safely stored with encryption—your data stays protected.
                    </p>
                </li>
            </ul>
        </div>
    @endforeach
    foo
</main>
