@push('seometa')
    <title>{{ $info['title'] ?? 'Get Transcript' }} - {{ config('app.name') }}</title>
@endpush

<div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto py-8 space-y-6">
    <div class="space-y-2">
        <div class="flex items-center gap-3">
            <x-hugeicons-closed-caption class="text-blue-500 size-8" />
            <h1 class="text-xl font-semibold text-slate-700">Get Transcript</h1>
        </div>
        <p class="text-slate-600">Paste a YouTube link to get the full transcript with timestamps. No AI key needed.</p>
    </div>

    <form wire:submit="submit" class="space-y-2">
        <div class="flex gap-2">
            <input
                wire:model="link"
                type="text"
                autofocus
                class="flex-1 rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-gray-700 placeholder:text-gray-500 focus:border-blue-500 focus:ring-0"
                placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                aria-label="YouTube link"
                autocomplete="off"
            />

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-3 font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 focus:outline-none disabled:opacity-60"
            >
                <span wire:loading.remove wire:target="submit">Get transcript</span>
                <span wire:loading wire:target="submit">Loading...</span>
            </button>
        </div>

        @error('link')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </form>

    @if($videoId !== '')
        <div wire:loading.flex wire:target="submit" class="items-center gap-2 text-slate-600">
            <x-hugeicons-ai-cloud class="animate-bounce text-blue-500 size-5" />
            Fetching the transcript...
        </div>

        <div wire:loading.remove wire:target="submit" class="space-y-4">
            @if($error)
                <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-amber-800">{{ $error }}</div>
            @else
                <div
                    x-data="{
                        query: '',
                        showTimestamps: true,
                        matches(text) { return this.query === '' || text.toLowerCase().includes(this.query.toLowerCase()) },
                        copyAll() {
                            const text = Array.from(this.$refs.lines.querySelectorAll('[data-line]'))
                                .map(el => (this.showTimestamps ? el.dataset.timestamp + ' ' : '') + el.dataset.text)
                                .join('\n');
                            navigator.clipboard.writeText(text).then(() => $wireui.notify({ icon: 'success', title: 'Transcript copied' }));
                        },
                    }"
                    class="space-y-4"
                >
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <a href="https://www.youtube.com/watch?v={{ $videoId }}" target="_blank" rel="noopener nofollow" class="font-medium text-gray-800 hover:text-blue-600">
                                {{ $info['title'] ?? 'YouTube video' }}
                            </a>
                            <p class="text-sm text-gray-600">{{ $info['channel'] ?? 'YouTube' }} · {{ count($lines) }} lines</p>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <x-mini-button @click="copyAll" title="Copy transcript" rounded flat gray interaction="primary">
                                <x-hugeicons-copy-01 class="size-4.5" />
                            </x-mini-button>
                            <x-mini-button wire:click="download" title="Download as text" rounded flat gray interaction="primary">
                                <x-hugeicons-file-01 class="size-4.5" />
                            </x-mini-button>
                            <x-mini-button wire:click="clear" title="Clear" rounded flat gray interaction="negative" icon="x-mark" />
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <input
                            x-model.debounce.200ms="query"
                            type="search"
                            placeholder="Search the transcript"
                            aria-label="Search the transcript"
                            class="flex-1 rounded-lg border-gray-200 px-3 py-2 text-sm focus:border-blue-500 focus:ring-0"
                        />
                        <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" x-model="showTimestamps" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            Show timestamps
                        </label>
                    </div>

                    <ol x-ref="lines" class="max-h-[65vh] overflow-y-auto rounded-xl border border-gray-200 bg-white divide-y divide-gray-100">
                        @foreach($lines as $line)
                            <li
                                data-line
                                data-timestamp="{{ $line['timestamp'] }}"
                                data-text="{{ $line['text'] }}"
                                x-show="matches($el.dataset.text)"
                                class="flex gap-3 px-4 py-2 text-gray-700"
                            >
                                <a
                                    x-show="showTimestamps"
                                    href="https://www.youtube.com/watch?v={{ $videoId }}&t={{ (int) $line['start'] }}s"
                                    target="_blank"
                                    rel="noopener nofollow"
                                    class="w-16 shrink-0 font-mono text-sm text-blue-600 hover:underline"
                                >{{ $line['timestamp'] }}</a>
                                <span>{{ $line['text'] }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    @endif
</div>
