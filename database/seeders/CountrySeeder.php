<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $sponsor = Country::create([
                'name' => 'Страна ' . ($i + 1),
            ]);
            $sponsor->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-flag.png')
                ->toMediaCollection('image');
        }
    }
}
