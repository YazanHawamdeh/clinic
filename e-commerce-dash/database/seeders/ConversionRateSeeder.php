<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConversionRate;

class ConversionRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConversionRate::create([
            'conversion_rate' => 10, // Set your initial conversion rate here
        ]);
    }
}
