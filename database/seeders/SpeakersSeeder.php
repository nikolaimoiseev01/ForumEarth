<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $speaker = Speaker::create([
                'name' => 'СУРОВА НАДЕЖДА (' . ($i + 1) . ')',
                'description' => 'Бизнес-психолог и коуч, карьерный консультант, преподаватель Университета Иннополис, автор бизнес-тренингов'
            ]);
            $speaker->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-speaker.png')
                ->toMediaCollection('image');
        }
    }
}
