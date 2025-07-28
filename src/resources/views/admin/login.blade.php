@extends('layouts.admin_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('nav')
    <button onclick="location.href='/register'">register</button>
@endsection

@section('content')
    <h2>Login</h2>
    <form method="POST" action="/login" novalidate>
        @csrf

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例: coachtech1106">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">ログイン</button>
    </form>
@endsection
