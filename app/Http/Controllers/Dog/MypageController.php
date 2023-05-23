<?php

namespace App\Http\Controllers\Dog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MypageController extends Controller
{
     public function index()
    {
        $users = User::all();
        return view('dog.mypage', ['users' => $users]);
    }
}
