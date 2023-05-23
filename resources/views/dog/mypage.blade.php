@extends('layouts.main')
@section('title', 'DogsInformation')

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
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nickname }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-primary text-center">ユーザー情報を編集する</a>
            </div>
            <div class="col-md-6">
                <h2>Other Information</h2>
                <!-- Add other information column here -->
            </div>
        </div>
    </div>
@endsection
