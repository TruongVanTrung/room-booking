<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'doitac' => 'required',
            'location' => 'required',
            'id_danhmuc' => 'required',
            'tienich.*' => 'nullable',
            'diadiem.*' => 'nullable',
            'note' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'nullable' => ':attribute có thể để trống',
        ];
    }
    public function attributes()
    {
        return [
            'doitac' => 'Tên đối tác',
            'location' => 'Địa chỉ',
            'id_danhmuc' => 'Loại hình cơ sở',
            'tienich' => 'Tiện ích',
            'diadiem' => 'Địa điểm',
            'note' => 'Chú thích'
        ];
    }
}
