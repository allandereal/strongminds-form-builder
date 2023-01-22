<?php

namespace Database\Factories;

use App\Models\FormField;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FieldCalculation>
 */
class FieldCalculationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_form_field_id' => FormField::factory(),
            'operator' => fake()->randomElement(['+', '-', '*', '/']),
            'second_form_field_id' => FormField::factory(),
        ];
    }
}
