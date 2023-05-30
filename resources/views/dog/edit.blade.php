@extends('layouts.app')

@section('title', 'DogsInformation', 'create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">愛犬情報の変更</h3>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dog.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @foreach ($auth->dogs as $dog)
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">名前</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $dog->name }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="age" class="col-md-4 col-form-label text-md-end">年齢</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="age" name="age" value="{{ $dog->age }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="breeding_way" class="col-md-4 col-form-label text-md-end">飼育方法</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="breeding_way" name="breeding_way"  value="{{ $dog->breeding_way }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="house" class="col-md-4 col-form-label text-md-end">ハウスの有無</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="house" name="house" value="{{ $dog->house }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="walk" class="col-md-4 col-form-label text-md-end">散歩の頻度</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="walk" name="walk" value="{{ $dog->walk }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="food" class="col-md-4 col-form-label text-md-end">普段食べているもの</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="food" name="food" value="{{ $dog->food }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="dog_breed_id" class="col-md-4 col-form-label text-md-end">犬種</label>
                                    <div class="col-md-6">
                                        <select id="dog_breed_id" name="dog_breed_id" class="form-control">
                                            <option value="{{ $dog->dog_breed_id }}">{{ $dog->breed->dog_breed  }}</option>
                                            @foreach($categories as $id => $dog_breed)
                                                <option value="{{ $id }}">{{ $dog_breed }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                            <div class="container" style="margin-top: 30px;">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <div id="cropie-demo" style="width: 250px"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
                                                <div id="image-preview" style="background: #e1e1e1; padding: 30px;"></div>
                                                <div class="text-center mt-3">
                                                    <label for="upload" class="form-label">画像を変更する場合は画像を選択</label>
                                                    <input type="file" class="form-control-file" id="upload" name="image">
                                                </div>
                                                <div class="text-center mt-3">
                                                    <input type="button" class="btn btn-success upload-result" value="切り取りした画像を確定">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="image_path" name="image_path" value="">
                            <div class="row">
                                <div class="col-md-12 text-center">
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

