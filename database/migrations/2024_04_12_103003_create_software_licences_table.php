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
        Schema::create('software_licences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('asset_id');
            $table->string('edition');
            $table->string('version');
            $table->date('installed_on');
            $table->string('os_build');
            $table->string('experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_licences');
    }
};
