<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaintenanceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MaintenanceHistory::factory(10)->create();
    }
}
