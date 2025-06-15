<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Новости';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Заголовок')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('desc')
                        ->label('Описание')
                        ->required(),
                    Forms\Components\DateTimePicker::make('custom_created_at')
                        ->label('Дата создания')
                        ->required(),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                        ->label('Обложка')
                        ->collection('cover'),
                    Builder::make('content')->blocks([
                        Block::make('text')->schema([
                            Forms\Components\RichEditor::make('content')
                                ->label('')
                                ->columnSpanFull()
                                ->fileAttachmentsDirectory('attachments'),
                        ])->label('Текстовый блок'),
                        Block::make('img')->schema([
                            Forms\Components\FileUpload::make('url')
                                ->label('')
                                ->image()
                                ->required()
                        ])->label('Изображение')
                    ])->label('Содержание новости')
                        ->addActionLabel('Добавить блок'),
//                    Forms\Components\Section::make('Таймлайн')->schema([
//                        Forms\Components\Builder::make('timeline')->blocks([
//                            Block::make('general')->schema([
//                                TextInput::make('period')->label('Период')->required(),
//                                Forms\Components\Textarea::make('desc')->label('Описание')->required(),
//                            ])->label('Стандартный блок')->columns(2),
//                            Block::make('big_block')->schema([
//                            ])->label('Большой блок')
//                        ])->addActionLabel('Добавить блок')->label('')->collapsible(),
//                    ]),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable(),
                Tables\Columns\TextColumn::make('custom_created_at')
                    ->label('Своя дата создания')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
