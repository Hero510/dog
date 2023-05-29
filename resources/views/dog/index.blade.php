@extends('layouts.main')
@section('title', 'dogsinformation_index')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($posts as $key => $post)
                <div class="row border p-3 mb-3">
                    <div class="col-md-4">
                        <div class="image">
                            @if ($post->image_path)
                                <img src="{{ secure_asset('images/' . $post->image_path) }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="date text-end">{{ $post->updated_at->format('Y年m月d日') }}</div>
                        <h3 class="title mt-4">{{ $post->title }}</h3>
                        <p class="body mt-4">{{ $post->body }}</p>
                        @if (Auth::check() && $post->dog->user_id == Auth::user()->id)
                            <div class="float-md-end">
                                <a href="" class="btn btn-outline-success button-sm">編集</a>
                                <form action="" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-outline-danger button-sm me-2">削除</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Image</strong></td>
                                        <td><img src="{{ secure_asset('images/' . $post->dog->image_path) }}" alt="User Image" class="img-fluid"></td>
                                        <td><strong>Name</strong></td>
                                        <td>{{ $post->dog->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Breed</strong></td>
                                        <td><small>{{ $post->dog->breed()->dog_breed }}</small></td>
                                        <td><strong>Age</strong></td>
                                        <td><small>{{ $post->dog->age }}</small></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Walk</strong></td>
                                        <td><small>{{ $post->dog->walk }}</small></td>
                                        <td><strong>Food</strong></td>
                                        <td><small>{{ $post->dog->food }}</small></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Breeding Way</strong></td>
                                        <td><small>{{ $post->dog->breeding_way }}</small></td>
                                        <td><strong>House</strong></td>
                                        <td><small>{{ $post->dog->house }}</small></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($key != count($posts) - 1)
                    <hr color="#c0c0c0">
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
<!-- 最後の記事以外の場合は表示しない -->
