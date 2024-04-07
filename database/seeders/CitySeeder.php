<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $table->id();
    //     $table->integer('prefecture_id');
    //     $table->string('name');
    //     $table->string('description');
    //     $table->string('file');
    //     $table->timestamps();

        $cities = [
            [
                'capital_id' => 7,
                'name' => 'Tokyo', 
                'description' => 'Japan’s largest population center and main economic engine, and home to the nation’s capital, Tokyo is known around the world.',
                'file' => 'images/tokyo_map.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'capital_id' => 5,
                'name' => 'Niigata', 
                'description' => 'Niigata Prefecture is known for its heavy snow, its ornamental carp, and the island of Sado, which was once a place of exile and is now a habitat for the crested ibis.',
                'file' => 'images/niigata_map.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'capital_id' => 1,
                'name' => 'Hokkaidō', 
                'description' => 'Japan’s northernmost prefecture of Hokkaidō is also the largest and coldest. It is famed for frigid weather, and its capital Sapporo hosted the 1972 Winter Olympics; it is also a major farming and ranching center for the nation.',
                'file' => 'images/hokkaido_map.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'capital_id' => 6,
                'name' => 'Osaka', 
                'description' => 'Osaka Prefecture, at the center of Japan’s number-two urban conglomeration, is famous for its lively main city, popular castle, and manzai comedy double acts.',
                'file' => 'images/osaka_map.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'capital_id' => 2,
                'name' => 'Okinawa', 
                'description' => 'Japan’s southernmost prefecture, Okinawa boasts a subtropical climate and beautiful oceans that attract divers and beachgoers from throughout the country.',
                'file' => 'images/okinawa_map.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]


        ];
        City::insert($cities);
    }
}
