<?php

namespace Database\Seeders;

use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $sponsor = Sponsor::create([
                'name' => 'УФУ',
            ]);
            $sponsor->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-sponsor.png')
                ->toMediaCollection('image');
        }
    }
}
