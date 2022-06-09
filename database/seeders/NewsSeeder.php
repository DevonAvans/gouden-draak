<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => 'Corona update',
            'content' => 'Door de Corona crisis is De Gouden Draak op het moment slechts beperkt open. Het restaurant-gedeelte is gesloten. U kan uw favoriete gerechten nog wel afhalen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Welkom Xi Jing Ping ',
            'content' => 'Onze geliefde leider Xi Jing Ping is in ons restaurant geweest! Hij is nu een van onze medewerkers en zal uw gerechten voor u bezorgen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Lao gan ma op!',
            'content' => 'Helaas is er iets misgegaan met de leveringen! We zullen dit zo spoedig mogelijk oplossen.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
