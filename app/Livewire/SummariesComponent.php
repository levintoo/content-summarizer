<?php

namespace App\Livewire;

use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class SummariesComponent extends Component
{
    use WireUiActions;
    use WithPagination;

    public function deleteSummary($id): void
    {
        $summary = Summary::query()->whereBelongsTo(auth()->user())->findOrFail($id);

        DB::transaction(function () use ($summary) {
            $summary->content->chunks->each->delete();
            $summary->content->delete();
            $summary->delete();
        });

        $this->notification()->success('Summary removed successfully');
    }

    public function shareSummary($id): void
    {
        $summary = Summary::query()->whereBelongsTo(auth()->user())->findOrFail($id);

        $summary->update([
            'shared' => true,
        ]);

        $this->notification()->success('Summary shared successfully');
    }

    public function unShareSummary($id): void
    {
        $summary = Summary::query()->whereBelongsTo(auth()->user())->findOrFail($id);

        $summary->update([
            'shared' => false,
        ]);

        $this->notification()->success('Summary unshared successfully');
    }

    public function render(): View
    {
        $summaries = Summary::query()->latest()->whereBelongsTo(auth()->user())->with('content:id,title,channel,video_id')->paginate();

        return view('livewire.summaries-component', compact('summaries'));
    }
}
