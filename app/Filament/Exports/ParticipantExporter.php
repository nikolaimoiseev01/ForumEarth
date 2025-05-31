<?php

namespace App\Filament\Exports;

use App\Models\Participant;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ParticipantExporter extends Exporter
{
    protected static ?string $model = Participant::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('fio')->label('ФИО'),
            ExportColumn::make('telephone')->label('Телефон'),
            ExportColumn::make('email')->label('Email'),
            ExportColumn::make('region')->label('Регион'),
            ExportColumn::make('status')->label('Статус'),
            ExportColumn::make('workplace')->label('Место работы'),
            ExportColumn::make('study_place')->label('Место обучения'),
            ExportColumn::make('study_level')->label('Уровень обучения'),
            ExportColumn::make('specialization')->label('Специализация'),
            ExportColumn::make('team')->label('Команда'),
            ExportColumn::make('interests')->label('Интересы'),
            ExportColumn::make('expertise')->label('Экспертиза'),
            ExportColumn::make('interest_fact')->label('Интересные факты'),
            ExportColumn::make('created_at')->label('Создан'),
            ExportColumn::make('updated_at')->label('Обновлен'),
            ExportColumn::make('birth_dt')->label('Дата рождения'),
            ExportColumn::make('birth_place')->label('Место рождения'),
            ExportColumn::make('gender')->label('Пол'),
            ExportColumn::make('citizenship')->label('Гражданство'),
            ExportColumn::make('passport_number')->label('Номер паспорта'),
            ExportColumn::make('passport_issued_date')->label('Дата выдачи паспорта'),
            ExportColumn::make('passport_issued_by')->label('Кем выдан паспорт'),
            ExportColumn::make('passport_code')->label('Код подразделения'),
            ExportColumn::make('address')->label('Адрес'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your participant export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
