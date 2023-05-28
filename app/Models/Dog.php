<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'breeding_way' => 'required',
        'house' => 'required',
        'walk' => 'required',
        'food' => 'required',
        );
   
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function breed()
    {
        return DogBreed::find($this->dog_breed_id);
        // return $this->hasOne(DogBreed::class);
    }
    
    
}