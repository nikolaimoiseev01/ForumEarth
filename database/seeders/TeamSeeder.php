<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $team = Team::create([
                'name' => 'Arctic Minds',
                'position' => $i + 1,
                'place' => 'Первое место',
                'university' => 'Московский государственный институт Международных отношений',
                'topic' => 'Северный коллаген из вторичного сырья рыбопроизводста.',
                'idea' => 'Коллаген востребован в фармацевтике и косметологии. • Технологии переработки отходов могут быть предметом патента, так как такие разбработки. и ведутся, многое зависит от способа промышленного производства. • Комплексная инфраструктурная проработка проекта в привязке к Архангельскому. тралловому флоту.'
            ]);
            $team->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-team.jpg')
                ->toMediaCollection('cover');
        }
    }
}
