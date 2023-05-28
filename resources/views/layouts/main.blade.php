<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/main.css') }}" rel="stylesheet">
    </head>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/犬のシルエット.png') }}"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">投稿一覧</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="{{ route('post.add') }}">新規投稿</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="#">投稿検索</a>
                            </li>
                        </ul>
                        
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                @if (Auth::check())
                                    <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
                                @else
                                    <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (Auth::check())
                                    <!-- ログインしている場合の表示 -->
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <!-- ログインしていない場合の表示 -->
                                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                                @endif
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
        <main class="py-4">
                    @yield('content')
        </main>
    <footer>
        <div class="container text-center">
            <p>&copy; 2023 Dogs Information.</p>
        </div>
    </footer>
</html>



