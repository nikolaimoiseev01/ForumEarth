<?php

namespace App\Filament\Resources\Journalists\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class JournalistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('smi_name')
                    ->required(),
                TextInput::make('fio')
                    ->required(),
                TextInput::make('telephone')
                    ->tel()
                    ->required(),
                TextInput::make('position')
                    ->required(),
                Textarea::make('comment')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('devices')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
