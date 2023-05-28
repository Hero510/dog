<?php

namespace App\Http\Controllers\Dog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
    
}
