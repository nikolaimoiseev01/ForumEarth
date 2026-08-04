<?php

namespace App\Filament\Resources\Speakers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SpeakersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Тип')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Описание')
                    ->limit(50),
            ])
            ->reorderable('position')
            ->defaultSort('position')
            ->filters([
                SelectFilter::make('type')
                    ->label('Тип')
                    ->options([
                        'спикер' => 'Спикер',
                        'эксперт' => 'Эксперт',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
