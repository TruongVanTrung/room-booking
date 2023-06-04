<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required',
            'count' => 'required',
            'check_in' => 'required|max:255',
            'check_out' => 'required|max:255',
            'note' => 'required|max:255',
            'price' => 'required',
            'idroom' => 'required',
            'idpartner' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max',
            'email' => ':attribute phải là email',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'count' => 'Số lượng phòng',
            'check_in' => 'Ngày nhận phòng',
            'check_out' => 'Ngày trả phòng',
            'note' => 'Ghi chú',
            'price' => 'Giá tiền',
            'idroom' => 'ID_phòng',
            'idpartner' => 'Id_đối tác',
        ];
    }
}
