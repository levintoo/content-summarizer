<x-guest-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-old.authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 border border-slate-200 bg-white/70 p-1.5 backdrop-blur-[1px] sm:rounded-[calc(0.75rem+0.375rem)]">
                <div class="prose dark:prose-invert w-full sm:max-w-2xl px-6 border py-4 border-slate-200 bg-white sm:rounded-xl shadow-2xl shadow-slate-400/20">
                    {!! $terms !!}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
