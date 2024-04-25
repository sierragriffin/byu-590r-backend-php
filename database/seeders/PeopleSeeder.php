<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            ['fullname' => 'John Doe'],
            ['fullname' => 'Jane Smith'],
            ['fullname' => 'Sierra Griffin'],
            ['fullname' => 'Masako Griffin'],
            ['fullname' => 'Glenn Griffin Sr.'],
            ['fullname' => 'Autumn Griffin'],
            ['fullname' => 'Summer Griffin'],
            ['fullname' => 'Sunny Griffin'],
            ['fullname' => 'Glenn Griffin Jr.'],
            // Add more people as needed
        ];

        // Insert data into the people table
        Person::insert($people);
    }
}
