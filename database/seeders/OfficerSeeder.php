<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "admin@admin.com",
            "image" => "",
            "status" => "active",
            "password" => bcrypt("password")
        ]);
        $user->assignRole("officer");
        $user->assignRole("teacher");
    }
}
