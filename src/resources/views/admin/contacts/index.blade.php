@extends('layouts.admin_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection



@section('content')
    <h2>Admin</h2>

    <div class="main__contents">
        <div class="main__form">
            <form class="form" action="/admin/search" method="get">
                @csrf
                <input class="pa" type="text" name="keyword" value="" placeholder="名前やメールアドレスを入力してください">

                <select class="pa" name="gender">
                    <option value="" selected hidden>性別</option>
                    <option value="">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>

                <select class="pa" name="category_id">
                    <option value="" selected hidden>お問い合わせの種類</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>

                <input class="pa" type="date" name="created_at" value="年/月/日">
                <button class="pa" type="submit">検索</button>
                {{-- <input type="reset" value="リセット"> --}}
                <a class="search__reset-button" href="/admin">リセット</a>
            </form>
        </div>

        <div class="parts">
            <a class="button__csv btn btn-success" href="{{ route('admin.export', request()->query()) }}">
                CSVダウンロード
            </a>
            {{ $contacts->links() }}
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{-- <div>
            {{ $contacts->appends(request()->query())->links() }}

        </div> --}}

        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <th>{{ $contact->last_name }} {{ $contact->first_name }} </th>
                    <th>{{ $contact->gender }}</th>
                    <th>{{ $contact->email }}</th>
                    <th>{{ $contact->category->content }}</th>
                    <th>
                        <button onclick="openModal({{ $contact->id }})">詳細</button>

                        {{-- @livewire('modal', ['contact' => $contact]) --}}
                    </th>
                </tr>
                <!-- モーダル本体 -->
                <div id="myModal-{{ $contact->id }}"" class="modal">
                    <div class="modal-content">
                        <span class="close-button" onclick="closeModal({{ $contact->id }} )">&times;</span>
                        <p>お名前　{{ $contact->last_name }} {{ $contact->first_name }}</p>
                        <p> 性別　{{ $contact->gender }}</p>
                        <p> メールアドレス　{{ $contact->email }}</p>
                        <p> 電話番号　{{ $contact->tel }}</p>
                        <p> 住所　{{ $contact->address }}</p>
                        <p> 建物名　{{ $contact->building }}</p>
                        <p> お問い合わせの種類　{{ $contact->category->content }}</p>
                        <p> お問い合わせ内容　{{ $contact->detail }}</p>
                        <form action="/admin/{{ $contact->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button>削除</button>
                        </form>
                    </div>
                </div>
            @endforeach


        </table>
    </div>


    <script>
        // モーダルを開く
        function openModal(id) {
            document.getElementById('myModal-' + id).style.display = 'block';
        }

        // モーダルを閉じる
        function closeModal(id) {
            document.getElementById('myModal-' + id).style.display = 'none';
        }
    </script>
@endsection
