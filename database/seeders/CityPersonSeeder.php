<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Person;

class CityPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all cities
        $cities = City::all();
        // Get IDs of all people
        $personIds = Person::pluck('id');

        // Loop through each city and attach a random set of people to it
        foreach ($cities as $city) {
            // Determine how many people to attach (e.g., 1 to 5 people per city)
            $count = rand(1, 5);
            // Get a random sample of person IDs
            $randomPersonIds = $personIds->random($count)->all();
            // Attach people to the city using sync to avoid duplicate attachments
            $city->people()->sync($randomPersonIds);
        }
    }
}