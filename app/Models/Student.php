<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'field_id', 
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    
    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }

    
}
