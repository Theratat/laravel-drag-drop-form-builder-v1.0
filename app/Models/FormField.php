<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $table = 'form_fields';
    
    public function form_id()
    {
        return $this->belongsTo(\App\Model\Form::class);
    }
}

