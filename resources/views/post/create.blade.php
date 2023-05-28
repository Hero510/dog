
<!--レイアウト仮-->
@extends('layouts.post')

@section('title', 'dogsinformation_post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="mb-4">新規投稿</h2>
            <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">タイトル</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">本文</label>
                    <textarea class="form-control" id="body" name="body" rows="8">{{ old('body') }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <div id="cropie-demo" style="width: 250px"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
                                <div id="image-preview" style="background: #e1e1e1; padding: 30px;"></div>
                                <div class="mt-3">
                                    <label for="upload" class="form-label">画像を選択</label>
                                    <input type="file" class="form-control-file" id="upload" name="image">
                                </div>
                                <div class="mt-3">
                                    <input type="button" class="btn btn-success upload-result" value="切り取りした画像を確定">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="image_path" name="image_path" value="">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">投稿する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
