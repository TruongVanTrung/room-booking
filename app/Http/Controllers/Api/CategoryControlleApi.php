<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
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
                    'image' => asset('upload/admin/category/' . $item->image),
                    'name' => $item->name,
                ]
            );
        }
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $partner = PartnerModel::where('id_category', $id)->get();
        foreach ($partner as $item) {
            $room = RoomModel::where('id_partner', $item->id)->get();
            $item['utilities'] = json_decode($item->utilities, true);
            $item['popular'] = json_decode($item->popular, true);
            $image = [];
            foreach ($room as $value) {
                foreach (json_decode($value['image'], true) as $img) {
                    $image[] = asset('upload/room/2_' . $img);
                }
            }
            $item['image'] = $image;
            $category = CategoryModel::where('id', $item->id_category)->first()->name;
            $item['namecategory'] = $category;
        }
        return response()->json($partner, 200);
    }
}
