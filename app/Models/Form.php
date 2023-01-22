<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function formFields()
    {
        return$this->hasMany(FormField::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('with_related', function (Builder $builder) {
            $builder->with([
                'formFields.fieldOptions',
                'formFields.fieldValidations',
                'formFields.fieldCalculations',
            ]);
        });
    }
}
