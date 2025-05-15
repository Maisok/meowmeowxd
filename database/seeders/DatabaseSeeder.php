<?php

namespace Database\Seeders;

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

        public function run(): void
        {
            $status=['open', 'close'];
            $type_order=['comfirmed', 'cancelled', 'ending'];

            DB::table('users')->insert([
                'fio' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'phone' => Str::random(10),
                'login' => Str::random(10),
                'password' => Str::random(10),
            ]);

            DB::table('locations')->insert([
                'name' => Str::random(10),
                'capacity' => 1,
                'typelocation' => $status[array_rand($status)],
            ]);

            
            DB::table('orders')->insert([
                'user_id' => 1,
                'price' => 10.23,
                'locations_id' => 1,
                'type_order' => $type_order[array_rand($type_order)],
                'dateTime' => now(),
                'cancelled_reason'=>Str::random(100)
            ]);
        }
    
}
