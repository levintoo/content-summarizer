<div x-data="{ footerHeight: 140 }" class="flex flex-col justify-between"
     :style="'min-height: calc(100vh - 60px - ' + footerHeight + 'px)'">
    <div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto"
         :style="'margin-bottom: ' + footerHeight + 'px; min-height: calc(100vh - 60px - ' + footerHeight + 'px)'">

        <div class="space-y-4 md:space-y-8">
            <div class="overflow-hidden max-h-[217.017px] max-w-[385.8px] sm:w-1/2 hover:opacity-80 transition-all rounded-lg shadow-lg hover:shadow-xl">
                <a target="_blank" rel="noopener nofollow" href="https://www.youtube.com/watch?v=8Ee4QjCEHHc">
                    <img class="object-cover w-full transition-all"
                         width="385.8"
                         height="217.017"
                         src="https://i.ytimg.com/vi/8Ee4QjCEHHc/maxresdefault.jpg" alt="no image">
                </a>
            </div>

            <div class="w-fit space-y-2">
                <p class="font-medium text-gray-800">
                    Calvin Harris - Slide (Official Audio) ft. Frank Ocean, Migos
                </p>

                <p class="text-gray-700">
                    Calvin Harris
                </p>
            </div>


            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <x-hugeicons-ai-cloud class="text-blue-500 size-6.5 rounded-lg" />
                    <div class="font-medium">{{ config('app.name') }}</div>
                </div>

                <div class="prose max-w-none rounded-lg font-light">
                    {{ \Illuminate\Mail\Markdown::parse('* '.fake()->realText() ?? '-') }}
                    {{ \Illuminate\Mail\Markdown::parse('* '.fake()->realText() ?? '-') }}
                    {{ \Illuminate\Mail\Markdown::parse('* '.fake()->realText() ?? '-') }}
                    {{ \Illuminate\Mail\Markdown::parse('* '.fake()->realText() ?? '-') }}
                </div>

                <div>
                    <x-mini-button size="sm" title="Copy" rounded flat gray interaction="primary">
                        <x-hugeicons-copy-01 class="size-4.5" />
                    </x-mini-button>

                    <x-mini-button title="Good response" size="sm" rounded flat gray interaction="primary">
                        <x-hugeicons-thumbs-up class="size-4.5 text-blue-700" />
                    </x-mini-button>

                    <x-mini-button title="Bad response" size="sm" rounded flat gray interaction="primary">
                        <x-hugeicons-thumbs-down class="size-4.5" />
                    </x-mini-button>
                </div>
            </div>

            <div
                class="mt-2.5 prose max-w-none px-3 py-2 rounded-lg bg-gradient-to-r from-blue-600 via-blue-700 to-blue-600 dark:bg-blue-800 text-white">
                <p class="font-light">
                    {{ fake()->realText() }}
                </p>
            </div>

            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <x-hugeicons-ai-cloud class="text-blue-500 size-6.5 rounded-lg" />
                    <div class="font-medium">{{ config('app.name') }}</div>
                </div>

                <div class="prose max-w-none rounded-lg font-light">
                    {{ \Illuminate\Mail\Markdown::parse(fake()->realText() ?? '-') }}
                </div>

                <div>
                    <x-mini-button size="sm" title="Copy" rounded flat gray interaction="primary">
                        <x-hugeicons-copy-01 class="size-4.5" />
                    </x-mini-button>

                    <x-mini-button size="sm" title="Bad response" rounded flat gray interaction="primary">
                        <x-hugeicons-thumbs-up class="size-4.5 text-blue-700" />
                    </x-mini-button>

                    <x-mini-button size="sm" title="Good response" rounded flat gray interaction="primary">
                        <x-hugeicons-thumbs-down class="size-4.5" />
                    </x-mini-button>
                </div>
            </div>

            <div
                class="mt-2.5 prose max-w-none px-3 py-2 rounded-lg bg-gradient-to-r from-blue-600 via-blue-700 to-blue-600 dark:bg-blue-800 text-white">
                <p class="font-light">
                    {{ fake()->realText() }}
                </p>
            </div>

            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <x-hugeicons-ai-cloud class="animate-bounce text-blue-500 size-6.5 rounded-lg" />
                    <div class="font-medium">{{ config('app.name') }}</div>
                </div>

                <div class="prose max-w-none rounded-lg font-light">
                    crafting ...
                </div>
            </div>

            <div class="invisible" aria-hidden="true"></div>
        </div>
    </div>

    <div class="w-full mx-auto py-2 fixed bottom-0 right-1/2 translate-x-1/2 bg-white">
        <div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto">
            <form
                x-data="{
        initialHeight: 40,
        currentHeight: 40,
        resize() {
            this.$refs.textarea.style.height = 'auto';
            let newHeight = Math.min(this.$refs.textarea.scrollHeight, 200);
            this.$refs.textarea.style.height = newHeight + 'px';
            this.currentHeight = newHeight;
            const delta = this.currentHeight - this.initialHeight;
            this.$dispatch('footer-update', { delta: delta });
        }
    }"
                @footer-update="footerHeight = Math.min(140 + $event.detail.delta, 200 + 88)"
                class="relative border rounded-xl border-gray-200 focus:border-blue-500 bg-gray-50/50">
                <textarea
                    x-ref="textarea"
                    @input="resize()"
                    @change="resize()"
                    wire:keydown.enter.prevent="ask()"
                    class="max-h-[200px] min-h-[52px] bg-transparent w-full px-4 pt-4 text-gray-700 placeholder:text-gray-500/70 border-none resize-none focus:ring-0 focus:outline-none"
                    placeholder="Ask me anything ..."
                    id="ai-input"
                ></textarea>

                <div class="min-h-12">
                    <div class="bg-gray-50/30 absolute left-3 bottom-3 flex items-center gap-2">
                        <button
                            type="button"
                            label="Open" x-on:click="$openModal('summaryConfigurationModal')"
                            class="border cursor-pointer rounded-full p-2 bg-white focus:ring-4 focus:ring-blue-100 focus:outline-none"
                        >
                            <x-hugeicons-sliders-horizontal class="text-gray-500 size-4.5" stroke-width="2"/>
                        </button>

                        @push('modals')
                            <x-modal-card title="Customize Summary" name="summaryConfigurationModal" blur="sm">
                                <div class="grid grid-cols-1 gap-4">
                                    <x-select
                                        label="Preferred Language"
                                        placeholder="Select one"
                                        :options="['English', 'Spanish', 'French']"
                                    />

                                    <label for="add-context" class="flex p-3 w-full bg-white border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="add-context" checked="">
                                        <span class="text-sm text-gray-700 font-medium ms-3">Include video summary as added context</span>
                                    </label>
                                </div>

                                <x-slot name="footer" class="flex justify-between gap-x-4">
                                    <div class="flex gap-x-4">
                                        <x-button flat label="Cancel" x-on:click="close"/>

                                        <x-button primary label="Apply Settings" wire:click="save"/>
                                    </div>
                                </x-slot>
                            </x-modal-card>
                        @endpush

                        <span
                            class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                        >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-language-circle stroke-width="2" class="size-4.5"/>
                        </div>
                        <span class="text-sm text-sky-500">English (UK)</span>
                    </span>
                        <span
                            class="hidden md:flex rounded-full items-center gap-2 px-1.5 py-1 border h-8 cursor-pointer bg-sky-500/15 hover:bg-sky-500/20 border-sky-300 text-sky-500 focus:ring-4 focus:ring-blue-100 focus:outline-none"
                        >
                        <div class="w-4 h-4 flex items-center justify-center shrink-0">
                            <x-hugeicons-ai-book stroke-width="2" class="size-4.5"/>
                        </div>
                        <span class="text-sm text-sky-500">Context</span>
                    </span>
                    </div>

                    <div class="bg-gray-50/30 absolute right-3 bottom-3">
                        <button
                            type="button"
                            class="hidden p-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none rounded-lg text-center">
                            <x-hugeicons-ai-chat-02 stroke-width="2" class="size-4"/>

                        </button>

                        <button
                            type="submit"
                            class="cursor-pointer rounded-full p-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 focus:outline-none"
                        >
                            <x-hugeicons-forward-02 class="text-white size-4.5" stroke-width="2"/>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
