<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'bail|required|numeric|digits_between:9,11', //digits_between
            'address' => 'required|min:5|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1024',
            'password' => 'min:8|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được độ dài nhỏ hơn :min',
            'max' => ':attribute không được độ dài lớn hơn :max',
            'numeric' => ':attribute nhập vào phải là số',
            'digits_between' => ':attribute nhập vào phải là từ 9-11 ký tự',
            'email' => ':attribute nhập vào phải là email',
            'image' => ':attribute nhập vào phải là image'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'avatar' => 'Avatar',
            'password' => 'Mật khẩu'
        ];
    }
}
