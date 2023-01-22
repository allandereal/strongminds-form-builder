<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'form_id',
        'field_id'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function fieldOptions()
    {
        return $this->hasMany(FieldOption::class);
    }

    public function fieldValidations()
    {
        return $this->hasMany(FieldValidation::class);
    }

    public function fieldCalculations()
    {
        return $this->hasMany(FieldCalculation::class);
    }
}
