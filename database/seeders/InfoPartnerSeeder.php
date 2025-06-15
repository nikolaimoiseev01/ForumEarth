<?php

namespace Database\Seeders;

use App\Models\InfoPartner;
use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $sponsor = InfoPartner::create([
                'name' => 'УФУ',
            ]);
            $sponsor->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-sponsor.png')
                ->toMediaCollection('image');
        }
    }
}
