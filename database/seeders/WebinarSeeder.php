<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webinar;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webinars = [
            [
                'title' => 'Введение в Laravel 12: Новые возможности',
                'date' => '2026-04-08',
                'time_start' => '10:00:00',
                'time_end' => '11:30:00',
                'description' => 'Обзор новых функций Laravel 12, включая улучшения производительности, новые хелперы и изменения в экосистеме. Рассмотрим практические примеры использования.',
                'link' => 'https://meet.jit.si/laravel12-intro',
            ],
            [
                'title' => 'Filament 4: Миграция с версии 3',
                'date' => '2026-04-10',
                'time_start' => '14:00:00',
                'time_end' => '15:30:00',
                'description' => 'Подробное руководство по миграции с Filament 3 на Filament 4. Изучим совместимость, новые компоненты и исправление распространенных проблем.',
                'link' => 'https://meet.jit.si/filament4-migration',
            ],
            [
                'title' => 'Оптимизация производительности в Livewire 3',
                'date' => '2026-04-15',
                'time_start' => '16:00:00',
                'time_end' => '17:00:00',
                'description' => 'Техники оптимизации Livewire приложений. Рассмотрим lazy loading, wire:poll, wire:key и лучшие практики для создания быстрых приложений.',
                'link' => 'https://meet.jit.si/livewire3-optimization',
            ],
            [
                'title' => 'Tailwind CSS 4: Что нового и как мигрировать',
                'date' => '2026-04-17',
                'time_start' => '11:00:00',
                'time_end' => '12:30:00',
                'description' => 'Обзор Tailwind CSS 4, включая новый движок, улучшенную производительность и изменения в конфигурации. Практические примеры миграции.',
                'link' => 'https://meet.jit.si/tailwind4-intro',
            ],
            [
                'title' => 'Vue 3 + Laravel: Современный фронтенд',
                'date' => '2026-04-22',
                'time_start' => '15:00:00',
                'time_end' => '16:30:00',
                'description' => 'Интеграция Vue 3 с Laravel. Рассмотрим Composition API, TypeScript, Pinia и лучшие практики для создания современных SPA приложений.',
                'link' => 'https://meet.jit.si/vue3-laravel',
            ],
            [
                'title' => 'Docker для Laravel разработчиков',
                'date' => '2026-04-24',
                'time_start' => '13:00:00',
                'time_end' => '14:30:00',
                'description' => 'Полный гайд по Docker для Laravel проектов. Настройка окружения, оптимизация образов, docker-compose и лучшие практики разработки.',
                'link' => 'https://meet.jit.si/docker-laravel',
            ],
        ];

        foreach ($webinars as $webinar) {
            Webinar::create($webinar);
        }
    }
}
