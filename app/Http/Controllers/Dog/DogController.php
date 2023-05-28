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
    
 
    public function imageCropPost(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/images/" . $image_name;

        file_put_contents($path, $data);

        return response()->json(['status' => 1, 'image_path'=>$image_name, 'message' => "Image uploaded successfully"]);
    }
    public function create(Request $request)
    {
       
        // バリデーション
        $this->validate($request, Dog::$rules);
        
        // dogの登録
        // $dog = new Dog();
        $form = $request->all();
        // dd($form);
        
        
        
        unset($form['_token']);
        unset($form['image']);
                
        
        // $dog->fill($form);
        // $dog->user_id = Auth::id();
    
        $user = Auth::user();
        $user->dogs()->create($form);
        // $dog->save();

        // 登録完了後のリダイレクト先などの処理を追加

        return redirect('mypage');
    }
    
    public function edit(Request $request)
    {
    
        $category = new DogBreed;
        $categories = $category->dogbreed();
        $auth = Auth::user();
        return view('dog.edit',['categories' => $categories, 'auth' => $auth]);
    }
    
    public function update(Request $request)
    {
       
        
        $this->validate($request, Dog::$rules);
        
       
        $form = $request->all();
         
      
        $userId = Auth::id(); // ログインユーザーのIDを取得
        $dog = Dog::where('user_id', $userId)->first();
        // dd($dog);

        $originalImagePath = $dog->image_path;
        
        
        if ($request->hasFile('image')) {
            // 画像をアップロードして新しいパスを取得
            $newImagePath = $request->file('image')->store('images');
            
            // 新しいパスをフォームに設定
            $form['image_path'] = $newImagePath;
            
        } else {
            // 画像がアップロードされなかった場合、元の画像パスをフォームに設定
            $form['image_path'] = $originalImagePath;
        }
        
        unset($form['_token']);
        unset($form['image']);
                
       
    
        $user = Auth::user();
        // dd($form);
        $user->dogs()->update($form);
       
        return redirect('mypage');
    }
    
}


