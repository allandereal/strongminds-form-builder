<?php

namespace Database\Factories;

use App\Models\FormField;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FieldDependency>
 */
class FieldDependencyFactory extends Factory
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
            'depends_on' => FormField::factory(),
            'value' => 2,
            'action' => 'show'
        ];
    }
}
