<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function add()
    {
        return view('dog.home');
    }
}
