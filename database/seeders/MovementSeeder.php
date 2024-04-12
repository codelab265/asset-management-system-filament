<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Movement::factory(10)->create();
    }
}
