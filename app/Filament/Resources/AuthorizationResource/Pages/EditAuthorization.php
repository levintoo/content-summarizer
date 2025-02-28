<?php

namespace App\Filament\Resources\AuthorizationResource\Pages;

use App\Filament\Resources\AuthorizationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAuthorization extends EditRecord
{
    protected static string $resource = AuthorizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
