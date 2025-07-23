@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <h2>Confirm</h2>

    <form action="/store" method="post">
        @csrf
        <table>

            <tr>
                <th>お名前</th>
                <td>
                    {{ $contact['name'] }}
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                </td>
            </tr>

            <tr>
                <th>性別</th>
                <td>
                    <input type="radio" name="gender" value="男性" {{ $contact['gender'] === '男性' ? 'checked' : '' }}
                        checked>男性
                    <input type="radio" name="gender" value="女性"
                        {{ $contact['gender'] === '女性' ? 'checked' : '' }}>女性
                    <input type="radio" name="gender" value="その他"
                        {{ $contact['gender'] === 'その他' ? 'checked' : '' }}>その他
                </td>
            </tr>

            <tr>
                <th>メールアドレス</th>
                <td>
                    {{ $contact['email'] }}
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                </td>
            </tr>

            <tr>
                <th>電話番号</th>
                <td>
                    {{ $contact['tel'] }}
                    <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                </td>
            </tr>

            <tr>
                <th>住所</th>
                <td>
                    {{ $contact['address'] }}
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                </td>
            </tr>

            <tr>
                <th>建物名</th>
                <td>
                    {{ $contact['building'] }}
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                </td>
            </tr>

            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    {{ $category['content'] }}
                    <input type="hidden" name="content" value="{{ $category['content'] }}">
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                </td>
            </tr>

            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    {{ $contact['detail'] }}
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                </td>
            </tr>

        </table>

        <div>
            {{-- <button type="submit">送信</button> --}}
            <input type="submit" value="送信">
            <button type="button" onclick="history.back()">修正</button>
        </div>
    </form>
@endsection
