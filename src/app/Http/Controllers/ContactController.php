<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $category = Category::firstOrCreate([
            'content' => $request->input('content')
        ]);



        $name = $request->input('last_name') . '　' . $request->input('first_name');
        $tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');
        $contact = $request->only('last_name', 'first_name', 'gender', 'email', 'address', 'building', 'detail');
        $contact['name'] = $name;
        $contact['tel'] = $tel;

        $contact['category_id'] = $category->id;


        return view('confirm', compact('contact', 'category'));
    }
    public function store(Request $request)
    {
        $content = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
            'category_id'
        ]);
        Contact::create($content);



        return view('thanks');
    }
}
