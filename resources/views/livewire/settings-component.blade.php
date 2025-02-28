<div class="flex flex-col justify-between pb-4 min-h-[calc(100vh-60px)]">
    <div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto space-y-6 md:space-y-8">

        <div>
            <h1 class="text-lg font-semibold text-gray-900 leading-tight">
                Settings & Preferences
            </h1>
            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </div>

        <div class="space-y-6">
            <x-select icon="sparkles" placeholder="OpenAI" label="Preferred Provider" shadow="none">
                @forelse($providers as $provider)
                    <x-select.option value="{{ $provider->id }}" label="{{ $provider->name }}" />
                @empty
                @endforelse
            </x-select>

            <x-select icon="key" placeholder="Gpt 4o" label="Preferred Model" shadow="none">
                @forelse($models as $model)
                    <x-select.option value="{{ $model->id }}" label="{{ $model->name }}" />
                @empty
                @endforelse
            </x-select>

            <div class="inline-flex gap-2">
                <x-button>Save</x-button>
                <x-button flat x-on:click="$openModal('manageApiKeysModal')">Manage API Keys</x-button>
            </div>

            <x-modal-card title="Manage API Keys" name="manageApiKeysModal" blur="base">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="border border-slate-200 bg-white space-y-3 p-4 rounded-lg">
                        <div class="flex items-center justify-between space-x-2 text-sm">
                            <div class="">
                                <span class="text-gray-700">Provider:</span> <span class="text-gray-500">Anthropic</span>
                                <span

                                    class="px-1.5 py-1 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Selected</span>
                            </div>
                        </div>
                        <div class="text-sm">
                            <span class="text-gray-700">Name:</span> <span class="text-gray-500">Personal</span>
                        </div>
                        <div class="text-sm">
                            <span class="text-gray-700">Created:</span> <span class="text-gray-500">5 mins Ago</span>
                        </div>
                        <div class="inline-flex gap-3 w-full">
                            <x-mini-button title="Make this the default" class="border" size="sm" rose icon="trash" flat gray interaction="negative"/>
                            <x-mini-button wire:click="save" title="Make this the default" class="border" size="sm" primary icon="check" flat gray interaction="primary"/>
                        </div>
                    </div>
                </div>

                <x-slot name="footer" class="flex justify-between gap-x-4">
                    <x-button label="Add New Key" x-on:click="$openModal('addApiKeyModal')" flat />

                    <div class="inline-flex gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />

                        <x-button primary label="Save" wire:click="save" />
                    </div>
                </x-slot>
            </x-modal-card>

            <x-modal-card title="Create Api Key" name="addApiKeyModal">
                <div class="grid grid-cols-1 gap-4">
                    <x-select id="api_key_provider" icon="sparkles" placeholder="OpenAI" label="Preferred Provider" shadow="none">
                        @forelse($providers as $provider)
                            <x-select.option value="{{ $provider->id }}" label="{{ $provider->name }}" />
                        @empty
                        @endforelse
                    </x-select>

                    <x-password id="api_key" icon="key" label="Api Key" placeholder="sk-abc123xyz456..." />
                </div>

                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <div class="flex gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />

                        <x-button primary label="Save" wire:click="save" />
                    </div>
                </x-slot>
            </x-modal-card>
        </div>

        <div>
            <h1 class="text-lg font-semibold text-gray-900 leading-tight">
                Other Preferences
            </h1>
            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </div>

        <div class="space-y-6">
            <div class="space-y-6 pb-3 *:border *:p-4 *:rounded-lg">
                <x-toggle id="prompt" description="Switch to using your own prompt for summarization" rounded="lg" label="Use custom prompt for summarization" />
            </div>

            <x-textarea id="use_prompt" label="Prompt" placeholder="Your prompt goes here ..." shadow="none" />

            <x-select id="language" rounded="lg" shadow="none" size="sm" label="Preferred language" icon="language">
                <x-select.option label="English (GB)" value="" />
            </x-select>

            <x-select id="summary_lenght" rounded="lg" shadow="none" searchable label="Preferred summary length" icon="bars-3-center-left">
                <x-select.option label="Balanced" value="" />
            </x-select>

            <x-button>Save</x-button>
        </div>
    </div>
</div>
