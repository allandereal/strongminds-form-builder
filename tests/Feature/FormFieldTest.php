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
}
