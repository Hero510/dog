@extends('layouts.app')
@section('title', 'DogsInformation', 'create')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h3>愛犬登録</h3>
                
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                <div class="card-body">
                    <form action="{{ route('dog.create') }}" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">名前</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="name" name="name" placeholder="例) わん隊長" value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">年齢</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="age" name="age" placeholder="例) 3か月、1歳" value="{{ old('age') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="breeding_way" class="col-md-4 col-form-label text-md-end">飼育方法</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="breeding_way" name="breeding_way" placeholder="例) 室内、屋内" value="{{ old('breeding_way') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="house" class="col-md-4 col-form-label text-md-end">ハウスの有無</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="house" name="house" placeholder="例) 寝るときだけハウスなど" value="{{ old('house') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="walk" class="col-md-4 col-form-label text-md-end">散歩の頻度</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="walk" name="walk" placeholder="例) なし、1日2回の合計30分など" value="{{ old('walk') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="food" class="col-md-4 col-form-label text-md-end">普段食べているもの</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" id="food" name="food" placeholder="例) フード名または手作りなど" value="{{ old('food') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dog_breed_id" class="col-md-4 col-form-label text-md-end">犬種</label>
                            <div class="col-md-6">
                                <select id="dog_breed_id" name="dog_breed_id" class="form-control">
                                    <option value="">未選択</option>

                                  @foreach($categories as $id => $dog_breed)
                                  <option value="{{ $id }}">
                                    {{ $dog_breed }}
                                  </option>  
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="container" style="margin-top:30px;">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div id="cropie-demo" style="width:250px"></div>
                                    </div>
                                </div>
                                <div class="row">
                                <label for="upload" class="col-md-4 col-form-label text-md-end">画像を選択</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" id="upload" name="image">
                                        <br />
                                        <input type="button" class="btn btn-success upload-result" value="切り取りした画像を確定">
                                    </div>
                                    <div class="col-md-2">
                                    <div id="image-preview"
                                        style="background:#e1e1e1;padding:30px;height:200px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                         
                        
                        
                        
                        @csrf
                        <input type="hidden" id="image_path" name="image_path" value="">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">登録する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection