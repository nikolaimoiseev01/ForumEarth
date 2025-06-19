<?php

namespace App\Filament\Exports;

use App\Models\Journalist;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class JournalistExporter extends Exporter
{
    protected static ?string $model = Journalist::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('smi_name')
            ->label('СМИ'),
            ExportColumn::make('fio')->label('ФИО'),
            ExportColumn::make('telephone')->label('Телефон'),
            ExportColumn::make('position')->label('Должность'),
            ExportColumn::make('comment')->label('Комментарий'),
            ExportColumn::make('devices')->label('Устройства'),
            ExportColumn::make('created_at')->label('Дата создания'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your journalist export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
