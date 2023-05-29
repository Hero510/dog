<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required|max:50',
        'body' => 'required|max:300',
        'image_path' => 'required',
        );
        
    public static $editRules = array(
     
        );
    
    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
