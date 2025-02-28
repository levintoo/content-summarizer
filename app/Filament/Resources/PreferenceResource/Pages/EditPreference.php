<?php

namespace App\Filament\Resources\PreferenceResource\Pages;

use App\Filament\Resources\PreferenceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPreference extends EditRecord
{
    protected static string $resource = PreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
