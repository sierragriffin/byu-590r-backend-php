<?php

namespace Database\Seeders;

use App\Models\Attraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attractions = [
            [
                'name' => 'Asahiyama Zoo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 3
            ],
            [
                'name' => 'Sapporo TV Tower',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 3
            ],
            [
                'name' => 'Niigata City Aquarium Marinepia Nihonkai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 2
            ],
            [
                'name' => 'Teradomari Fish Market Street',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 2
            ],
            [
                'name' => 'Kiyotsu Gorge',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 2
            ],
            [
                'name' => 'Okinawa World',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 5
            ],
            [
                'name' => 'Shuri Castle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 5
            ],
            [
                'name' => 'Nara Park',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 4
            ],
            [
                'name' => 'Tsutenkaku',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 4
            ],
            [
                'name' => 'Osaka Castle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 4
            ],
            [
                'name' => 'Tokyo Skytree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 1
            ],
            [
                'name' => 'Senso-ji Temple',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'city_id' => 1
            ]
        ];
        Attraction::insert($attractions);
    }
}
