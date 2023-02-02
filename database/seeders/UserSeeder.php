<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"          => "Super Admin",
            "email"         => "superadmin@desktopit.com",
            "password"      => Hash::make("desktopit123"),
            "role"          => 0,
            "status"        => 1
        ]);

        User::create([
            "sp_id"         => "sp-01",
            "name"          => "Super Net",
            "email"         => "supernet@desktopit.com",
            "password"      => Hash::make("1234"),
            "role"          => 1,
            "division"      => 2,
            "district"      => 1,
            "upzila"      => 1,
            "status"        => 1
        ]);

        User::create([
            "sp_id"         => "sp-02",
            "name"          => "Dot Net",
            "email"         => "dotnet@desktopit.com",
            "password"      => Hash::make("1234"),
            "role"          => 1,
            "division"      => 6,
            "district"      => 1,
            "upzila"      =>  1,
            "status"        => 1
        ]);
    }
}
