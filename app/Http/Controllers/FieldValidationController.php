<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudFieldValidationRequest;
use App\Http\Requests\StoreFieldValidationRequest;
use App\Http\Requests\UpdateFieldValidationRequest;
use App\Http\Resources\FieldOptionResource;
use App\Http\Resources\FieldValidationResource;
use App\Http\Resources\FormResource;
use App\Models\FieldOption;
use App\Models\FieldValidation;
use App\Models\Form;
use App\Models\FormField;

class FieldValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crud(CrudFieldValidationRequest $request)
    {
        $existing_validation = FieldValidation::query()
            ->where('form_field_id', $request->form_field_id)
            ->where('value', $request->value)
            ->first();

        if ($request->action === 'create' && !$existing_validation){
            FieldValidation::create($request->only(['form_field_id', 'value']));
        } elseif ($request->action === 'delete'){
            $existing_validation->delete();
        }

        return response()->json($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldValidationRequest  $request
     * @return FieldValidationResource
     */
    public function store(StoreFieldValidationRequest $request)
    {
        $field_validation = FieldValidation::create($request->validated());
        return new FieldValidationResource($field_validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldValidation  $fieldValidation
     * @return \Illuminate\Http\Response
     */
    public function show(FieldValidation $fieldValidation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldValidation  $fieldValidation
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldValidation $fieldValidation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldValidationRequest  $request
     * @param  \App\Models\FieldValidation  $fieldValidation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldValidationRequest $request, FieldValidation $fieldValidation)
    {
        return $fieldValidation->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldValidation  $fieldValidation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldValidation $fieldValidation)
    {
        $form_field = FormField::find($fieldValidation->form_field_id);

        $fieldValidation->delete();

        return new FormResource(Form::with(['formFields.fieldOptions', 'formFields.fieldValidations'])->find($form_field->form_id));
    }
}
