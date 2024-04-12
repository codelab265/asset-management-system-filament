<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Personnel::factory(10)->create();
    }
}
