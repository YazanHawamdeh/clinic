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

        DB::table('about_us')->insert([
            'title' => 'Our Story',
            'description' => 'This is a detailed description about our company.',
            'image' => 'main_image.jpg', // Main image
            'image_box_1' => 'image1.jpg',
            'title_box_1' => 'Box 1 Title',
            'description_box_1' => 'Description for Box 1',
            'image_box_2' => 'image2.jpg',
            'title_box_2' => 'Box 2 Title',
            'description_box_2' => 'Description for Box 2',
            'image_box_3' => 'image3.jpg',
            'title_box_3' => 'Box 3 Title',
            'description_box_3' => 'Description for Box 3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */


    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
