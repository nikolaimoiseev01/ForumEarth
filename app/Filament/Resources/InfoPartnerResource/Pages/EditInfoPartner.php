<?php

namespace App\Filament\Resources\InfoPartnerResource\Pages;

use App\Filament\Resources\InfoPartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfoPartner extends EditRecord
{
    protected static string $resource = InfoPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
