<?php

namespace Tests\Feature;

use App\Models\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_form()
    {
        $form = Form::factory()->make();
        $response = $this->post(route('forms.store'), $form->attributesToArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas('forms', $form->attributesToArray());
    }
}
