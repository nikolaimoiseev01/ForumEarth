<?php

namespace App\Filament\Resources\Sponsors\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SponsorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('link'),
                SpatieMediaLibraryFileUpload::make('media')
                    ->collection('image')
                    ->disk('media')
                    ->image()
                    ->required()
            ]);
    }
}
