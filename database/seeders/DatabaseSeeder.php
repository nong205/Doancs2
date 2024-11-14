<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//        DB::table('users')->insert([
//            'name' => 'Thanh long',
//            'email' => 'longthanhnct@gmai.com',
//            'password' => Hash::make('long2702'),
//            'address' => 'Quang Nam',
//            'image' => 'longdepzai.png',
//            'phone' => '0335958311',
//        ]);

        $this->call([
            UserSeeder::class
        ]);

    }
}
