<?php

namespace App\Filament\Resources\InfoPartnerResource\Pages;

use App\Filament\Resources\InfoPartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfoPartners extends ListRecords
{
    protected static string $resource = InfoPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
