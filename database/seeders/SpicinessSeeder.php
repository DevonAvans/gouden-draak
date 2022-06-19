<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpicinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spiciness')->insert([
            'description' => 'Mild',
        ]);
        DB::table('spiciness')->insert([
            'description' => 'Sterk gekruid',
        ]);
        DB::table('spiciness')->insert([
            'description' => 'Tan2Sterk gekruid',
        ]);
    }
}
