<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ParticipantExporter;
use App\Filament\Resources\ParticipantResource\Pages;
use App\Filament\Resources\ParticipantResource\RelationManagers;
use App\Models\Participant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationLabel = 'Анкеты участников';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('fio')
                        ->label('ФИО')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('telephone')
                        ->label('Телефон')
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('birth_dt')
                        ->label('Дата рождения')
                        ->required(),
                    Forms\Components\TextInput::make('birth_place')
                        ->label('Место рождения')
                        ->required(),
                    Forms\Components\TextInput::make('gender')
                        ->label('Пол')
                        ->required(),
                    Forms\Components\TextInput::make('citizenship')
                        ->label('Гражданство')
                        ->required(),
                    Forms\Components\TextInput::make('passport_number')
                        ->label('Номер паспорта')
                        ->required(),
                    Forms\Components\DatePicker::make('passport_issued_date')
                        ->label('Дата выдачи')
                        ->required(),
                    Forms\Components\TextInput::make('passport_issued_by')
                        ->label('Кем выдан')
                        ->required(),
                    Forms\Components\TextInput::make('passport_code')
                        ->label('Код подразделения')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->label('Адрес')
                        ->required(),

                    Forms\Components\TextInput::make('region')
                        ->label('Регион')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('topic')
                        ->label('Тема интереса')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('status')
                        ->label('Статус')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('workplace')
                        ->label('Место работы')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('study_place')
                        ->label('Место обучения')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('study_level')
                        ->label('Уровень обучения')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('specialization')
                        ->label('Специализация')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('team')
                        ->label('Команда')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('interests')
                        ->label('Интересы')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('expertise')
                        ->label('Экспертиза')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('interest_fact')
                        ->label('Интересный факт')
                        ->required()
                        ->columnSpanFull(),
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fio')
                    ->label('ФИО')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->label('Телефон')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region')
                    ->label('Регион')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->searchable(),
                Tables\Columns\TextColumn::make('workplace')
                    ->label('Место работы')
                    ->searchable(),
                Tables\Columns\TextColumn::make('study_place')
                    ->label('Место обучения')
                    ->searchable(),
                Tables\Columns\TextColumn::make('study_level')
                    ->label('Уровень обучения')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialization')
                    ->label('Специализация')
                    ->searchable(),
                Tables\Columns\TextColumn::make('team')
                    ->label('Команда')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ParticipantExporter::class)
                    ->label('Экспорт')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListParticipants::route('/'),
            'create' => Pages\CreateParticipant::route('/create'),
            'edit' => Pages\EditParticipant::route('/{record}/edit'),
        ];
    }
}
