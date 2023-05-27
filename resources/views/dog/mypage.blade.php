@extends('layouts.main')
@section('title', 'DogsInformation', 'mypage')

<head>
    <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
    <div class="container">
        <div class="col-md-6">
            <h2>User Information</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Nickname</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $auth->name }}</td>
                        <td>{{ $auth->email }}</td>
                        <td>{{ $auth->nickname }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('user.edit',['id' => $auth->id]) }}" class="btn btn-primary text-center">ユーザー情報を編集する</a>
        </div>
        <div class="col-md-6">
            <div class="dog information">
                <h2>Dog Information</h2>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Dog Name</th>
                                <th>Dog Breed</th>
                                <th>age</th>
                                <th>Breeding Way</th>
                                <th>House</th>
                                <th>Food</th>
                            </tr>
                        </thead>
                        @foreach ($auth->dogs as $dog)
                            <img src="{{ secure_asset('images/' . $dog->image_path) }}">
                            <tbody>
                                <tr>
                                    <td>{{ $dog->name }}</td>
                                    <td>{{ $dog->dog_breed_id }}</td>
                                    <td>{{ $dog->age }}</td>
                                    <td>{{ $dog->breeding_way }}</td>
                                    <td>{{ $dog->house }}</td>
                                    <td>{{ $dog->food }}</td>
                                </tr>
                            </tbody>
                        @endforeach      
            <a href="{{ route('dog.add') }}" class="btn btn-primary">愛犬登録</a>
                </table>
            </div>                
        </div>
        <tbody>
        </tbody>   
             <!--退会処理を追加-->
    </div>
@endsection
