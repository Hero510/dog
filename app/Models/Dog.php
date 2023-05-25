<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    
    protected $fillable = [
        'name',
        'age',
        'breeding_way',
        'house', 'walk',
        'food',
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function dogbreed()
    {
        return $this->hasOne(DogBreed::class);
    }
}
