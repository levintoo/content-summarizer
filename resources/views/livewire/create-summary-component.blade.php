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

        <form wire:submit="confirmSimple" class="relative border rounded-xl border-gray-200 focus:border-blue-500 bg-gray-50/50">
            <input
                autofocus
                class="bg-transparent w-full min-h-[52px] max-h-[200px] rounded-xl px-4 pt-4 mb-4.5 text-gray-700 placeholder:text-gray-700/70 border-0 resize-none focus:ring-0 focus:outline-none leading-[1.2]"
                placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                id="ai-input"
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
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-select
                                label="Summary Length"
                                placeholder="Select one"
                                :options="['Brief', 'Balanced', 'Extensive']"
                            />

                            <x-select
                                label="Preferred Language"
                                placeholder="Select one"
                                :options="['English', 'Swahili', 'French',]"
                            />

                            <div class="col-span-1 sm:col-span-2">
                                <x-textarea label="Additional Instructions" placeholder="Add any specific guidelines or focus points" />
                            </div>
                        </div>

                        <x-slot name="footer" class="flex justify-between gap-x-4">
                            <div class="flex gap-x-4">
                                <x-button flat label="Cancel" x-on:click="close" />

                                <x-button primary label="Apply Settings" wire:click="save" />
                            </div>
                        </x-slot>
                    </x-modal-card>

                    <span
                        class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                    >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-google-doc stroke-width="2" class="size-4.5" />
                        </div>
                        <span class="text-sm text-sky-500">Balanced</span>
                    </span>

                    <span
                        class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                    >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-language-circle stroke-width="2" class="size-4.5" />
                        </div>
                        <span class="text-sm text-sky-500">English (UK)</span>
                    </span>
                    <span
                        class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                    >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-ai-book stroke-width="2" class="size-4.5" />
                        </div>
                        <span class="text-sm text-sky-500">Context</span>
                    </span>
                </div>

                <div class="bg-gray-50/30 absolute right-3 bottom-3">
                    <button
                        type="button"
                        class="hidden p-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none rounded-lg text-center">
                        <x-hugeicons-ai-chat-02 stroke-width="2" class="size-4" />

                    </button>

                    <button
                        type="submit"
                        class="cursor-pointer rounded-full p-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none"
                    >
                        <x-hugeicons-forward-02 class="text-white size-4.5" stroke-width="2" />
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
