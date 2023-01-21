<?php

namespace Tests\Feature;

use App\Models\FormField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormFieldTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_form_field()
    {
        $form_field = FormField::factory()->make();
        $response = $this->post(route('form-fields.store'), $form_field->attributesToArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas('form_fields', $form_field->attributesToArray());
    }

    public function test_can_update_form_field_name()
    {
        $old_name = fake()->name();
        $new_name = fake()->name();

        $form_field = FormField::factory()->create(['name' => $old_name]);
        $new_form_field = [
            'name' => $new_name,
            'id' => $form_field->id
        ];

        $response = $this->put(route('form-fields.update', ['form_field' => $form_field->id]), $new_form_field);

        $this->assertDatabaseHas('form_fields', $new_form_field);
        $response->assertStatus(200);
    }
}
