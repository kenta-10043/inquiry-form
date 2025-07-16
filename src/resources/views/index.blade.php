@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <h2>Contact</h2>

    <form action="/">
        <div>
            <label for="last_name">お名前※</label>
            <input type="text" id="last_name" name="last_name" placeholder="例：山田">
            <input type="text" name="first_name" placeholder="例：太郎">
        </div>

        <div>
            <label for="gender">性別※</label>
            <input type="radio" id="gender" name="gender" value="male" checked>男性
            <input type="radio" name="gender" value="female">女性
            <input type="radio" name="gender" value="other">その他
        </div>

        <div>
            <label for="email">メールアドレス※</label>
            <input type="text" id="email" name="email" placeholder="例：test@example.com">

        </div>

        <div>
            <label for="tel1">電話番号※</label>
            <input type="tel" id="tel1" name="tel1" placeholder="080">-
            <input type="tel2" name="tel2" placeholder="1234">-
            <input type="tel3" name="tel3" placeholder="5678">
        </div>

        <div>
            <label for="address">住所※</label>
            <input type="text" id="address" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
        </div>

        <div>
            <label for="building">建物名※</label>
            <input type="text" id="building" name="building" placeholder="例：千駄ヶ谷マンション101">
        </div>

        <div>
            <label for="content">お問い合わせの種類※</label>
            <select size="1" id="type-content" name="content">
                <option value=""selected hidden>選択してください</option>

            </select>
        </div>

        <div>
            <label for="detail">お問い合わせ内容※</label>
            <textarea name="detail" id="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>
        <button type="submit">確認画面</button>

    </form>
@endsection
