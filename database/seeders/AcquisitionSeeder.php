<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AcquisitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Acquisition::factory(10)->create();
    }
}
