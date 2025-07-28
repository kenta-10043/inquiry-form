@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <h2 class="page-tittle">Contact</h2>

    <div class="form__main">
        <form class="form__main-content" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__input__name">
                <label class="label__name" for="last_name">お名前※</label>
                <input class="input__name" type="text" id="last_name" name="last_name" placeholder="例：山田"
                    value="{{ old('last_name') }}">
                <input class="input__name" type="text" name="first_name" placeholder="例：太郎"
                    value="{{ old('first_name') }}">

                @error('last_name')
                    <div>{{ $message }}</div>
                @enderror

                @error('first_name')
                    <div>{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__gender">
                <label for="gender">性別※</label>
                <input type="radio" id="gender" name="gender" value="1"
                    {{ old('gender', '男性') === '男性' ? 'checked' : '' }} checked>男性
                <input type="radio" name="gender" value="2" {{ old('gender') === '女性' ? 'checked' : '' }}>女性
                <input type="radio" name="gender" value="3" {{ old('gender') === 'その他' ? 'checked' : '' }}>その他

                @error('gender')
                    <div>{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__email">
                <label for="email">メールアドレス※</label>
                <input type="text" id="email" name="email" placeholder="例：test@example.com"
                    value="{{ old('email') }}">

                @error('email')
                    <div>{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__tel">
                <label for="tel1">電話番号※</label>
                <input type="tel" id="tel1" name="tel1" placeholder="080" value="{{ old('tel1') }}">-
                <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">-
                <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">

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

            <div class="form__input__address">
                <label for="address">住所※</label>
                <input type="text" id="address" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
                    value="{{ old('address') }}">

                @error('address')
                    <div>{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__building">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" placeholder="例：千駄ヶ谷マンション101"
                    value="{{ old('building') }}">

                @error('building')
                    <div>{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__content">
                <label for="content">お問い合わせの種類※</label>
                <select id="content" name="category_id">
                    <option value="" selected hidden>選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>"{{ $category->content }}"
                        </option>
                    @endforeach


                    {{-- <option value="商品のお届けについて" @selected(old('content') == '商品のお届けについて')>商品のお届けについて</option>
                    <option value="商品の交換について" @selected(old('content') == '商品の交換について')>商品の交換について</option>
                    <option value="商品トラブル" @selected(old('content') == '商品トラブル')>商品トラブル</option>
                    <option value="ショップへのお問い合わせ" @selected(old('content') == 'ショップへのお問い合わせ')>ショップへのお問い合わせ</option>
                    <option value="その他" @selected(old('content') == 'その他')>その他</option> --}}
                </select>
                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form__input__detail">
                <label for="detail">お問い合わせ内容※</label>
                <textarea name="detail" id="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>

                @error('detail')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <button class="confirm__button" type="submit">確認画面</button>

        </form>
    </div>
@endsection
