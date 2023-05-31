@extends('layouts.main')

@section('title', 'Dogs Information-投稿検索-')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-10">
            <form action="{{ route('post.search') }}" method="GET" class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" name="searchWord" placeholder="キーワードを入力" value="">
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (!empty($posts))
                <p>検索結果：{{ $posts->count() }}件</p>
            @endif
            @if (!empty($posts))
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
                                            <td><small>{{ $post->dog->breed->dog_breed }}</small></td>
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
                    @if (!$loop->last)
                        <hr color="#c0c0c0">
                    @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

           
