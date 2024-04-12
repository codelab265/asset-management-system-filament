<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('asset_id');
            $table->foreignId('previous_department_id');
            $table->foreignId('previous_personnel_id');
            $table->foreignId('current_department_id');
            $table->foreignId('current_personnel_id');
            $table->date('moved_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
