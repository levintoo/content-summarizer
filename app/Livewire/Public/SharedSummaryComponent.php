<?php

namespace App\Livewire\Public;

use App\Models\Summary;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

class SharedSummaryComponent extends Component
{
    public Summary $summary;

    public function mount(Summary $summary): void
    {
        Gate::authorize('viewShared', $summary);

        $this->summary = $summary;
    }

    public function render(): View
    {
        return view('livewire.public.shared-summary-component', [
            'content' => $this->summary->content,
        ])->layout('layouts.guest');
    }
}
