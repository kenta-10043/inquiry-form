@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <p>お問い合わせありがとうございました</p>

    <button onclick="location.href='/'">HOME</button>
@endsection
