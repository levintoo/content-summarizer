@push('seometa')
    <!-- Primary Meta Tags -->
    <title>Recent Summaries - {{ config('app.name') }}</title>
@endpush

<div>
    <div class="lg:w-[55%] mx-auto px-3 lg:px-0 space-y-6 lg:space-y-8 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 leading-tight">
            Recent Summaries
        </h3>

        <ul>
            @foreach($summaries as $summary)
            <li>
                @if($summaries->first()->id !== $summary->id)
                    <hr class="w-full border-t border-gray-950/10 dark:border-white/10">
                @endif
                <div class="flex items-center justify-between">
                    <div class="flex flex-1 shrink-0 gap-6 py-6">
                        <div class="shrink-0">
                            <a aria-hidden="true" href="{{ route('summary.show', $summary->id) }}">
                                <img class="shrink-0 h-auto w-36 mt-1 object-cover rounded-lg hover:opacity-80 transition-all hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]" src="https://i.ytimg.com/vi/{{ $summary->content->video_id }}/maxresdefault.jpg" alt="Attaching Rockets to Cops | GTA 5 RP thumbnail" width="463" height="260.33">
                            </a>
                        </div>
                        <div class="space-y-1.5">
                            <div title="{{ $summary->content->title }}" class="text-base font-medium">
                                <a class="line-clamp-1" wire:navigate href="{{ route('summary.show', $summary->id) }}">
                                    {{ $summary->content->title }}
                                </a>
                            </div>
                            <div class="text-sm text-slate-600">
                                {{ $summary->content->channel }}
                            </div>
                            @if(fake()->numberBetween(0,1) === 1)
                                <x-badge flat class="!px-1.5 !py-0.5 text-sm/5 sm:text-xs/5">shared</x-badge>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-mini-button slate size="sm" class="border-none" rounded="full" outline icon="ellipsis-vertical" />
                            </x-slot>

                            <x-dropdown.item wire:navigate href="/" label="Share Publicly" icon="share" />
                            <x-dropdown.item
                                as="button"
                                label="Copy Link"
                                icon="clipboard-document"
                                x-data="{ copyLink() {
                                    navigator.clipboard.writeText('{{ route('summary.show', $summary->id) }}')
                                    .then(() => {
                                        $wireui.notify({
                                            icon: 'success',
                                            title: 'Link copied successfully',
                                        })
                                    })
                                    .catch(err => console.error('Error copying text: ', err));
                                }}"
                                @click="copyLink()"
                            />
                            <x-dropdown.item type="button" wire:click="deleteSummary('{{ $summary->id }}')" label="Delete" icon="trash" />
                        </x-dropdown>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{ $summaries->links() }}
    </div>
</div>
