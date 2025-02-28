<?php

namespace App\Filament\Resources\SubscriptionIntentResource\Pages;

use App\Filament\Resources\SubscriptionIntentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubscriptionIntents extends ListRecords
{
    protected static string $resource = SubscriptionIntentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
