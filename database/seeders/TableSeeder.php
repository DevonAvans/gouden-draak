<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'seats' => '2',
            'user_id' => '1',
        ]);
        DB::table('tables')->insert([
            'seats' => '8',
        ]);
        DB::table('tables')->insert([
            'seats' => '2',
        ]);
    }
}
