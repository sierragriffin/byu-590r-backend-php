<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds
     * 
     * @return void
     */
    public function run() {
        $users = [
            [
                'name' => 'Sierra Griffin',
                'email' => 'sierra.griffin14@gmail.com',
                'email_verified_at' => null,
                'avatar' => null,
                'password' => bcrypt('Testing123!'),
                // 'created_at' => '2024-03-09 02:29:39.000',
                // 'updated_at' => '2024-03-09 02:30:39.000'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ];
        User::insert($users);
    }
}
