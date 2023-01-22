<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldOptionRequest;
use App\Http\Requests\UpdateFieldOptionRequest;
use App\Http\Resources\FieldOptionResource;
use App\Http\Resources\FormResource;
use App\Models\FieldOption;
use App\Models\Form;
use App\Models\FormField;

class FieldOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreFieldOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldOptionRequest $request)
    {
        $field_option = FieldOption::create([...$request->validated(), 'value' => 'unnamed!']);
        return new FieldOptionResource($field_option);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function show(FieldOption $fieldOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldOption $fieldOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldOptionRequest  $request
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldOptionRequest $request, FieldOption $fieldOption)
    {
        return $fieldOption->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return FormResource
     */
    public function destroy(FieldOption $fieldOption)
    {
        $form_field = FormField::find($fieldOption->form_field_id);

        $fieldOption->delete();

        return new FormResource(Form::find($form_field->form_id));
    }
}
