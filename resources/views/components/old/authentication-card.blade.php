<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 border border-slate-200 bg-white/70 p-1.5 backdrop-blur-[1px] rounded-[calc(0.75rem+0.375rem)]">
    <div class="w-full sm:max-w-md px-6 border py-4 border-slate-200 bg-white rounded-xl shadow-2xl shadow-slate-400/20">
        {{ $slot }}
    </div>
    </div>
</div>
