<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldOptionRequest;
use App\Http\Requests\UpdateFieldOptionRequest;
use App\Models\FieldOption;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldOption $fieldOption)
    {
        //
    }
}
