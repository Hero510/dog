<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\User;
use App\Models\Post;
use App\Models\DogBreed;

class PostController extends Controller
{
    public function add()
    {
        
        $auth = Auth::id();
        return view('post.create',['auth' => $auth]);
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
       
       
        $this->validate($request, Post::$rules);
        
       
        $form = $request->all();
        // dd($form);
       
        
        unset($form['_token']);
        unset($form['image']);
                
        
        $user = Auth::user();
        $dogId = null;
        $dog = $user->dogs()->first();
        if ($dog) {
            $dogId = $dog->id;
        }

        // dd($dogId);
        $dog->post()->create($form);       
        

        // 登録完了後のリダイレクト先などの処理を追加

        return redirect('mypage');
    }
    
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('updated_at');
        
        // $postId = Post::pluck('id');
        // $dog = Dog::where('dog_id', $postId)->first();
        // $auth = Auth::user();
        
        return view('dog.index', ['posts' => $posts]);
        
    }
}
