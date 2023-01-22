<?php

namespace Database\Seeders;

use App\Models\FieldValidation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldValidationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldValidation::factory()->create();
    }
}
