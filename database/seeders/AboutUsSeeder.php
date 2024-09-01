<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
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
}
