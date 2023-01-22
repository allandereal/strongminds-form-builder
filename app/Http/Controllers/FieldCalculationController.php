<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldCalculationRequest;
use App\Http\Requests\UpdateFieldCalculationRequest;
use App\Models\FieldCalculation;

class FieldCalculationController extends Controller
{

    public function store(StoreFieldCalculationRequest $request)
    {
        FieldCalculation::create($request->validated());
    }

    public function update(UpdateFieldCalculationRequest $request, FieldCalculation $fieldCalculation)
    {
        //
    }

}
