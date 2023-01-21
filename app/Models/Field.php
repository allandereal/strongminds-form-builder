<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'html_tag',
    ];

    public function formFields()
    {
        return$this->hasMany(FormField::class);
    }
}
