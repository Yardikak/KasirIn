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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 255);
            $table->text('product_description')->nullable();
            $table->decimal('product_cost', 12, 2);
            $table->decimal('product_price', 12, 2);
            $table->integer('product_quantity');
            $table->string('product_image', 255)->nullable();
            $table->enum('product_status', ['Ready', 'Not Ready'])->default('Ready');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
