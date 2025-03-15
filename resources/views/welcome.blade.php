<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-600 bg-white min-h-screen">
    <!-- header -->
    <header class="hidden">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-blue-600" href="#">
                        <span class="sr-only">Home</span>
                        <x-hugeicons-ai-cloud class="size-8" />
                    </a>
                </div>

                <div class="hidden md:block">
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Features </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Pricing </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a
                            class="rounded-md bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm"
                            href="#"
                        >
                            Login
                        </a>

                        <div class="hidden sm:flex">
                            <a
                                class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-blue-600"
                                href="#"
                            >
                                Register
                            </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button
                            class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a class="block text-blue-600" href="#">
                        <span class="sr-only">Home</span>
                        <x-hugeicons-ai-cloud class="size-8" />
                    </a>
                </div>

                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> See Example </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Features </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Pricing </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <a
                                class="rounded-md bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm"
                                href="#"
                            >
                                Login
                            </a>

                            <div class="hidden sm:flex">
                                <a
                                    class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-blue-600"
                                    href="#"
                                >
                                    Register
                                </a>
                            </div>
                        </div>

                        <div class="block md:hidden">
                            <button
                                class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="size-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16 md:text-center lg:pt-32">
        <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-700 sm:text-6xl">
            <span class="text-blue-600">Save Time,</span> Get the Best of <br /> YouTube Fast!
        </h1>

        <p class="md:mx-auto mt-6 md:max-w-2xl text-md text-slate-500">
            Skip ads, sponsors, and rambling—get straight to the point. Our AI instantly summarizes YouTube videos, giving you key insights in seconds.
        </p>

        <div class="mt-10 flex justify-center gap-x-6">
            <a class="group inline-flex items-center justify-center rounded-full py-2 px-4 text-sm font-semibold focus:outline-hidden focus-visible:outline-2 focus-visible:outline-offset-2 bg-blue-700 text-white hover:bg-blue-600 hover:text-slate-100 active:bg-blue-800 active:text-slate-300 focus-visible:outline-blue-900"
                href="/register">
                Get Started Now
            </a>
            <a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-hidden ring-slate-200 text-slate-700 hover:text-slate-900 hover:ring-slate-300 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300"
               href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
            >
                <svg aria-hidden="true" class="h-3 w-3 flex-none fill-blue-600 group-active:fill-current">
                    <path
                        d="m9.997 6.91-7.583 3.447A1 1 0 0 1 1 9.447V2.553a1 1 0 0 1 1.414-.91L9.997 5.09c.782.355.782 1.465 0 1.82Z"></path>
                </svg>
                <span class="ml-3">Watch demo video</span>
            </a>
        </div>
    </div>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="rounded-2xl py-10 px-10 xl:py-16 xl:px-20 bg-gray-50 flex items-center justify-between flex-col gap-16 lg:flex-row">
                <div class="w-full lg:w-60">
                    <h2
                        class="font-manrope text-4xl font-bold text-gray-900 mb-4 text-center lg:text-left"
                    >
                        Our Stats
                    </h2>
                    <p class="text-sm text-gray-500 leading-6 text-center lg:text-left">
                        Stop wasting time binge watching videos. Join in and save hours!
                    </p>
                </div>
                <div class="w-full lg:w-4/5">
                    <div
                        class="flex flex-col flex-1 gap-10 lg:gap-0 lg:flex-row lg:justify-between"
                    >
                        <div class="block">
                            <div
                                class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left"
                            >
                                260+
                            </div>
                            <span class="text-gray-900 text-center block lg:text-left"
                            >Expert Consultants
                  </span>
                        </div>
                        <div class="block">
                            <div
                                class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left"
                            >
                                975+
                            </div>
                            <span class="text-gray-900 text-center block lg:text-left"
                            >Active Clients
                  </span>
                        </div>
                        <div class="block">
                            <div
                                class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left"
                            >
                                724+
                            </div>
                            <span class="text-gray-900 text-center block lg:text-left"
                            >Projects Delivered</span
                            >
                        </div>
                        <div class="block">
                            <div
                                class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left"
                            >
                                89+
                            </div>
                            <span class="text-gray-900 text-center block lg:text-left"
                            >Orders in Queue</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full flex-col justify-start items-center lg:gap-12 gap-10 inline-flex">
                <div class="w-full flex-col justify-start items-center gap-3 flex">
                    <h2 class="w-full text-center text-gray-900 text-4xl font-bold font-manrope leading-normal">How It Works</h2>
                    <p class="w-full text-center text-gray-500 text-base font-normal leading-relaxed">A detailed breakdown of processes and mechanisms behind a system or product, <br/>simplifying complex concepts for easy understanding.</p>
                </div>
                <div class="w-full justify-start items-center gap-4 flex md:flex-row flex-col">
                    <div class="grow shrink basis-0 flex-col justify-start items-center gap-2.5 inline-flex">
                        <div class="self-stretch flex-col justify-start items-center gap-0.5 flex">
                            <h3 class="self-stretch text-center text-indigo-600 text-4xl font-extrabold font-manrope leading-normal">1</h3>
                            <h4 class="self-stretch text-center text-gray-900 text-xl font-semibold leading-8">Design and Planning</h4>
                        </div>
                        <p class="self-stretch text-center text-gray-400 text-base font-normal leading-relaxed">Outline the website's purpose, target audience, and features. Create wireframes and design mockups to visualize the layout and...</p>
                    </div>
                    <svg class="md:flex hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5.50159 6L11.5018 12.0002L5.49805 18.004M12.5016 6L18.5018 12.0002L12.498 18.004" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="grow shrink basis-0 flex-col justify-start items-center gap-2.5 inline-flex">
                        <div class="self-stretch flex-col justify-start items-center gap-0.5 flex">
                            <h3 class="self-stretch text-center text-indigo-600 text-4xl font-extrabold font-manrope leading-normal">2</h3>
                            <h4 class="self-stretch text-center text-gray-900 text-xl font-semibold leading-8">Development</h4>
                        </div>
                        <p class="self-stretch text-center text-gray-400 text-base font-normal leading-relaxed">Convert the design into a functional website using HTML, CSS, and JavaScript. Ensure the site is responsive and works on various...</p>
                    </div>
                    <svg class="md:flex hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5.50159 6L11.5018 12.0002L5.49805 18.004M12.5016 6L18.5018 12.0002L12.498 18.004" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="grow shrink basis-0 flex-col justify-start items-center gap-2.5 inline-flex">
                        <div class="self-stretch flex-col justify-start items-center gap-0.5 flex">
                            <h3 class="self-stretch text-center text-indigo-600 text-4xl font-extrabold font-manrope leading-normal">3</h3>
                            <h4 class="self-stretch text-center text-gray-900 text-xl font-semibold leading-8">Testing and Deployment</h4>
                        </div>
                        <p class="self-stretch text-center text-gray-400 text-base font-normal leading-relaxed">Test the website for issues like broken links and bugs. After making necessary adjustments, deploy it to a web server and conduct...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-semibold text-slate-700">How It Works</h2>
            <p class="mt-2 text-gray-600">
                Three simple steps to get the key insights from any YouTube video—fast and hassle-free.
            </p>
        </div>
        <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
            <li class="rounded-2xl border border-gray-200 p-8">
                <x-hugeicons-copy-01 class="size-8" />
                <h3 class="mt-6 font-semibold text-gray-900">Paste a YouTube Link</h3>
                <p class="mt-2 text-gray-700">
                    Enter any YouTube video URL to generate a summary—fast and easy.
                </p>
            </li>
            <li class="rounded-2xl border border-gray-200 p-8">
                <x-hugeicons-ai-beautify class="size-8" />
                <h3 class="mt-6 font-semibold text-gray-900">AI Summarizes It</h3>
                <p class="mt-2 text-gray-700">
                    Our AI instantly processes the video, cutting out the fluff and keeping what matters.
                </p>
            </li>
            <li class="rounded-2xl border border-gray-200 p-8">
                <x-hugeicons-time-02 class="size-8" />
                <h3 class="mt-6 font-semibold text-gray-900">Read & Save Time</h3>
                <p class="mt-2 text-gray-700">
                    Get a clear, concise summary in seconds—so you can focus on what’s important.
                </p>
            </li>
        </ul>
    </div>

    <div class="py-20 min-h-screen grid place-items-center">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-semibold text-slate-700">Why Choose Us?</h2>
            <p class="mt-2 text-gray-600">
                Why Waste Hours Watching When You Can Learn in Minutes?
            </p>
        </div>
        <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
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
</div>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base/7 font-semibold text-indigo-600">Deploy faster</h2>
                <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl lg:text-balance">Everything you need to deploy your app</p>
                <p class="mt-6 text-lg/8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                            </div>
                            Push to deploy
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            SSL certificates
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                            Simple queues
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                                </svg>
                            </div>
                            Advanced security
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>


    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-12">
            <div class="lg:w-3/4">
                <h2 class="text-3xl text-gray-700 font-bold lg:text-4xl">
                    Who Is This For?
                </h2>
                <p class="mt-3 text-gray-600">
                    Ever clicked on a YouTube tutorial, only to realize 10 minutes in that it’s not what you needed? Or sat through endless ads, sponsors, and off-topic rambling just to get one simple answer? If that sounds familiar, this tool is built for you.
                </p>
                <p class="mt-5">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium">
                        Sign Up Now
                        <x-hugeicons-arrow-right-01 stroke-width="2" class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" />
                    </a>
                </p>
            </div>
            <!-- End Col -->

            <div class="space-y-6 lg:space-y-10">
                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-11 rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs mx-auto">
                        <x-hugeicons-book-open-01 class="shrink-0 size-5" />
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Students & Professionals
                        </h3>
                        <p class="mt-1 text-gray-600">
                            Break down lectures, meetings, and expert talks into key takeaways so you can learn faster and stay ahead.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-11 rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs mx-auto">
                        <x-hugeicons-presentation-bar-chart-02 class="shrink-0 size-5" />
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Content Creators & Researchers
                        </h3>
                        <p class="mt-1 text-gray-600">
                            Extract key insights from long-form videos, interviews, and documentaries—perfect for scripting, idea generation, and research.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->


                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-11 rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs mx-auto">
                        <x-hugeicons-presentation-bar-chart-02 class="shrink-0 size-5" />
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Anyone Who Values Their Time
                        </h3>
                        <p class="mt-1 text-gray-600">
                            Skip ads, sponsors, and unnecessary chatter. Get straight to the information you need without wasting hours on fluff.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>

    <section class="py-24 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/4">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Enjoy the finest features with our products</h2>
                </div>
                <div class="relative w-full text-center  lg:text-left lg:w-2/4">
                    <p class="text-lg font-normal text-gray-500 mb-5">We provide all the advantages that can simplify all your financial transactions without any further requirements</p>
                    <a href="#" class="flex flex-row items-center justify-center gap-2 text-base font-semibold text-indigo-600 lg:justify-start hover:text-indigo-700 ">Button CTA <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 15L11.0858 11.4142C11.7525 10.7475 12.0858 10.4142 12.0858 10C12.0858 9.58579 11.7525 9.25245 11.0858 8.58579L7.5 5" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-center items-center  gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
                <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.7222 11.6667V7.22225C24.7222 5.99495 23.7273 5 22.5 5H4.72222C3.49492 5 2.5 5.99492 2.5 7.22222V22.7778C2.5 24.0051 3.49492 25 4.72222 25H22.5C23.7273 25 24.7222 24.005 24.7222 22.7777V17.7778M20.8333 17.7778H25.2778C26.5051 17.7778 27.5 16.7829 27.5 15.5556V13.8889C27.5 12.6616 26.5051 11.6667 25.2778 11.6667H20.8333C19.606 11.6667 18.6111 12.6616 18.6111 13.8889V15.5556C18.6111 16.7829 19.606 17.7778 20.8333 17.7778Z" stroke="#4F46E5" stroke-width="2"></path>
                        </svg>

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Easy Payment</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        We Provide Various Methods For You To Carry Out All Transactions Related To Your Finances
                    </p>
                </div>
                <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.375 15.8571C16.1009 15.8571 17.5 14.458 17.5 12.7321C17.5 11.0062 16.1009 9.6071 14.375 9.6071C12.6491 9.6071 11.25 11.0062 11.25 12.7321C11.25 14.458 12.6491 15.8571 14.375 15.8571ZM14.375 15.8571V20.8571M3.75 13.2264V15.2343C3.75 17.6868 3.75 18.9131 4.27747 19.9685C4.80493 21.0239 5.78567 21.76 7.74715 23.2322L8.57248 23.8516C11.4626 26.0208 12.9077 27.1054 14.5753 27.1054C16.243 27.1054 17.688 26.0208 20.5782 23.8516L21.4035 23.2322C23.365 21.76 24.3457 21.0239 24.8732 19.9685C25.4006 18.9131 25.4006 17.6868 25.4006 15.2343V13.2264C25.4006 9.95932 25.4006 8.32576 24.546 7.05852C23.6913 5.79128 22.1768 5.17918 19.1477 3.95499L18.3223 3.62144C16.4724 2.87381 15.5475 2.5 14.5753 2.5C13.6032 2.5 12.6782 2.87381 10.8283 3.62144L10.003 3.95499C6.97389 5.17919 5.45934 5.79128 4.60467 7.05852C3.75 8.32576 3.75 9.95932 3.75 13.2264Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Safe Transaction</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        We have the most up-to-date security to support the security of all our customers in carrying out all transactions.
                    </p>
                </div>
                <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.0067 10V15.6652C15.0067 16.0358 15.1712 16.3873 15.4556 16.6248L18.75 19.375M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Fast Customer Service </h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        Provide Customer Service For Those Of You Who Have Problems 24 Hours A Week
                    </p>
                </div>
                <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                    <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 14.7875L13.0959 17.8834C13.3399 18.1274 13.7353 18.1275 13.9794 17.8838L20.625 11.25M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Quick Transaction</h4>
                    <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                        We provide faster transaction speeds than competitors, so money arrives and is received faster.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h6 class="text-lg text-indigo-600 font-medium text-center mb-2">
                    FAQs
                </h6>
                <h2
                    class="text-4xl font-manrope text-center font-bold text-gray-900 leading-[3.25rem]"
                >
                    Frequently asked questions
                </h2>
            </div>

            <div class="accordion-group" data-accordion="default-accordion">
                <div
                    class="accordion py-8 px-6 border-b border-solid border-gray-200 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50 active"
                    id="basic-heading-one-with-arrow"
                >
                    <button
                        class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
                        aria-controls="basic-collapse-one-with-arrow"
                    >
                        <h5>How do I update my billing information?</h5>
                        <svg
                            class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </svg>
                    </button>
                    <div
                        id="basic-collapse-one-with-arrow"
                        class="accordion-content w-full px-0 overflow-hidden"
                        aria-labelledby="basic-heading-one-with-arrow"
                        style="max-height: 250px;"
                    >
                        <p class="text-base text-gray-900 leading-6">
                            To contact customer support, look for a 'Contact us' or 'Help'
                            button or link on the website or platform. You may be able to
                            email, call, or chat with customer support for assistance.
                        </p>
                    </div>
                </div>
                <div
                    class="accordion py-8 px-6 border-b border-solid border-gray-200 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50"
                    id="basic-heading-two-with-arrow"
                >
                    <button
                        class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:text-indigo-600"
                        aria-controls="basic-collapse-two-with-arrow"
                    >
                        <h5>How can I contact customer support?</h5>
                        <svg
                            class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </svg>
                    </button>
                    <div
                        id="basic-collapse-two-with-arrow"
                        class="accordion-content w-full px-0 overflow-hidden"
                        aria-labelledby="basic-heading-two-with-arrow"
                    >
                        <p class="text-base text-gray-900 leading-6">
                            To contact customer support, look for a 'Contact us' or 'Help'
                            button or link on the website or platform. You may be able to
                            email, call, or chat with customer support for assistance.
                        </p>
                    </div>
                </div>
                <div
                    class="accordion py-8 px-6 border-b border-solid border-gray-200 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50"
                    id="basic-heading-three-with-arrow"
                >
                    <button
                        class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:text-indigo-600"
                        aria-controls="basic-collapse-three-with-arrow"
                    >
                        <h5>How do I update my profile information?</h5>
                        <svg
                            class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </svg>
                    </button>
                    <div
                        id="basic-collapse-three-with-arrow"
                        class="accordion-content w-full px-0 overflow-hidden"
                        aria-labelledby="basic-heading-three-with-arrow"
                    >
                        <p class="text-base text-gray-900 leading-6">
                            To contact customer support, look for a 'Contact us' or 'Help'
                            button or link on the website or platform. You may be able to
                            email, call, or chat with customer support for assistance.
                        </p>
                    </div>
                </div>
                <div
                    class="accordion py-8 px-6 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50"
                    id="basic-heading-three-with-arrow"
                >
                    <button
                        class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:text-indigo-600"
                        aria-controls="basic-collapse-three-with-arrow"
                    >
                        <h5>How do I find my purchase history?</h5>
                        <svg
                            class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </svg>
                    </button>
                    <div
                        id="basic-collapse-three-with-arrow"
                        class="accordion-content w-full px-0 overflow-hidden"
                        aria-labelledby="basic-heading-three-with-arrow"
                    >
                        <p class="text-base text-gray-900 leading-6">
                            To contact customer support, look for a 'Contact us' or 'Help'
                            button or link on the website or platform. You may be able to
                            email, call, or chat with customer support for assistance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="relative isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-1155/678 w-[72.1875rem] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-4xl text-center">
            <h2 class="text-base/7 font-semibold text-indigo-600">Pricing</h2>
            <p class="mt-2 text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-6xl">Choose the right plan for you</p>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-center text-lg font-medium text-pretty text-gray-600 sm:text-xl/8">Choose an affordable plan that’s packed with the best features for engaging your audience, creating customer loyalty, and driving sales.</p>
        <div class="mx-auto mt-16 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
            <div class="rounded-3xl rounded-t-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-tr-none lg:rounded-bl-3xl">
                <h3 id="tier-hobby" class="text-base/7 font-semibold text-indigo-600">Hobby</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-gray-900">$29</span>
                    <span class="text-base text-gray-500">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-600">The perfect plan if you&#039;re just getting started with our product.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        25 products
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Up to 10,000 subscribers
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        24-hour support response time
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-hobby" class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 ring-1 ring-indigo-200 ring-inset hover:ring-indigo-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get started today</a>
            </div>
            <div class="relative rounded-3xl bg-gray-900 p-8 ring-1 shadow-2xl ring-gray-900/10 sm:p-10">
                <h3 id="tier-enterprise" class="text-base/7 font-semibold text-indigo-400">Enterprise</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-white">$99</span>
                    <span class="text-base text-gray-400">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-300">Dedicated support and infrastructure for your company.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-300 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Unlimited products
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Unlimited subscribers
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Dedicated support representative
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Marketing automations
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Custom integrations
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-enterprise" class="mt-8 block rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 sm:mt-10">Get started today</a>
            </div>
        </div>
    </div>


    <!-- FAQ -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <!-- Title -->
        <div class="max-w-2xl mx-auto md:text-center mb-10 lg:mb-14">
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

    <!-- Footer -->
    <footer class="">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 sm:px-6 lg:px-8">
            <div
                class="border-t border-gray-100 pt-8 sm:flex sm:items-center sm:justify-between"
            >
                <ul class="flex flex-wrap justify-center gap-4 text-xs lg:justify-end">
                    <li>
                        <a href="#" class="text-gray-500 transition hover:opacity-75"> Terms & Conditions </a>
                    </li>

                    <li>
                        <a href="#" class="text-gray-500 transition hover:opacity-75"> Privacy Policy </a>
                    </li>
                </ul>

                <ul class="mt-8 flex justify-center gap-6 sm:mt-0 lg:justify-end">
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
        </div>
    </footer>

    </body>
</html>
