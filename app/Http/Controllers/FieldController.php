<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Http\Resources\FieldResource;
use App\Models\field;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FieldResource::collection(Field::all(['id', 'name', 'html_tag']));
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
     * @param  \App\Http\Requests\StoreFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        return new FieldResource(Field::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldRequest  $request
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldRequest $request, field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(field $field)
    {
        //
    }
}
