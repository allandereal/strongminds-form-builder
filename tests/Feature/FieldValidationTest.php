<?php

namespace Tests\Feature;

use App\Models\FieldValidation;
use App\Models\FormField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FieldValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_field_validation()
    {
        $form_field = FormField::factory()->create();
        $response = $this->post(route('field-validations.store', [
            'value' => 'required',
            'form_field_id' => $form_field->id
        ]));

        $response->assertStatus(201);
    }

    public function test_can_update_field_validation()
    {
        $old_value = fake()->name();
        $new_value = fake()->name();

        $field_validation = FieldValidation::factory()->create(['value' => $old_value]);
        $new_field_validation = [
            'value' => $new_value,
            'id' => $field_validation->id
        ];

        $response = $this->put(route('field-validations.update', [
            'field_validation' => $field_validation->id
        ]), $new_field_validation);

        $this->assertDatabaseHas('field_validations', $new_field_validation);
        $response->assertStatus(200);
    }
}
