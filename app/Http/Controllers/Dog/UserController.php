<?php

namespace App\Http\Controllers\Dog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('user.edit', ['user' => $user]);
    }
    
    

    public function update(Request $request, User $user)
    {
    // dd($request);
    
    $this->validate($request, User::$rules);
    
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->nickname = $request->input('nickname');
    $user->password = Hash::make($request->input('password'));
    $user_form = $request->all();
    
    
    $user->save();

    
    return redirect()->route('mypage');
    }
}
