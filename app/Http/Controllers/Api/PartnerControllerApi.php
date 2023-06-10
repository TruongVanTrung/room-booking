<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class PartnerControllerApi extends Controller
{
    public function view()
    {
        $data = PartnerModel::orderBy('id', 'asc')
            ->limit(6)
            ->get();
        foreach ($data as $item) {
            $item['utilities'] = json_decode($item->utilities, true);
            $item['popular'] = json_decode($item->popular, true);
            $room = RoomModel::where('id_partner', $item->id)->get();
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
        return response()->json($data, 200);
    }

    public function detail($id)
    {
        $room = RoomModel::where('id_partner', $id)->get();
        $data = [];
        foreach ($room as $item) {
            $image = [];

            foreach (json_decode($item['image'], true) as $img) {
                $image[] = asset('upload/room/2_' . $img);
            }

            array_push(
                $data,
                [
                    "id" => $item->id,
                    "image" => $image,
                    "name" => $item->name,
                    "peoples" => $item->peoples,
                    "price" => $item->price,
                    "giuong" => $item->giuong,
                    "note" =>  strip_tags(html_entity_decode($item->note)),
                ]
            );
        }

        return response()->json($data, 200);
    }

    public function imagePartner($id)
    {
        $room = RoomModel::where('id_partner', $id)->get();
        $image = [];
        foreach ($room as $value) {
            foreach (json_decode($value['image'], true) as $img) {
                $image[] = asset('upload/room/2_' . $img);
            }
        }

        return response()->json($image);
    }
}
