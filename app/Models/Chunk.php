<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chunk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content_id',
        'chunk',
        'summary',
        'merged',
        'ai_model_id',
        'prompt_tokens',
        'completion_tokens',
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function aiModel(): BelongsTo
    {
        return $this->belongsTo(AiModel::class);
    }

    protected function casts(): array
    {
        return [
            'merged' => 'boolean',
        ];
    }
}
