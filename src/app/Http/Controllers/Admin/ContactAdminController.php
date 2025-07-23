<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Contact;

class ContactAdminController extends Controller

{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where('last_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%');
        }
        if ($request->filled('gender')) {
            $query->Where('gender', 'like', '%' . $request->gender . '%');
        }
        if ($request->filled('category_id')) {
            $query->Where('category_id', 'like', '%' . $request->category_id . '%');
        }
        if ($request->filled('created_at')) {
            $query->Where('created_at', 'like', '%' . $request->created_at . '%');
        }

        $contacts = $query->paginate(7);

        return view('admin.contacts.index', compact('contacts'));
    }
}
