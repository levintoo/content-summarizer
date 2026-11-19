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
            @forelse($summaries as $summary)
            <li wire:key="summary-{{ $summary->id }}" wire:loading.class="opacity-50 pointer-events-none" wire:target="deleteSummary('{{ $summary->id }}')">
                @if($summaries->first()->id !== $summary->id)
                    <hr class="w-full border-t border-gray-950/10 dark:border-white/10">
                @endif
                <div class="flex items-center justify-between">
                    <div class="flex flex-1 shrink-0 gap-6 py-6">
                        <div class="shrink-0">
                            <a aria-hidden="true" href="{{ route('summary.show', $summary->id) }}">
                                <img class="shrink-0 h-auto w-36 mt-1 object-cover rounded-lg hover:opacity-80 transition-all hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]" src="https://i.ytimg.com/vi/{{ $summary->content->video_id }}/maxresdefault.jpg" alt="{{ $summary->content->title }} thumbnail" width="463" height="260.33">
                            </a>
                        </div>
                        <div class="space-y-1.5">
                            <div title="{{ $summary->content->title }}" class="text-base font-medium">
                                <a class="line-clamp-1 hover:underline" wire:navigate href="{{ route('summary.show', $summary->id) }}">
                                    {{ $summary->content->title }}
                                </a>
                            </div>
                            <div class="text-sm text-slate-600">
                                {{ $summary->content->channel }}
                            </div>
                            <div class="mt-8 flex flex-wrap gap-2">
                                @if($summary->failed)
                                <x-mini-badge title="Failed" flat negative icon="exclamation-triangle" />
                                @elseif(! $summary->is_ready)
                                <x-mini-badge title="In progress" flat warning icon="clock" />
                                @endif

                                @if($summary->shared)
                                <x-mini-badge title="Sharing" flat info icon="eye" />
                                @else
                                <x-mini-badge title="Not shared" flat secondary icon="eye-slash" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-mini-button slate size="sm" class="border-none" rounded="full" outline icon="ellipsis-vertical" />
                            </x-slot>
                            @if(!$summary->shared)
                            <x-dropdown.item type="button" wire:click.debounce="shareSummary('{{ $summary->id }}')" label="Share Publicly" icon="share" />
                            @else
                            <x-dropdown.item type="button" wire:click.debounce="unShareSummary('{{ $summary->id }}')" label="Quit Sharing" icon="eye-slash" />
                            <x-dropdown.item
                                as="button"
                                label="Copy Link"
                                icon="clipboard-document"
                                x-data="{ copyLink() {
                                    navigator.clipboard.writeText('{{ route('summary.shared', $summary->id) }}')
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
                            @endif
                            <x-dropdown.item type="button" wire:click="deleteSummary('{{ $summary->id }}')" wire:confirm="Delete this summary? This cannot be undone." label="Delete" icon="trash" />
                        </x-dropdown>
                    </div>
                </div>
            </li>
            @empty
            <li>
                <x-empty-state title="No summaries yet" description="Paste a YouTube link and get a structured summary with timestamps in a minute or two.">
                    <x-slot name="icon">
                        <x-hugeicons-note class="size-6" />
                    </x-slot>

                    <x-slot name="actions">
                        <x-button primary wire:navigate href="{{ route('summary.create') }}" label="Create a summary" />
                        <x-button flat wire:navigate href="{{ route('transcript') }}" label="Get a transcript" />
                    </x-slot>
                </x-empty-state>
            </li>
            @endforelse
        </ul>

        @if($summaries->hasPages())
            {{ $summaries->links() }}
        @endif
    </div>
</div>
