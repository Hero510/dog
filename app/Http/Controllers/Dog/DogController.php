<?php

namespace App\Http\Controllers\Dog;

use App\Models\DogBreed;
use App\Models\Dog;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DogController extends Controller
{
    
   public function add()
    {
        $category = new DogBreed;
        $categories = $category->dogbreed();
        $userId = Auth::id();
        return view('dog.create',['categories' => $categories, 'userId' => $userId]);
    }

    public function create(Request $request)
    {
       
        // バリデーション
        $this->validate($request, Dog::$rules);
        
        // dogの登録
        $dog = new Dog();
        $form = $request->all();
        // dd($form);
         
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $dog->image_path = basename($path);
        } else {
            $dog->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        
        $dog->fill($form);
        $dog->save();

        // 登録完了後のリダイレクト先などの処理を追加

        return redirect('mypage');
    }
}
