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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('table_name', 255)->nullable();
            $table->integer('table_number');
            $table->integer('table_capacity');
            $table->integer('table_width');
            $table->integer('table_height');
            $table->string('table_color', 255);
            $table->enum('table_status', ['Empty', 'Filled'])->default('Empty');
            $table->enum('table_position', ['Inside 1', 'Inside 2', 'Outside 1', 'Outside 2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
