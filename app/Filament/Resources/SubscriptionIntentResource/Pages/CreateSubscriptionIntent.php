<?php

namespace App\Filament\Resources\SubscriptionIntentResource\Pages;

use App\Filament\Resources\SubscriptionIntentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscriptionIntent extends CreateRecord
{
    protected static string $resource = SubscriptionIntentResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
