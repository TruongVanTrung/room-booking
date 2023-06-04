<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryControlleApi extends Controller
{
    public function view()
    {
        $category = CategoryModel::all();
        $data = [];
        foreach ($category as $item) {
            array_push(
                $data,
                [
                    'id' => $item->id,
                    'imagedanhmuc' => asset('upload/admin/category/' . $item->image),
                    'tendanhmuc' => $item->name,
                ]
            );
        }
        return response()->json($data, 200);
    }
}
