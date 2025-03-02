<?php

namespace App\Livewire;

use App\Models\Content;
use App\Models\Summary;
use Livewire\Component;

class ShowSummaryComponent extends Component
{
    public Summary $summary;
    public Content $content;


    public function mount(Summary $summary)
    {
        $this->summary = $summary;
        $this->content = $summary->content;
    }

    public function like(): void
    {
        $this->summary->update([
            'feedback' => 1,
        ]);
    }

    public function dislike(): void
    {
        $this->summary->update([
            'feedback' => -1,
        ]);
    }

    public function render()
    {
        return view('livewire.show-summary-component');
    }
}
