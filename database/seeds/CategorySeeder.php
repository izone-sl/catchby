<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'category' => Str::random(0).'Mobile accessories',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        
        DB::table('categories')->insert([
            'category' => Str::random(0).'Computer accessories',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        
        DB::table('categories')->insert([
            'category' => Str::random(0).'Health and Beauty',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Mens Clothing',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Womens Clothing',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Mens Accessories',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Womens Accessories',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        DB::table('categories')->insert([
            'category' => Str::random(0).'24 Hours Essentials',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Sport Equipments',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        DB::table('categories')->insert([
            'category' => Str::random(0).'Kitchen Equipments',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Shoes & Bags',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        DB::table('categories')->insert([
            'category' => Str::random(0).'Wrist watches',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);

        DB::table('categories')->insert([
            'category' => Str::random(0).'Electoronics',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        DB::table('categories')->insert([
            'category' => Str::random(0).'Gift & Packs',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);
        
        DB::table('categories')->insert([
            'category' => Str::random(0).'Offered Products',
            'created_at' => Str::random(0).'2020-10-21 08:07:12',
            'updated_at' => Str::random(0).'2020-10-21 08:07:12',
        ]);       
    }
}
















