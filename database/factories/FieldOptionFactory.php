<?php

namespace Database\Factories;

use App\Models\FormField;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FieldOption>
 */
class FieldOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'form_field_id' => FormField::factory(),
            'value' => fake()->word(),
            'checked' => fake()->boolean()
        ];
    }
}
