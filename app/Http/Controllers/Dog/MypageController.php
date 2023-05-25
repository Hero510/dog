<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MypageController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        // dd($auth);
        return view('dog.mypage', ['auth' => $auth]);
    }
}
