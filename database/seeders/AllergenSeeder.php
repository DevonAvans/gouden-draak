<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergens')->insert([
            'name' => 'gluten',
            'description' => 'bevat gluten',
        ]);
        DB::table('allergens')->insert([
            'name' => 'lactose',
            'description' => 'bevat lactose',
        ]);
        DB::table('allergens')->insert([
            'name' => 'varkensvlees',
            'description' => 'bevat varkensvlees',
        ]);
    }
}
