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
        $summary = Summary::findOrFail($id);

        $this->authorize('delete', $summary);

        DB::transaction(function () use ($summary) {
            $summary->content->chunks->each->delete();
            $summary->content->delete();
            $summary->delete();
        });

        $this->notification()->success('Summary removed successfully');
    }

    public function shareSummary($id): void
    {
        $summary = Summary::findOrFail($id);

        $this->authorize('update', $summary);

        $summary->update([
            'shared' => true,
        ]);

        $this->notification()->success('Summary shared successfully');
    }

    public function unShareSummary($id): void
    {
        $summary = Summary::findOrFail($id);

        $this->authorize('update', $summary);

        $summary->update([
            'shared' => false,
        ]);

        $this->notification()->success('Summary unshared successfully');
    }

    public function render(): View
    {
        $summaries = Summary::query()->latest()->whereBelongsTo(auth()->user())->with('content:id,title,channel,video_id')
            ->withExists(['content as is_ready' => fn ($query) => $query->whereNotNull('summary')])
            ->paginate();

        return view('livewire.summaries-component', compact('summaries'));
    }
}
