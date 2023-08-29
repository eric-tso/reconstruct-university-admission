<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'adminadmin',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        \App\Models\User::create([
            'name' => 'officer',
            'email' => 'officer@example.com',
            'password' => 'officerofficer',
            'role' => 'officer',
            'email_verified_at' => now(),
        ]);

        $this->call(ProgrammeSeeder::class);
    }
}
