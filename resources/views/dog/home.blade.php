@extends('layouts.main')
@section('title', 'DogsInformation')

<head>
    <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
    <div class="hero_container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-image">
                    <img src="{{ asset('img/二頭の犬.jpg') }}" alt="二頭の犬">
                </div>
                <div class="hero-text">
                    <h1>Dogs Information</h1>
                    <p>愛犬家が投稿した飼い犬の生活環境をヒントに<br>身近なものから愛犬との暮らしを豊かにする手助けになればと思います。（仮）</p>
                </div> 
            </div>
        </div>
    </div>
@endsection
