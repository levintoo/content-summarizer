<?php

namespace App\Filament\Resources\SubscriptionIntentResource\Pages;

use App\Filament\Resources\SubscriptionIntentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSubscriptionIntent extends EditRecord
{
    protected static string $resource = SubscriptionIntentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
