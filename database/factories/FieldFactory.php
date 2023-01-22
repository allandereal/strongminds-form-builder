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
            ['name' => 'Calc Field', 'html_tag' => 'input'],
            ['name' => 'Multisel', 'html_tag' => 'input:checkbox'],
            ['name' => 'Singlesel', 'html_tag' => 'input:radio'],
        ];

        return $fields[array_rand($fields)];
    }
}
