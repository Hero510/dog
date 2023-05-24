@extends('layouts.main')
@section('title', 'DogsInformation', 'mypage')

<head>
    <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
    <div class="container">
        <div class="row">
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
                <h2>Other Information</h2>
             
                 
                <!-- Add other information column here -->
                <tbody>
                    <table class="table table-striped"> 
                        <td>
                            <a href="{{ route('dog.create') }}" class="btn btn-primary">愛犬登録</a>
                        </td>
                    </table>
                </tbody>   
            
            </div>
            <!--退会処理を追加-->
        </div>
    </div>
@endsection
