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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->text('description');
            $table->string('image'); // Main image
            $table->string('image_box_1')->nullable();
            $table->string('title_box_1')->nullable();
            $table->text('description_box_1')->nullable();
            $table->string('image_box_2')->nullable();
            $table->string('title_box_2')->nullable();
            $table->text('description_box_2')->nullable();
            $table->string('image_box_3')->nullable();
            $table->string('title_box_3')->nullable();
            $table->text('description_box_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
