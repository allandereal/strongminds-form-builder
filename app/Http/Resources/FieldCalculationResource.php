<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldCalculationResource extends JsonResource
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
            'form_field_id' => $this->form_field_id,
            'first_form_field_id' => $this->first_form_field_id,
            'operator' => $this->operator,
            'second_form_field_id' => $this->second_form_field_id,
        ];
    }
}
