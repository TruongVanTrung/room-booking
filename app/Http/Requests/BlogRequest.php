<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required', //digits_between
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được độ dài lớn hơn :max',
            'image' => ':attribute nhập vào phải là image'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'description' => 'Mô tả',
            'content' => 'Nội dung',
            'image' => 'Ảnh chính',
        ];
    }
}
