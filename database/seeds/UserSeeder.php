<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => Str::random(0).'1',
            'name' => Str::random(0).'raza',
            'email' => Str::random(0).'raza@gmail.com',
            'password' => Str::random(0).'$2y$10$0/LGr9p.KYxFJ7kpxdZibe5nES/nX5D/E8mM7Sask27AEPn8Ic8Em',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
    }
}
