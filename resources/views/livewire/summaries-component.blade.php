<div>
     <div class="lg:w-[55%] mx-auto space-y-6 lg:space-y-8 pb-4 px-3 lg:px-0">
         <div class="lg:px-4">
             <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                 Recent Summaries
             </h3>
         </div>

        <div class="w-full flex-auto">
                     <div class="">
         @foreach([1,2,3,4,5] as $summary)
                         <div class="flex justify-between items-center hover:bg-gray-50 rounded-lg">
                             <div class="flex-1 group relative flex gap-x-3 md:gap-x-6 px-2 lg:px-4 py-4">
                                 <img class="h-auto w-32 mt-1 object-cover rounded-lg hover:opacity-80 transition-all hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]" src="https://i.ytimg.com/vi/{{ 'BS3HgiHPYcs' }}/maxresdefault.jpg" alt="Attaching Rockets to Cops | GTA 5 RP thumbnail" width="463" height="260.33">
                                 <div>
                                     <a href="#" class="hover:underline text-gray-600 line-clamp-1 md:line-clamp-2">
                                         Been So Good (feat. Tiffany Hudson) | Elevation Worship
                                     </a>
                                     <p class="mt-1 mb-1 font-medium text-gray-600 line-clamp-1">Elanip</p>
                                     @if(fake()->numberBetween(0,1) === 1) <x-badge flat info label="Public" /> @endif
                                 </div>
                             </div>

                             <div class="lg:px-4 py-4">
                                 <x-dropdown>
                                     <x-slot name="trigger">
                                         <x-mini-button slate size="sm" class="border-none" rounded="full" outline icon="ellipsis-horizontal" />
                                     </x-slot>

                                     <x-dropdown.item wire:navigate href="/" label="Share Publicly" icon="share" />
                                     <x-dropdown.item wire:navigate href="/" label="Delete" icon="trash" />
                                 </x-dropdown>
                             </div>
                         </div>
         @endforeach
                     </div>
                 </div>

     </div>
</div>
