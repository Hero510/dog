<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dog;

class MypageController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        
        // $dog = Dog::where('user_id', $auth->id)->first();
        // dd($dog);
        return view('dog.mypage', ['auth' => $auth]);
    }
    
}
