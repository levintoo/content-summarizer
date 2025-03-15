<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-gray-600 min-h-screen">

    <header class="fixed w-full bg-white shadow-sm z-10" x-data="{ isOpen: false }">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="text-2xl font-bold text-purple-600">VideoSum</a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-700 hover:text-purple-600">Features</a>
                <a href="#how-it-works" class="text-gray-700 hover:text-purple-600">How It Works</a>
                <a href="#pricing" class="text-gray-700 hover:text-purple-600">Pricing</a>
                <a href="#testimonials" class="text-gray-700 hover:text-purple-600">Testimonials</a>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-purple-600">Login</a>
                <a href="#cta" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">Get Started</a>
            </div>

            <div class="md:hidden">
                <button @click="isOpen = !isOpen" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg">
                <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50">Features</a>
                <a href="#how-it-works" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50">How It Works</a>
                <a href="#pricing" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50">Pricing</a>
                <a href="#testimonials" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50">Testimonials</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50">Login</a>
                <a href="#cta" class="block px-3 py-2 rounded-md text-base font-medium bg-purple-600 text-white hover:bg-purple-700">Get Started</a>
            </div>
        </div>
    </header>


    <!-- Main CTA Section -->
    <section id="cta" class="pt-24 pb-16 bg-gradient-to-r from-purple-600 to-indigo-600">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-white mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Get the key points from any YouTube video in seconds</h1>
                <p class="text-xl mb-8">Stop wasting time. VideoSum uses AI to extract the most important information from YouTube videos so you can consume content faster.</p>

                <div x-data="{ url: '' }">
                    <div class="flex flex-col sm:flex-row">
                        <input
                            type="text"
                            x-model="url"
                            placeholder="Paste a YouTube URL"
                            class="px-4 py-3 rounded-l-lg w-full sm:w-2/3 text-gray-900 mb-2 sm:mb-0"
                        >
                        <button
                            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-r-lg transition"
                            @click="if(url) alert('Demo: Video summarization started!')"
                        >
                            Summarize Now
                        </button>
                    </div>
                    <p class="text-sm mt-3 text-gray-200">No credit card required. 3 free summaries daily.</p>
                </div>
            </div>

            <div class="md:w-1/2 md:pl-12">
                <div class="bg-white p-2 rounded-lg shadow-xl">
                    <img src="/api/placeholder/600/400" alt="VideoSum demo" class="rounded w-full">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-purple-600 hover:bg-purple-700 text-white rounded-full p-4 transition">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <p class="text-4xl font-bold text-purple-600 mb-2">2.5M+</p>
                    <p class="text-gray-600">Videos Summarized</p>
                </div>
                <div class="p-6">
                    <p class="text-4xl font-bold text-purple-600 mb-2">98%</p>
                    <p class="text-gray-600">User Satisfaction</p>
                </div>
                <div class="p-6">
                    <p class="text-4xl font-bold text-purple-600 mb-2">75%</p>
                    <p class="text-gray-600">Time Saved</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose VideoSum?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Save Time</h3>
                    <p class="text-gray-600">Get the main points from a 30-minute video in just 2 minutes of reading.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">AI-Powered</h3>
                    <p class="text-gray-600">Our advanced AI extracts key points, insights, and action items without missing important details.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Multiple Formats</h3>
                    <p class="text-gray-600">Get summaries as text, bullet points, or listen to audio versions on the go.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-purple-600">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Paste YouTube URL</h3>
                    <p class="text-gray-600">Simply copy and paste the URL of any YouTube video you want summarized.</p>
                </div>

                <div class="text-center p-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-purple-600">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">AI Processing</h3>
                    <p class="text-gray-600">Our AI watches and analyzes the video, identifying key points and themes.</p>
                </div>

                <div class="text-center p-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-purple-600">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Get Your Summary</h3>
                    <p class="text-gray-600">Receive a concise summary of the video in your preferred format in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Use Cases -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Perfect For</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Students</h3>
                    <p class="text-gray-600">Quickly grasp complex educational content and lectures.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Professionals</h3>
                    <p class="text-gray-600">Stay updated on industry trends without sitting through long videos.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Researchers</h3>
                    <p class="text-gray-600">Quickly scan through relevant video content for your research.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Content Creators</h3>
                    <p class="text-gray-600">Research topics quickly and get inspiration for your own videos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4">Simple, Transparent Pricing</h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Choose the plan that works for your needs. All plans include our core features. Upgrade, downgrade, or cancel anytime.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto" x-data="{ annual: true }">
                <div class="flex justify-center mb-8 col-span-1 md:col-span-3">
                    <div class="bg-gray-100 p-1 rounded-lg inline-flex">
                        <button
                            @click="annual = true"
                            :class="annual ? 'bg-white shadow-sm' : ''"
                            class="px-4 py-2 rounded-md text-sm font-medium transition"
                        >
                            Annual (Save 20%)
                        </button>
                        <button
                            @click="annual = false"
                            :class="!annual ? 'bg-white shadow-sm' : ''"
                            class="px-4 py-2 rounded-md text-sm font-medium transition"
                        >
                            Monthly
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4">Basic</h3>
                        <div class="text-purple-600 mb-6">
                            <span class="text-3xl font-bold" x-text="annual ? '$4.99' : '$7.99'"></span>
                            <span class="text-gray-600 text-sm">/ month</span>
                        </div>
                        <p class="text-gray-600 mb-6">Perfect for casual users who need occasional summaries.</p>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>30 video summaries / month</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Text summaries</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Basic dashboard</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#" class="block text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">Get Started</a>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-xl overflow-hidden border-2 border-purple-500 transform scale-105">
                    <div class="bg-purple-500 text-white text-center py-2 text-sm font-semibold">MOST POPULAR</div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4">Pro</h3>
                        <div class="text-purple-600 mb-6">
                            <span class="text-3xl font-bold" x-text="annual ? '$9.99' : '$14.99'"></span>
                            <span class="text-gray-600 text-sm">/ month</span>
                        </div>
                        <p class="text-gray-600 mb-6">Ideal for regular users who need more summaries.</p>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>100 video summaries / month</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Text & bullet point formats</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Save & organize summaries</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Priority processing</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#" class="block text-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg transition">Get Started</a>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4">Business</h3>
                        <div class="text-purple-600 mb-6">
                            <span class="text-3xl font-bold" x-text="annual ? '$24.99' : '$34.99'"></span>
                            <span class="text-gray-600 text-sm">/ month</span>
                        </div>
                        <p class="text-gray-600 mb-6">For teams and power users with advanced needs.</p>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Unlimited summaries</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>All summary formats + audio</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Team sharing & collaboration</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>API access</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#" class="block text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>
</html>
