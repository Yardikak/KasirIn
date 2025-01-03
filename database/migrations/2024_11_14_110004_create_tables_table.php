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
            $table->string('table_name', 255)->nullable(); // Nullable as it's optional
            $table->integer('table_number')->nullable();  // Unique constraint for table_number
            $table->integer('table_capacity')->unsigned(); // Ensure capacity is a positive integer
            $table->integer('table_width')->unsigned(); // Ensure width is positive
            $table->integer('table_height')->unsigned(); // Ensure height is positive
            $table->string('table_color', 255); 
            $table->enum('table_status', ['Empty', 'Filled'])->default('Empty'); // Enum for table status
            $table->enum('table_position', ['1','2','3']); // Enum for table position
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
