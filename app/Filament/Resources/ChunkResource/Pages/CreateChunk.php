<?php

namespace App\Filament\Resources\ChunkResource\Pages;

use App\Filament\Resources\ChunkResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChunk extends CreateRecord
{
    protected static string $resource = ChunkResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
