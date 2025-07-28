@extends('layouts.admin_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('nav')
    <button onclick="location.href='/login'">login</button>
@endsection

@section('content')
    <h2>Register</h2>
    <form method="POST" action="/register" novalidate>
        @csrf
        <div>
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                placeholder="例:test@example.com">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例:coachtech1106">
            @error('password')
                <div>{{ $message }}</div>
            @enderror

        </div>
        <button type="submit">登録</button>
    </form>
@endsection
