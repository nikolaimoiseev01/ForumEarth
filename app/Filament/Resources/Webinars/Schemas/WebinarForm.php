<?php

namespace App\Filament\Resources\Webinars\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class WebinarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TimePicker::make('time_start')
                    ->required(),
                TimePicker::make('time_end')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('link')
                    ->required(),
            ]);
    }
}
