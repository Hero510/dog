@extends('layouts.main')
@section('title', 'DogsInformation', 'mypage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card user-information">
                <div class="card-body">
                    <h2 class="card-title">User Information</h2>
                    <div class="user-details">
                        <h3>{{ $auth->name }}</h3>
                        <p>Email: {{ $auth->email }}</p>
                        <p>Nickname: {{ $auth->nickname }}</p>
                    </div>
                    <a href="{{ route('user.edit',['id' => $auth->id]) }}" class="btn btn-primary text-center">ユーザー情報を編集する</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card dog-information">
                <div class="card-body">
                    <h2 class="card-title">Dog Information</h2>
                    @foreach ($auth->dogs as $dog)
                    <div class="dog-item">
                        <div class="dog-image">
                            <img src="{{ secure_asset('images/' . $dog->image_path) }}" alt="{{ $dog->name }}">
                        </div>
                        <div class="dog-details">
                            <h3>{{ $dog->name }}</h3>
                            <div class="dog-info">
                                <div class="row">
                                    <div class="col-sm-4"><span class="info-label">Dog Breed:</span></div>
                                    <div class="col-sm-8">{{ $dog->breed()->dog_breed }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><span class="info-label">Age:</span></div>
                                    <div class="col-sm-8">{{ $dog->age }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><span class="info-label">Breeding Way:</span></div>
                                    <div class="col-sm-8">{{ $dog->breeding_way }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><span class="info-label">House:</span></div>
                                    <div class="col-sm-8">{{ $dog->house }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><span class="info-label">Food:</span></div>
                                    <div class="col-sm-8">{{ $dog->food }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center mt-4">
                        @if (Auth::user()->dogs()->exists())
                        <a href="{{ route('dog.edit') }}" class="btn btn-primary">愛犬情報の変更</a>
                        @else
                        <a href="{{ route('dog.add') }}" class="btn btn-primary">愛犬登録</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
