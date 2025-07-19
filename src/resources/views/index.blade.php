@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <h2>Contact</h2>

    <form action="/contacts/confirm" method="post">
        @csrf
        <div>
            <label for="last_name">お名前※</label>
            <input type="text" id="last_name" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">

            @error('last_name')
                <div>{{ $message }}</div>
            @enderror

            @error('last_name')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="gender">性別※</label>
            <input type="radio" id="gender" name="gender" value="男性"
                {{ old('gender', '男性') === '男性' ? 'checked' : '' }} checked>男性
            <input type="radio" name="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : '' }}>女性
            <input type="radio" name="gender" value="その他" {{ old('gender') === 'その他' ? 'checked' : '' }}>その他

            @error('gender')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="email">メールアドレス※</label>
            <input type="text" id="email" name="email" placeholder="例：test@example.com"
                value="{{ old('email') }}">

            @error('email')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="tel1">電話番号※</label>
            <input type="tel" id="tel1" name="tel1" placeholder="080" value="{{ old('tel1') }}">-
            <input type="tel2" name="tel2" placeholder="1234" value="{{ old('tel2') }}">-
            <input type="tel3" name="tel3" placeholder="5678" value="{{ old('tel3') }}">

            @error('tel1')
                <div>{{ $message }}</div>
            @enderror

            @error('tel2')
                <div>{{ $message }}</div>
            @enderror

            @error('tel3')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="address">住所※</label>
            <input type="text" id="address" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
                value="{{ old('address') }}">

            @error('address')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" placeholder="例：千駄ヶ谷マンション101"
                value="{{ old('building') }}">

            @error('building')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="content">お問い合わせの種類※</label>
            <select id="content" name="content">
                <option value="" selected hidden>選択してください</option>
                <option value="1. 商品のお届けについて" @selected(old('content') == '1. 商品のお届けについて')>1. 商品のお届けについて</option>
                <option value="2. 商品の交換について" @selected(old('content') == '2. 商品の交換について')>2. 商品の交換について</option>
                <option value="3. 商品トラブル" @selected(old('content') == '3. 商品トラブル')>3. 商品トラブル</option>
                <option value="4. ショップへのお問い合わせ" @selected(old('content') == '4. ショップへのお問い合わせ')>4. ショップへのお問い合わせ</option>
                <option value="5.その他" @selected(old('content') == '5. その他')>5.その他</option>
            </select>
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="detail">お問い合わせ内容※</label>
            <textarea name="detail" id="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>

            @error('detail')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit">確認画面</button>

    </form>
@endsection
