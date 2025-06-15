<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Speaker;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = ENV('APP_ENV') == ('local') ? '12345678' : ENV('ADMIN_PASSWORD');
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);
        $text = [[
            'type' => 'text',
            'data' => [
                'content' => '<h2>Welcome to the Admin Panel</h2><p>This is a sample text for the admin panel.</p>'
            ]
        ]
        ];
        for ($i = 0; $i < 10; $i++) {
            $post = Post::create([
                'title' => 'Post ' . ($i + 1),
                'desc' => 'This is the content of post ' . ($i + 1),
                'content' => $text,
            ]);
            $post->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/temp-image.png')
                ->toMediaCollection('cover');
        }

        (new SpeakersSeeder())->run();
        (new SponsorSeeder())->run();
        (new UniversitySeeder())->run();
        (new InfoPartnerSeeder())->run();

    }
}
