<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_name' => 'required',
            'image_room.*' => 'required|mimes:jpeg,png,jpg,gif|max:1024',
            'id_danhmuc' => 'required',
            'number_room' => 'required',
            'number_people' => 'required',
            'number_price' => 'required',
            'note' => 'required',
            'number_giuong' => 'required',
            'loai_giuong' => 'required',
            'tienich.*' => 'nullable',
            'number_tang' => 'required',
            'text_view' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max',
            'image.*' => ':attribute nhập vào phải là image',
            'mines' => ':attribute phải là jpeg,png,jpg,gif'
        ];
    }

    public function attributes()
    {
        return [
            'image_room' => 'Ảnh phòng',
            'room_name' => 'Tên phòng',
            'id_danhmuc' => 'Danh mục',
            'number_room' => 'Số lượng',
            'number_people' => 'Số người',
            'number_price' => 'Giá tiền',
            'note' => 'Ghi chú',
            'number_giuong' => 'Số giường',
            'loai_giuong' => 'Loại giường',
            'tienich' => 'Tiện ích',
            'number_tang' => 'Số tầng',
            'text_view' => 'View'
        ];
    }
}
