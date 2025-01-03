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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Publication title
            $table->string('author');  // Author of the publication
            $table->decimal('price', 10, 2);  // Price of the publication
            $table->integer('stock');  // Stock available
            $table->integer('sold')->default(0);  // Number of copies sold
            $table->decimal('weight', 5, 2);  // Weight of the publication
            $table->string('cover_image')->nullable();  // Cover image path
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
