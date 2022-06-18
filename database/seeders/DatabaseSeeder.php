<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);
        $this->call([NewsSeeder::class]);
        User::factory()->create([
            'name' => 'Devon',
            'email' => 'admin@example.com',
            'role_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'Koen',
            'email' => 'koen@example.com',
            'role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Ray',
            'email' => 'ray@example.com',
            'role_id' => 3,
        ]);
        User::factory()->create([
            'name' => 'Noah',
            'email' => 'noah@example.com',
            'role_id' => 4,
        ]);
    }
}
