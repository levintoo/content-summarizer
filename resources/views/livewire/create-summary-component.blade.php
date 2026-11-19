@push('seometa')
    <!-- Primary Meta Tags -->
    <title>Create Summary - {{ config('app.name') }}</title>
@endpush

<div class="flex flex-col justify-between min-h-[calc(100vh-60px)]">
    <div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto flex-1 flex flex-col justify-center -mt-[60px]">
        <div class="mb-4 justify-center flex items-center gap-3">
            <x-hugeicons-ai-cloud class="text-blue-500 size-10 rounded-lg" />


        <h1 class="text-center text-xl font-semibold text-slate-700">
            I'm {{ config('app.name') }}
        </h1>
        </div>

        <p class="mb-8 text-center text-slate-600">
            Paste a YouTube video link below to generate summary.
        </p>

        <form wire:submit="submit" class="relative border rounded-xl border-gray-200 focus:border-blue-500 bg-gray-50/50">
            <input
                wire:model="link"
                type="text"
                autofocus
                class="bg-transparent w-full min-h-[52px] max-h-[200px] rounded-xl px-4 pt-4 mb-4.5 text-gray-700 placeholder:text-gray-700/70 border-0 resize-none focus:ring-0 focus:outline-none leading-[1.2]"
                placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                id="videoLink"
                name="videoLink"
                autocomplete="none"
            />

            <div class="min-h-12">
                <div class="bg-gray-50/30 absolute left-3 bottom-3 flex items-center gap-2">
                    <button
                        type="button"
                        label="Open" x-on:click="$openModal('summaryConfigurationModal')"
                        class="border cursor-pointer rounded-full p-2 bg-white focus:ring-4 focus:ring-blue-100 focus:outline-none"
                    >
                        <x-hugeicons-sliders-horizontal class="text-gray-500 size-4.5" stroke-width="2" />
                    </button>

                    <x-modal-card title="Customize Summary" name="summaryConfigurationModal" blur="sm">
                        <div class="grid grid-cols-1 gap-4">
                            <x-input type="text" wire:model.live.debounce="language" corner="Yeap, just key it in" id="language" rounded="lg" shadow="none" size="sm" label="Preferred language" icon="language" />
                            <x-select wire:model.live.debounce="summary_length" rounded="lg" shadow="none" searchable label="Preferred summary length" name="summary_length" icon="bars-3-center-left">
                                @forelse(\App\Enums\SummaryLengthEnum::cases() as $enum)
                                    <x-select.option label="{{ ucfirst($enum->name) }}" value="{{ $enum->value }}" />
                                @empty
                                @endforelse
                            </x-select>
                        </div>

                        <x-slot name="footer" class="flex justify-between gap-x-4">
                            <div class="flex gap-x-4">
                                <x-button flat label="Close" x-on:click="close" />
                            </div>
                        </x-slot>
                    </x-modal-card>

                    @if($summary_length)
                        <span
                            class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                        >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-google-doc stroke-width="2" class="size-4.5" />
                        </div>
                        <span class="text-sm text-sky-500">{{ ucfirst(\App\Enums\SummaryLengthEnum::from($summary_length)->name) }}</span>
                    </span>
                    @endif

                    @if($language)
                        <span
                            class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                        >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-language-circle stroke-width="2" class="size-4.5" />
                        </div>
                        <span class="text-sm text-sky-500">{{ $language }}</span>
                    </span>
                    @endif
                </div>

                <div class="bg-gray-50/30 absolute right-3 bottom-3">
                    <button
                        wire:loading.attr="disabled"
                        wire:target="submit"
                        type="submit"
                        title="Summarize"
                        class="cursor-pointer rounded-full p-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:cursor-wait disabled:opacity-70"
                    >
                        <x-hugeicons-forward-02 wire:loading.remove wire:target="submit" class="text-white size-4.5" stroke-width="2" />
                        <x-spinner wire:loading wire:target="submit" class="text-white size-4.5" />
                    </button>
                </div>
            </div>
        </form>

        <p wire:loading wire:target="submit" class="mt-3 text-center text-sm text-slate-500">
            Checking the video and starting your summary...
        </p>
    </div>
</div>
