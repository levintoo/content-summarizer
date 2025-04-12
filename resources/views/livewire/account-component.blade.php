@push('seometa')
    <!-- Primary Meta Tags -->
    <title>Account & Billing - {{ config('app.name') }}</title>
@endpush

<div class="flex flex-col justify-between pb-4 min-h-[calc(100vh-60px)]">
    <div class="space-y-8 py-4 px-3 lg:px-0 lg:w-[55%] lg:mx-auto">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Account & Billing
        </h1>

        <div rounded="lg" class="space-y-6">
            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium">
                    Your Current Plan is <span class="underline">{{ auth()->user()->hasActiveSubscription() ? auth()->user()->getSubscription()->plan->name : '-' }}</span>
                </h3>
                <p class="text-gray-600">
                    A simple start for everyone
                </p>
            </div>

            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium">
                    Plan Status <span class="underline">{{ auth()->user()->hasActiveSubscription() ? auth()->user()->getSubscription()->status : '-' }}</span>
                </h3>
                <p class="text-gray-600">
                    Current status of the selected plan
                </p>
            </div>

            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium" title="-">
                    Active until <span class="underline">{{ auth()->user()->hasActiveSubscription() ? auth()->user()->getSubscription()->next_payment_date : '-' }}</span>
                </h3>
                <p class="text-gray-600">
                    We may send you a notification upon Subscription expiration
                </p>
            </div>

            @if(auth()->user()->hasActiveSubscription() && auth()->user()->getSubscription()->status === 'active' )
                <x-modal-card blur="base" title="Manage Current Subscription" name="manageModal">
                    <x-button wire:click.debounce="unsubscribe()" rose flat label="Cancel Subscription" />

                    <x-slot name="footer" class="flex justify-end">
                        <x-button size="sm" label="Cancel" x-on:click="$closeModal('manageModal')" />
                    </x-slot>
                </x-modal-card>

                <x-button label="Manage Subscription" x-on:click="$openModal('manageModal')" />
            @endif
        </div>

        <h3 class="font-semibold text-lg text-gray-800 leading-tight">
            Subscription Plans
        </h3>

        <div class="mx-auto gap-8 grid grid-cols-1 lg:grid-cols-2">
            @forelse(\App\Models\Plan::query()->limit(5)->get() as $plan)
                @if($plan->interval === 'monthly')
                    <div class="border border-slate-200 bg-white/50 backdrop-blur p-5 rounded-xl">
                        <p class="font-medium">{{ $plan->name }}</p>
                        <p class="mt-1">
                            <span class="text-[1.5rem] font-bold">$</span>
                            <span class="text-[2.2rem] font-bold">{{ $plan->amount/100/100 }}*</span>
                            /
                            <span class="text-gray-700">month</span> or <span>{{ $plan->currency . $plan->amount / 100 }}</span>
                        </p>

                        <p class="mt-2">For hobby, staging sites, and side hustles. </p>
                        <div class="space-y-1.5 mt-3">
                            <p class="flex items-center gap-1 text-gray-700">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                2 pages
                            </p>
                            <p class="flex items-center gap-1 text-gray-700">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                Limited traffic
                            </p>
                            <p class="flex items-center gap-1 text-gray-700">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                50 form submissions
                            </p>
                            <p class="flex items-center gap-1 text-gray-700">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                1,000 visitors/mo
                            </p>
                        </div>


                        @if(!auth()->user()->hasActiveSubscription())
                            <x-button wire:click.debounce="subscribe('{{ $plan->plan_code }}')" label="Get Started Now" class="mt-5 w-full" />
                        @endif

                        @if(auth()->user()->hasActiveSubscription() && auth()->user()->getSubscription()->plan_id == $plan->id )
                            <x-button disabled="" light label="Current Plan" class="mt-5 w-full disabled:cursor-default" />
                        @endif
                    </div>
                @else
                    <div class="bg-gradient-to-r from-slate-900 to-slate-900/85 text-white/85 p-5 rounded-xl">

                        <p class="font-medium">{{ $plan->name }}</p>
                        <p class="mt-1">
                            <span class="text-[1.5rem] font-bold">$</span>
                            <span class="text-[2.2rem] font-bold">{{ $plan->amount/100/100 }}*</span>
                            /
                            <span class="text-gray-300">month</span> or <span>{{ $plan->currency . $plan->amount / 100 }}</span>
                        </p>

                        <p class="mt-2">For hobby, staging sites, and side hustles. </p>
                        <div class="space-y-1.5 mt-3">
                            <p class="flex items-center gap-1 text-gray-400">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                2 pages
                            </p>
                            <p class="flex items-center gap-1 text-gray-400">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                Limited traffic
                            </p>
                            <p class="flex items-center gap-1 text-gray-400">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                50 form submissions
                            </p>
                            <p class="flex items-center gap-1 text-gray-400">
                                <x-hugeicons-checkmark-badge-01 class="size-4.5 text-green-400" />

                                1,000 visitors/mo
                            </p>
                        </div>

                        @if(!auth()->user()->hasActiveSubscription())
                            <x-button wire:click.debounce="subscribe('{{ $plan->plan_code }}')" label="Get Started Now" class="mt-5 w-full" />
                        @endif

                        @if(auth()->user()->hasActiveSubscription() && auth()->user()->getSubscription()->plan_id == $plan->id )
                            <x-button disabled="" slate label="Current Plan" class="text-white mt-5 w-full disabled:cursor-default" />
                        @endif
                    </div>
                @endif
            @empty
            @endforelse
        </div>

        <div class="fixed -top-8 right-0" wire:loading.delay>
            <svg class="size-6 m-1.5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke="currentColor"><circle cx="12" cy="12" r="9.5" fill="none" stroke-linecap="round" stroke-width="2"><animate attributeName="stroke-dasharray" calcMode="spline" dur="1.5s" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" keyTimes="0;0.475;0.95;1" repeatCount="indefinite" values="0 150;42 150;42 150;42 150"/><animate attributeName="stroke-dashoffset" calcMode="spline" dur="1.5s" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" keyTimes="0;0.475;0.95;1" repeatCount="indefinite" values="0;-16;-59;-59"/></circle><animateTransform attributeName="transform" dur="1.2s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></g></svg>
        </div>
    </div>

    <div class="hidden px-3 lg:px-0 lg:w-[55%] lg:mx-auto space-y-6 md:space-y-8">

        <div>
            <h1 class="text-lg font-semibold text-gray-900 leading-tight">
                Account & Billing
            </h1>
        </div>

        <div rounded="lg" class="space-y-6">
            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium">
                    Your Current Plan is <span class="underline">-</span>
                </h3>
                <p class="text-gray-600">
                    A simple start for everyone
                </p>
            </div>

            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium">
                    Plan Status <span class="underline">-</span>
                </h3>
                <p class="text-gray-600">
                    Current status of the selected plan
                </p>
            </div>

            <div class="space-y-1">
                <h3 class="text-gray-700 font-medium" title="-">
                    Active until <span class="underline">-</span>
                </h3>
                <p class="text-gray-600">
                    We may send you a notification upon Subscription expiration
                </p>
            </div>
        </div>


        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            Subscription Plans
        </h2>

        <div class="mx-auto gap-8 grid grid-cols-1 lg:grid-cols-2">
            <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                <div class="border border-slate-200 bg-white/50 backdrop-blur p-5 rounded-xl">
                <p class="font-medium">Hourly Monthly</p>
                <p class="mt-1">
                    <span class="text-[1.5rem] font-bold" title="This is an over estimation, the accurate amount is in KSH">$</span>
                    <span class="text-[2.2rem] font-bold" title="This is an over estimation, the accurate amount is in KSH">0.1*</span>
                    /
                    <span class="text-gray-700">month</span> or <span>KSH10</span>
                </p>

                <p class="mt-2">For hobby, staging sites, and side hustles. </p>
                <div class="space-y-1.5 mt-3">
                    <p class="flex items-center gap-1 text-gray-700">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        2 pages
                    </p>
                    <p class="flex items-center gap-1 text-gray-700">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        Limited traffic
                    </p>
                    <p class="flex items-center gap-1 text-gray-700">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        50 form submissions
                    </p>
                    <p class="flex items-center gap-1 text-gray-700">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        1,000 visitors/mo
                    </p>
                </div>


                <!--[if BLOCK]><![endif]-->                        <button class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-primary-500 dark:bg-primary-700 hover:text-white hover:bg-primary-600 dark:hover:bg-primary-600 focus:text-white focus:ring-offset-2 focus:bg-primary-600 focus:ring-primary-600 dark:focus:bg-primary-600 dark:focus:ring-primary-600 rounded-md gap-x-2 text-sm px-4 py-2 mt-5 w-full" wire:click.debounce="subscribe('PLN_yz75gzx1snw9ozn')" type="button">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    Get Started Now

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </button>

                <!--[if ENDBLOCK]><![endif]-->

                <!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="bg-gradient-to-r from-slate-900 to-slate-900/85 text-white/85 p-5 rounded-xl">

                <p class="font-medium">Hourly Annual</p>
                <p class="mt-1">
                    <span class="text-[1.5rem] font-bold" title="This is an over estimation, the accurate amount is in KSH">$</span>
                    <span class="text-[2.2rem] font-bold" title="This is an over estimation, the accurate amount is in KSH">0.4*</span>
                    /
                    <span class="text-gray-300">month</span> or <span>KSH50</span>
                </p>

                <p class="mt-2">For hobby, staging sites, and side hustles. </p>
                <div class="space-y-1.5 mt-3">
                    <p class="flex items-center gap-1 text-gray-400">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        24/7 Support
                    </p>
                    <p class="flex items-center gap-1 text-gray-400">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        Unlimited Summaries
                    </p>
                    <p class="flex items-center gap-1 text-gray-400">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        Unlimited questions
                    </p>
                    <p class="flex items-center gap-1 text-gray-400">
                        <svg class="text-green-400" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"></path></svg>

                        Billed annually
                    </p>
                </div>

                <button class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-primary-500 dark:bg-primary-700 hover:text-white hover:bg-primary-600 dark:hover:bg-primary-600 focus:text-white focus:ring-offset-2 focus:bg-primary-600 focus:ring-primary-600 dark:focus:bg-primary-600 dark:focus:ring-primary-600 rounded-md gap-x-2 text-sm px-4 py-2 mt-5 w-full" wire:click.debounce="subscribe('PLN_gmwa6wra0ofl15b')" type="button">
                    Get Started Now
                </button>
            </div>
        </div>
    </div>
</div>
