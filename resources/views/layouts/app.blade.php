<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    @stack('seometa')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
    @livewireStyles

    @wireUiScripts
</head>
<body class="font-sans antialiased">
<div x-data="{ open: false, toggleOpen() { this.open = !this.open } }">

    <div aria-hidden @mouseover="open = !open" class="hidden lg:block left-0 h-screen w-[2px] fixed z-70"></div>

    <main class="relative">
        <header class="w-full z-50 top-0 py-3 px-2 lg:px-5 bg-white fixed inline-flex justify-between">
            <x-mini-button title="Toggle Sidebar" @click="toggleOpen()" rounded flat gray interaction="info">
                <x-hugeicons-sidebar-left />
            </x-mini-button>

            <div class="inline-flex gap-2">
                <x-mini-button title="New Summary" wire:navigate href="{{ route('summary.create') }}" rounded flat gray interaction="info">
                    <x-hugeicons-pencil-edit-02 />
                </x-mini-button>

                <x-dropdown>
                    <x-slot name="trigger">
                        <x-mini-button title="Toggle dropdown" rounded flat gray interaction="info">
                            <x-hugeicons-settings-01 />
                        </x-mini-button>
                    </x-slot>

                    <x-dropdown.header label="{{ auth()->user()->name }}">
                        <x-dropdown.item wire:navigate href="{{ route('profile.show') }}" label="Manage Profile" icon="user" />
                        <x-dropdown.item wire:navigate href="{{ route('settings') }}" label="Settings" icon="cog-6-tooth" />
                        <x-dropdown.item wire:navigate href="{{ route('account') }}" label="Account & Billing" icon="credit-card" />
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown.item separator label="Log Out" href="{{ route('logout') }}" @click.prevent="$root.submit();"/>
                        </form>
                    </x-dropdown.header>
                </x-dropdown>
            </div>

            <div x-cloak x-show="open" x-transition.opacity class="pointer-events-none inset-0 w-full h-screen fixed bg-slate-900/50 z-30"></div>

            <nav
                x-cloak
                x-show="open"
                @click.outside="toggleOpen()"
                class="fixed h-screen top-0 left-0 w- [350px] w-[21rem] z-50 p-2"
                x-transition:enter="transition transform ease-in duration-200"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform ease-out duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
            >
                <div class="shadow-2xl space-y-4 shadow-blue-300/20 h-[calc(100vh-16px)] overflow-clip bg-gray-50 border-r border-slate-200 rounded-xl *:px-4 py-5">
                    <div class="flex justify-between items-center gap-2">
                        <a wire:navigate href="{{ route('summaries') }}" class="items-center gap-4 p-2 inline-flex rounded-xl">
                            <div
                                class="flex aspect-square size-9 items-center justify-center">
                                <x-hugeicons-ai-cloud class="size-9 text-blue-500" />
                            </div>

                            <div class="flex flex-col gap-0.5 leading-none">
                                <span class="font-semibold">{{ config('app.name') }}</span>
                                <span class="text-sm">v1.0.0</span>
                            </div>
                        </a>

                        <x-mini-button @click="toggleOpen()" rounded flat gray interaction="info">
                            <x-hugeicons-sidebar-left />
                        </x-mini-button>
                    </div>

                    <ul class="space-y-3 overflow-y-auto h-full pb-3">
                        <li>
                            <x-nav-link wire:navigate href="{{ route('summary.create') }}" active="{{ request()->routeIs('summary.create') }}">
                                <x-hugeicons-pencil-edit-02 class="size-5.5"/>
                                <span>Create Summary</span>
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link wire:navigate href="{{ route('summaries') }}" active="{{ request()->routeIs('summaries') }}">
                                <x-hugeicons-note class="size-5.5"/>
                                <span>Recent Summaries</span>
                            </x-nav-link>
                        </li>

                        <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-slate-200 to-transparent rounded-full"></div>

                        <p class="text-gray-800 py-2 px-3 font-medium">
                            Settings
                        </p>

                        <li>
                            <x-nav-link wire:navigate href="{{ route('profile.show') }}" active="{{ request()->routeIs('profile.show') }}">
                                <x-hugeicons-edit-user-02 class="size-5.5"/>
                                <span>Manage Profile</span>
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link wire:navigate href="{{ route('account') }}" active="{{ request()->routeIs('account') }}">
                                <x-hugeicons-credit-card-pos class="size-5.5"/>
                                <span>Account & Billing</span>
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link wire:navigate href="{{ route('settings') }}" active="{{ request()->routeIs('settings') }}">
                                <x-hugeicons-ai-setting class="size-5.5"/>
                                <span>Settings</span>
                            </x-nav-link>
                        </li>

                        <p class="text-gray-800 py-2 px-3 font-medium">
                            Recent Summaries
                        </p>

                        @foreach(\App\Models\Summary::query()->whereBelongsTo(auth()->user())->latest()->limit(5)->select(['id', 'content_id'])->with(['content:id,title'])->get() as $summary)
                            <li>
                                <x-nav-link wire:navigate href="{{ route('summary.show', $summary->id) }}" active="{{ route('summary.show', $summary->id) === request()->url() }}">
                                    <div class="shrink-0 text-transparent bg-blue-600 size-[6px] rounded-full">.</div>
                                    <span class="line-clamp-1">{{ $summary->content->title }}</span>
                                </x-nav-link>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>

        <div class="mt-[60px] min-h-[calc(100vh-60px)]">
            {{ $slot }}
        </div>
    </main>
</div>
    <x-notifications position="top-end" />

    <x-dialog z-index="z-50" blur="md" align="center" />

    @stack('modals')

    @stack('scripts')

    @wireUiScripts

    @livewireScripts
</body>
</html>
