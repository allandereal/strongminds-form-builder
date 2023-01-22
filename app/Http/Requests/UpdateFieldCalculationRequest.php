<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldCalculationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'form_field_id' => ['required', 'exists:form_fields'],
            'first_form_field_id' => ['required', 'exists:form_fields'],
            'operator' => ['required'],
            'second_form_field_id' => ['required', 'exists:form_fields'],
        ];
    }
}
