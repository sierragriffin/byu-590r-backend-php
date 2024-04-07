<?php

namespace Database\Seeders;

use App\Models\Capital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CapitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capitals = [
            [
                'name' => 'Sapporo',
                'description' => "A winter wonderland and summer haven, Sapporo is all about outdoor fun, great food and famous beer",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Naha',
                'description' => "Your portal to a lost island dynasty and a modern-day kingdom of seaside pleasures",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Shinjuku',
                'description' => "With the dubious distinction of being home to the busiest train station in the world, Shinjuku has so much to offer. From modern high rises to green oases, it's a mecca for shopping, eating and relaxing.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Fukuoka City',
                'description' => "Friendly people, fantastic seafood, ramen, Japan's biggest festival, and pristine nature",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Niigata City',
                'description' => "A city by the sea and a land of quality rice and sake",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Osaka City',
                'description' => "Bright, gaudy and playful: Osaka provides ample amusement with little pretension",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tokyo',
                'description' => "High rise, fast-paced and neon-lit, Tokyo is as futuristic as it is historical",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Capital::insert($capitals);
    }
}
