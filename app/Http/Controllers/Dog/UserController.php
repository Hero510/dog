<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function edit($id)
    {
        $auth = Auth::user();
        // dd($auth);
        return view('user.edit', ['auth' => $auth]);
    }
    
    

    public function update(Request $request, $id)

    {
    
        // バリデーションルール
        
        $this->validate($request, User::$editRules);
        
        // 対象レコード取得
        
        $auth = User::find($id);
        
        // リクエストデータ受取
        
        $form = $request->all();
        
        // フォームトークン削除
        
        unset($form['_token']);
        
        // フォーム要素の評価
        
        foreach ($form as $key => $value) {
        
        // nullの場合更新対象から除外する
        
        if($value == null) {
        
        unset($form[$key]);
        
         }
        
         }
        
        // パスワード処理
        
        // ハッシュ化
        
        if (isset($form['password'])) {
        
        $form['password'] = Hash::make($form['password']);
        
         }
        
        // レコードアップデート
        
        $auth->fill($form)->save();
        
        return redirect('mypage');
    
    }

        
}
