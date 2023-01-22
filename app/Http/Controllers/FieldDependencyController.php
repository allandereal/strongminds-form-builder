<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldDependencyRequest;
use App\Http\Requests\UpdateFieldDependencyRequest;
use App\Models\FieldDependency;

class FieldDependencyController extends Controller
{public function store(StoreFieldDependencyRequest $request)
    {
        FieldDependency::create($request->validated());
    }
    public function update(UpdateFieldDependencyRequest $request, FieldDependency $fieldDependency)
    {
        //
    }
}
