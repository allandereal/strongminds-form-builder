<?php

namespace App\Http\Resources;

use App\Models\FieldCalculation;
use Illuminate\Http\Resources\Json\JsonResource;

class FormFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'form' => $this->form->attributesToArray(),
            'field' => $this->field->attributesToArray(),
            'fieldOptions' => FieldOptionResource::collection($this->fieldOptions),
            'fieldValidations' => FieldValidationResource::collection($this->fieldValidations),
            'fieldCalculations' => FieldCalculationResource::collection($this->fieldCalculations),
        ];
    }
}
