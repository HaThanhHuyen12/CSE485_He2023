<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\channel; // Chỉnh sửa tên model thành channel (chữ viết hoa)
use Faker\Factory as Faker;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            channel::create([
                'ChannelName' => $faker->word,
                'Description' => $faker->sentence,
                'SubscribersCount' => $faker->numberBetween(100, 10000),
                'URL' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}