<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'form_field_id'];

    public function formField()
    {
        return $this->belongsTo(FormField::class);
    }
}
