<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogBreed extends Model
{
    
    use HasFactory;
    
    
    protected $guarded = array('id');
    
    public function dogbreed()
    {
        $categories = DogBreed::pluck('dog_breed', 'id');

        return $categories;
    }
    
    public function dog()
    {
        return $this->hasOne(Dog::class);
    }
}
