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
        // ユーザーに選んでもらうドッグのidにする

        // dd($dogId);
        $dog->post()->create($form);       
        

        // 登録完了後のリダイレクト先などの処理を追加

        return redirect('post.index');
    }
    
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('updated_at');
        
        // $postId = Post::pluck('id');
        // $dog = Dog::where('dog_id', $postId)->first();
        // $auth = Auth::user();
        
        return view('dog.index', ['posts' => $posts]);
        
    }
    
    public function show(Request $request)
    {
        
        $category = new DogBreed;
        $categories = $category->dogbreed();
       
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');
       
        
        return view('post.serch', ['categories' => $categories]);
        
    }
    
    public function search(Request $request)
{
    $searchWord = $request->input('searchWord');
    // $categoryId = $request->input('categoryId');

    $query = Post::query();
    
    $posts = Post::where(function ($query) use ($searchWord) {
        $query->where('title', 'like', "%$searchWord%")
        ->orWhere('body', 'like', "%$searchWord%");
        })->get();
    
    // if (isset($searchWord)) {
    // $searchWord = str_replace(['%', '_'], ['\%', '\_'], $searchWord);
    // $query->where('title', 'like', "%$searchWord%")
    //     ->orWhere('content', 'like', "%$searchWord%");
    // }
    
    // if (isset($categoryId)) {
    //     $query->whereHas('dog', function ($query) use ($categoryId) {
    //         $query->whereHas('breed', function ($query) use ($categoryId) {
    //             $query->where('category_id', $categoryId);
    //         });
    //     });
    // }
    // dd($posts);
    // $posts = $query->orderBy('created_at', 'desc');
    
    // $category = new DogBreed;
    // $categories = $category->dogbreed();

    return view('post.serch', ['posts' => $posts]);

    
}   

    
    public function edit(Request $request)
    {   
        $post = Post::find($request->id);
        $auth = Auth::user();
        // $userId = Auth::id();
        // $dog = Dog::where('user_id', $userId)->first();
        // $post = $dog->post;
        // dd($post);
        if (empty($post)) {
            abort(404);
        }
       
        return view('post.edit', ['post' => $post, 'auth' => $auth]);
    }
    
    public function update(Request $request)
    {
        $form = $request->all();
        // フォームから送信されたポストを参照
       
        $postId = $request->input('post_id');
        $post = Post::find($postId);
        
        $originalImagePath = $post->image_path;
        if ($request->hasFile('image')) {
            unset($form['image']);
        } else {
            // 画像がアップロードされなかった場合、既存の画像パスをフォームに設定
            $form['image_path'] = $originalImagePath;
        }
        
        unset($form['_token']);
        
        // ポストの更新
       
        // dd($form);
        $post->update($form);
        

        return redirect()->route('post.index');
        
    }
    
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        // dd($post);
        
        $post->delete();
        
        return redirect()->route('post.index');
    }
}
