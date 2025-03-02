<div>
     <div class="lg:w-[55%] mx-auto space-y-6 lg:space-y-8 pb-4 px-3 lg:px-0">
         <h3 class="text-lg font-semibold text-gray-900 leading-tight">
             Recent Summaries
         </h3>

        <div class="w-full flex-auto space-y-6 pb-4">
         @foreach($summaries as $summary)
                <div class="flex justify-between items-center rounded-lg">
                    <div class="flex-1 group relative flex gap-x-3 md:gap-x-6">
                        <img class="h-auto w-36 mt-1 object-cover rounded-lg hover:opacity-80 transition-all hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]" src="https://i.ytimg.com/vi/{{ $summary->content->video_id }}/maxresdefault.jpg" alt="Attaching Rockets to Cops | GTA 5 RP thumbnail" width="463" height="260.33">
                        <div>
                            <a wire:navigate href="{{ route('summary.show', $summary->id) }}" class="hover:underline text-gray-600 line-clamp-1 md:line-clamp-2">
                                {{ $summary->content->title }}
                            </a>
                            <p class="mt-1 mb-1 font-medium text-gray-600 line-clamp-1">
                                {{ $summary->content->channel }}
                            </p>
                            @if(fake()->numberBetween(0,1) === 1) <x-badge flat info label="Public" /> @endif
                        </div>
                    </div>

                    <div class="">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-mini-button slate size="sm" class="border-none" rounded="full" outline icon="ellipsis-horizontal" />
                            </x-slot>

                            <x-dropdown.item wire:navigate href="/" label="Share Publicly" icon="share" />
                            <x-dropdown.item type="button" wire:click="deleteSummary('{{ $summary->id }}')" label="Delete" icon="trash" />
                        </x-dropdown>
                    </div>
                </div>
         @endforeach
            {{ $summaries->links() }}
        </div>
     </div>
</div>
