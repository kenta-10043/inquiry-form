<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255',
            'tel1' => 'required|max:5',
            'tel2' => 'required|max:5',
            'tel3' => 'required|max:5',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'detail' => 'required|max:120',
        ];
    }


    public function messages()
    {
        return
            [
                'last_name.required' => '姓を入力してください',
                'first_name.required' => '名を入力してください',
                'gender.required' => '性別を入力してください',
                'email.required' => 'メールアドレスを入力してください',
                'email.email' => 'メールアドレスはメール形式で入力してください',
                'tel1.required' => '電話番号を入力してください',
                'tel1.max' => '電話番号は5桁までの数字で入力してください',
                'tel2.required' => '電話番号を入力してください',
                'tel2.max' => '電話番号は5桁までの数字で入力してください',
                'tel3.required' => '電話番号を入力してください',
                'tel3.max' => '電話番号は5桁までの数字で入力してください',
                'address.required' => '住所を入力してください',
                'category_id.required' => 'お問い合わせの種類を選択してください',
                'category_id.exists:categories,id' => '選択されたお問い合わせの種類が無効です。',
                'detail.required' => 'お問い合わせ内容を入力してください',
                'detail.max' => 'お問い合わせ内容を120字以内で入力してください',
            ];
    }
}
