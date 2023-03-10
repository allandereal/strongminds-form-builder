<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fields = [
            ['name' => 'Short Text', 'html_tag' => 'input:text'],
            ['name' => 'Long Text', 'html_tag' => 'textarea'],
            ['name' => 'Number', 'html_tag' => 'input:number'],
            ['name' => 'Date', 'html_tag' => 'input:date'],
            ['name' => 'Calculated', 'html_tag' => 'input'],
            ['name' => 'Multiselect', 'html_tag' => 'input:checkbox'],
            ['name' => 'Singleselect', 'html_tag' => 'input:radio'],
        ];

        return $fields[array_rand($fields)];
    }
}
