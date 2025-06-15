<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages;
use App\Filament\Resources\SpeakerResource\RelationManagers;
use App\Models\Speaker;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakerResource extends Resource
{
    protected static ?string $model = Speaker::class;

    protected static ?string $navigationLabel = 'Спикеры';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Имя')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('type')
                        ->label('Тип')
                        ->options([
                            'спикер' => 'Спикер',
                            'эксперт' => 'Эксперт'
                        ])
                    ,
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->label('Фото')
                        ->imagePreviewHeight('250')
                        ->loadingIndicatorPosition('left')
                        ->panelAspectRatio('2:1')
                        ->panelLayout('integrated')
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->image()
                        ->imageEditor()
                        ->imageEditorMode(2)
                        ->imageResizeTargetHeight(256)
                        ->imageResizeTargetWidth(386)
                        ->uploadProgressIndicatorPosition('left'),
                    Forms\Components\Textarea::make('description')
                        ->label('Описание')
                        ->maxLength(255),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakers::route('/'),
            'create' => Pages\CreateSpeaker::route('/create'),
            'edit' => Pages\EditSpeaker::route('/{record}/edit'),
        ];
    }
}
