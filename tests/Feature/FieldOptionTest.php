<?php

namespace Tests\Feature;

use App\Models\FieldOption;
use App\Models\FormField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FieldOptionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_field_option()
    {
        $field_option = FormField::factory()->create();
        $response = $this->post(route('field-options.store', ['form_field_id' => $field_option->id]));

        $response->assertStatus(201);
    }

    public function test_can_update_field_option()
    {
        $old_value = fake()->name();
        $new_value = fake()->name();

        $field_option = FieldOption::factory()->create(['value' => $old_value]);
        $new_field_option = [
            'value' => $new_value,
            'id' => $field_option->id
        ];

        $response = $this->put(route('field-options.update', [
            'field_option' => $field_option->id
        ]), $new_field_option);

        $this->assertDatabaseHas('field_options', $new_field_option);
        $response->assertStatus(200);
    }
}
