<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';

    public function field()
    {
        return $this->hasMany(\App\Models\FormField::class, 'form_id', 'id');
    }

    public function entry()
    {
        return $this->hasMany(\App\Models\Entry::class, 'form_id', 'id');
    }

    public function countEntry()
    {
        if(isset($this->entry))
            return count($this->entry); 
        return 0;
    }

    public function generatePresult()
    {
        
    }

    // this is a recommended way to declare event handlers
    protected static function booted () {
        static::deleting(function(Form $form) { // before delete() method call this
            $form->entry()->delete();
            $form->field()->delete();
        });
    }
}
