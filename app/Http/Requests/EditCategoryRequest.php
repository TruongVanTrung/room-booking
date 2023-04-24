<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'namedanhmuc' => 'required|string|min:5|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute độ dài không được lớn hơn :max',
            'min' => ':attribute độ dài không được nhỏ hơn :min',
            'string' => ':attribute phải là chuỗi',
            'image' => ':attribute nhập vào phải là image',
            'mimes' => ':attribute có đuôi không phù hợp'
        ];
    }

    public function attributes()
    {
        return [
            'namedanhmuc' => 'Tên danh mục',
            'image' => 'Ảnh',
        ];
    }
}
