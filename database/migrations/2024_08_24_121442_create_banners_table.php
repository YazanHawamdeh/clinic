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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description'); // Use 'text' type for longer descriptions
            $table->text('title'); 
            $table->string('image_url_1')->nullable(); // First image
            $table->string('image_url_2')->nullable(); // Second image
        });

        DB::table('banners')->insert([
            'description' => 'This is a banner description.',
            'title' => 'Banner Title',
            'image_url_1' => 'banner_image1.jpg', // First image
            'image_url_2' => 'banner_image2.jpg', // Second image
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
