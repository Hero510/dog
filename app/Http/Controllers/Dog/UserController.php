<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    
    public function edit($id)
    {
        $auth = Auth::user();
        // dd($auth);
        return view('user.edit', ['auth' => $auth]);
    }
    
    

    public function update(Request $request)

    {
    
        // バリデーション\
        
        $this->validate($request, User::$rules);
        
        // 対象レコード
        
        $auth = User::find($request->id);
        
        // リクエストデータ受取
        
        $form = $request->all();
        // dd($form);
        
        // フォームトークン削除
        
        unset($form['_token']);
        
       
        
        foreach ($form as $key => $value) {
        
        // nullの場合更新対象から除外する
        
        if($value == null) {
        
        unset($form[$key]);
        
            }
        
         }
        
       
        
        // ハッシュ化
        
        if (isset($form['password'])) {
        
        $form['password'] = Hash::make($form['password']);
        
         }
        
        // レコードアップデート
        
        $auth->fill($form)->save();
        
        return redirect('mypage');
    
    }

        
}
