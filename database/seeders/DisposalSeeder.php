<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DisposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Disposal::factory(10)->create();
    }
}
