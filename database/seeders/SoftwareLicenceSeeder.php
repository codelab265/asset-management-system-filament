<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SoftwareLicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SoftwareLicence::factory(10)->create();
    }
}
