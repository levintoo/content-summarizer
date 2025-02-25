<div
    x-data="{
        providers: [],
        allModels: [],
        filteredModels: [],
        form: {
            provider_id: '',
            ai_model_id: ''
        },

        init() {
            this.providers = {{ Js::from($providers) }};
            this.allModels = {{ Js::from($models) }};

            if (this.providers.length > 0) {
                this.form.provider_id = this.providers[0].id;
            }

            this.filterModels();

            if (this.filteredModels.length > 0) {
                this.form.ai_model_id = this.filteredModels[0].id;
            }
        },

        filterModels() {
            if (!this.form.provider_id) {
                this.filteredModels = this.allModels;
                return;
            }

            this.filteredModels = this.allModels.filter(model => model.provider_id == this.form.provider_id);

            if (this.filteredModels.length > 0 && !this.filteredModels.some(model => model.id == this.form.ai_model_id)) {
                this.form.ai_model_id = this.filteredModels[0].id;
            }
        }
    }"
>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preferences') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit="save" class="space-y-6">
                    <div>
                        <x-label for="language">
                            Language
                        </x-label>
                        <x-input id="language" wire:model="form.language" />
                        <x-input-error for="form.language" />
                    </div>

                    <div>
                        <x-label for="provider">
                            Provider
                        </x-label>
                        <x-select id="provider" x-model="form.provider_id" @change="filterModels(); $wire.set('form.provider_id', form.provider_id)">
                            <template x-for="provider in providers" :key="provider.id">
                                <option :value="provider.id" x-text="provider.name"></option>
                            </template>
                        </x-select>
                        <x-input-error for="form.provider_id" />
                    </div>

                    <div>
                        <x-label for="model">
                            Model
                        </x-label>
                        <x-select id="model" x-model="form.ai_model_id" @change="$wire.set('form.ai_model_id', form.ai_model_id)">
                            <template x-for="model in filteredModels" :key="model.id">
                                <option :value="model.id" x-text="model.name"></option>
                            </template>
                        </x-select>
                        <x-input-error for="form.ai_model_id" />
                    </div>
                    <x-button type="submit">Submit</x-button>
                </form>
            </div>
        </div>
    </div>
</div>
