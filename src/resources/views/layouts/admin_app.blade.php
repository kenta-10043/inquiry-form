<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    @livewireStyles

    @yield('css')
</head>

<body>
    <header>
        <ul>

            <li>
                <a class="header-inner" href="/">FashionablyLate</a>
            </li>
            @if (Auth::check())
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            @else
                <li>
                    @yield('nav')
                </li>
            @endif
        </ul>
    </header>
    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>

</html>
