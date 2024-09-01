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
        Schema::create('related_links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->text('link');
            $table->text('description');
            $table->string('image'); 

        });

        DB::table('related_links')->insert([
            'title' => 'Related Link Title',
            'link' => 'https://example.com',
            'description' => 'This is a description for the related link.',
            'image' => 'related_image.jpg', // Image associated with the link
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('related_links');
    }
};
