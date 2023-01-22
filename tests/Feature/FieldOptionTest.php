<?php

namespace Tests\Feature;

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
        $form_field = FormField::factory()->create();
        $response = $this->post(route('field-options.store', ['form_field_id' => $form_field->id]));

        $response->assertStatus(201);
    }
}
