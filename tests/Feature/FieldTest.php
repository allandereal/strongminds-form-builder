<?php

namespace Tests\Feature;

use App\Models\Field;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FieldTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_field()
    {
        $field = Field::factory()->make();
        $response = $this->post(route('fields.store'), $field->attributesToArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas('fields', $field->attributesToArray());
    }
}
