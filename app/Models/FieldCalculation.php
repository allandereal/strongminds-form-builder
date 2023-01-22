<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_field_id',
        'first_form_field_id',
        'operator',
        'second_form_field_id',
    ];
}
