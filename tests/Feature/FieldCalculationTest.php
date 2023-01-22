<?php

namespace Tests\Feature;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FieldCalculationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_field_calculation()
    {
        $form = Form::factory()->hasFormFields(3)->create();

        $response = $this->post(route('field-calculations.store'), [
            'form_field_id' => $form->formFields[0]->id,
            'first_form_field_id' => $form->formFields[1]->id,
            'operator' => '+',
            'second_form_field_id' => $form->formFields[2]->id,
        ]);

        $response->assertStatus(200);
    }
}
