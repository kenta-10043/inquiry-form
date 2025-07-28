<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;


class ContactAdminController extends Controller

{
    public function index()
    {
        $contacts = Contact::Paginate(7);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query->paginate(7)->appends($request->all());
        return view('admin.contacts.index', compact('contacts'));
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }
        $contacts = $query->get();


        // 2. ヘッダー行（CSVの1行目）
        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類'];

        // 3. データ行を組み立てる
        $csvData = [];
        foreach ($contacts as $contact) {

            $genderText = '';
            if ($contact->gender == 1) {
                $genderText = '男性';
            } elseif ($contact->gender == 2) {
                $genderText = '女性';
            } elseif ($contact->gender == 3) {
                $genderText = 'その他';
            }

            $csvData[] = [
                $contact->last_name . $contact->first_name,
                $genderText,
                $contact->email,
                optional($contact->category)->content ?? '',


            ];
        }

        // 4. CSVの中身をメモリに書き込み
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader); // ヘッダー行
        foreach ($csvData as $row) {
            fputcsv($handle, $row); // データ行
        }
        rewind($handle); // 先頭に戻す

        // 5. CSVを取得して、BOM付きで文字化け対策
        $csvContent = "\xEF\xBB\xBF" . stream_get_contents($handle);
        fclose($handle);

        // 6. CSVファイルとして返す（ダウンロード）
        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=contacts.csv',
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('/admin')->with('status', '削除しました');
    }
}
