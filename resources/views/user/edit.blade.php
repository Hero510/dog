<!--レイアウトは仮-->
@extends('layouts.app')
@section('title', 'Dogs Information-会員情報の編集-')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">会員情報の変更</div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.update', ['id' => $auth->id]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">氏名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $auth->name }}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">ニックネーム</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="nickname" value="{{ $auth->nickname }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="email" name="email" value="{{ $auth->email }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>
                            <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('name') is-invalid @enderror" name="password" value="" required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">確認用パスワード</label>
                            <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control @error('name') is-invalid @enderror" name="password_confirmation" value="" required autocomplete="password_confirmation">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">変更する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
