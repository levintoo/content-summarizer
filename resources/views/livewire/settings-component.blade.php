@push('seometa')
    <!-- Primary Meta Tags -->
    <title>Settings & Preferences - {{ config('app.name') }}</title>
@endpush

<div class="flex flex-col justify-between pb-4 min-h-[calc(100vh-60px)]">
    <div class="px-3 lg:px-0 lg:w-[55%] lg:mx-auto space-y-6 md:space-y-8">

        <div>
            <h1 class="text-lg font-semibold text-gray-900 leading-tight">
                Settings & Preferences
            </h1>
            <p class="mt-1 text-sm text-gray-600">
                Choose the AI provider, model and API key used for your summaries.
            </p>
        </div>

        @if($providers->isEmpty())
            <div class="flex gap-3 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                <x-icon name="exclamation-triangle" class="size-5 shrink-0" />
                <p>
                    No AI providers are set up yet, so summaries are not available.
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="font-medium underline">Add a provider and model</a> in the admin panel.
                    @else
                        Please check back soon.
                    @endif
                </p>
            </div>
        @elseif($apiKeys->isEmpty())
            <div class="flex items-center justify-between gap-3 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-blue-800">
                <p>Add an API key from your provider to start creating summaries.</p>
                <x-button xs primary label="Add key" x-on:click="$openModal('addApiKeyModal')" />
            </div>
        @endif

        <div class="space-y-6">
            <x-select wire:model="aiPreferenceForm.provider" icon="sparkles" placeholder="OpenAI" label="Preferred Provider" shadow="none">
                @forelse($providers as $provider)
                    <x-select.option value="{{ $provider->id }}" label="{{ $provider->name }}" />
                @empty
                @endforelse
            </x-select>

            <x-select wire:model="aiPreferenceForm.model" icon="key" placeholder="Gpt 4o" label="Preferred Model" shadow="none">
                @forelse($models as $model)
                    <x-select.option value="{{ $model->id }}" label="{{ $model->name }}" />
                @empty
                @endforelse
            </x-select>

            <x-select wire:model="aiPreferenceForm.key" icon="information-circle" placeholder="Key" label="Preferred Key" shadow="none">
                @forelse($apiKeys as $key)
                    <x-select.option value="{{ $key->id }}" label="{{ $key->name }}" />
                @empty
                @endforelse
            </x-select>

            <div class="inline-flex gap-2">
                <x-button wire:click="saveAiPreference" spinner="saveAiPreference">Save</x-button>
                <x-button flat x-on:click="$openModal('manageApiKeysModal')">Manage API Keys</x-button>
            </div>

            <x-modal-card title="Manage API Keys" name="manageApiKeysModal" blur="base">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @forelse($apiKeys as $apiKey)
                        <div class="border border-slate-200 bg-white space-y-3 p-4 rounded-lg">
                            <div class="flex items-center justify-between space-x-2 text-sm">
                                <div class="line-clamp-1">
                                    <span class="text-gray-700">Provider:</span>
                                    <span class="text-gray-500" title="{{ $apiKey?->provider?->name }}">
                                        {{ $apiKey?->provider?->name }}
                                    </span>
                                    @if($preference->api_key_id == $apiKey->id)
                                        <span class="px-1.5 py-1 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Selected</span>
                                    @endif
                                </div>
                                <div class="grid place-items-end">
                                    <x-mini-button wire:click="removeApiKey({{ $apiKey->id }})" wire:confirm="Remove this API key? Summaries will stop working until you add another." spinner="removeApiKey({{ $apiKey->id }})" title="Remove key" size="sm" rose icon="trash" flat gray interaction="negative"/>
                                </div>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-700">Name:</span> <span class="text-gray-500">{{ $apiKey->name }}</span>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-700">Created:</span> <span class="text-gray-500">{{ $apiKey->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <x-empty-state title="No API keys yet" description="Keys are encrypted and only used for your own summaries.">
                                <x-slot name="icon">
                                    <x-icon name="key" class="size-6" />
                                </x-slot>

                                <x-slot name="actions">
                                    <x-button primary label="Add a key" x-on:click="$openModal('addApiKeyModal')" />
                                </x-slot>
                            </x-empty-state>
                        </div>
                    @endforelse
                </div>

                @if($apiKeys->hasPages())
                    <div class="mt-2">
                        {{ $apiKeys->links() }}
                    </div>
                @endif

                <x-slot name="footer" class="flex justify-between gap-x-4">
                    <x-button label="Add New Key" x-on:click="$openModal('addApiKeyModal')" flat />

                    <div class="inline-flex gap-x-4">
                        <x-button flat label="Close" x-on:click="close" />
                    </div>
                </x-slot>
            </x-modal-card>

            <x-modal-card title="Create Api Key" name="addApiKeyModal">
                <div class="grid grid-cols-1 gap-4">
                    <x-select wire:model="apiKeyForm.provider" id="api_key_provider" icon="sparkles" placeholder="OpenAI" label="Preferred Provider" shadow="none">
                        @forelse($providers as $provider)
                            <x-select.option value="{{ $provider->id }}" label="{{ $provider->name }}" />
                        @empty
                        @endforelse
                    </x-select>

                    <x-password wire:model="apiKeyForm.key" id="api_key" icon="key" label="Api Key" placeholder="sk-abc123xyz456..." corner="You won't be able to view this key again." />

                    <x-input wire:model="apiKeyForm.name" id="api_key_name" icon="information-circle" label="Name" placeholder="Personal Key" />
                </div>

                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <div class="flex gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />

                        <x-button primary label="Save" wire:click="saveApiKey" spinner="saveApiKey" />
                    </div>
                </x-slot>
            </x-modal-card>
        </div>

        <div>
            <h1 class="text-lg font-semibold text-gray-900 leading-tight">
                Other Preferences
            </h1>
            <p class="mt-1 text-sm text-gray-600">
                Set your default language, summary length and an optional custom prompt.
            </p>
        </div>

        <div class="space-y-6">
            <div class="space-y-6 pb-3 *:border *:p-4 *:rounded-lg">
                <x-toggle wire:model="otherPreferenceForm.use_custom_prompt" id="prompt" description="Switch to using your own prompt for summarization" rounded="lg" label="Use custom prompt for summarization" />
            </div>

            <x-textarea wire:model="otherPreferenceForm.custom_prompt" id="use_prompt" label="Prompt" placeholder="Your prompt goes here ..." shadow="none" />

            <x-input type="text" wire:model="otherPreferenceForm.language" corner="Yeap, just key it in" id="language" rounded="lg" shadow="none" size="sm" label="Preferred language" icon="language" />

            <x-select wire:model="otherPreferenceForm.summary_length" id="summary_length" rounded="lg" shadow="none" searchable label="Preferred summary length" icon="bars-3-center-left">
                @forelse(\App\Enums\SummaryLengthEnum::cases() as $enum)
                    <x-select.option label="{{ ucfirst($enum->name) }}" value="{{ $enum->value }}" />
                @empty
                @endforelse
            </x-select>

            <x-button wire:click="saveOtherPreference" spinner="saveOtherPreference">Save</x-button>
        </div>
    </div>
</div>
