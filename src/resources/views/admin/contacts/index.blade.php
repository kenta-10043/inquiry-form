@extends('layouts.admin_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection



@section('content')
    <h2>Admin</h2>

    <div>
        <div>
            <form action="/admin/search" method="get">
                @csrf
                <input type="text" name="keyword" value="" placeholder="名前やメールアドレスを入力してください">

                <select name="gender">
                    <option value="" selected hidden>性別</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                </select>

                <select name="category_id">
                    <option value="" selected hidden>お問い合わせの種類</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>

                <input type="date" name="created_at" value="年/月/日">
                <button type="submit">検索</button>
                <input type="reset" value="リセット">
            </form>
        </div>
        {{-- <div>
            {{ $contacts->appends(request()->query())->links() }}

        </div> --}}

        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
                <th></th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <th>{{ $contact->last_name }} {{ $contact->first_name }} </th>
                    <th>{{ $contact->gender }}</th>
                    <th>{{ $contact->email }}</th>
                    <th>{{ $contact->category->content }}</th>
                    <th>
                        @livewire('modal')
                    </th>
                </tr>
            @endforeach


        </table>
    </div>
@endsection
