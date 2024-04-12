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
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id');
            $table->foreignId('department_id');
            $table->foreignId('personnel_id');
            $table->foreignId('status_id');
            $table->string('tag_number');
            $table->string('model_number');
            $table->string('serial_number');
            $table->date('purchase_date');
            $table->float('purchase_price');
            $table->integer('warrant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acquisitions');
    }
};
