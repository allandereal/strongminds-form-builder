<?php

namespace Database\Seeders;

use App\Models\FieldCalculation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldCalculation::factory()->create();
    }
}
