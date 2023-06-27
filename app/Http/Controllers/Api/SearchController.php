<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $partner = PartnerModel::query();

        if ($request->value) {
            $partner->where('name', 'LIKE', '%' . $request->value . '%')->orWhere('address', 'LIKE', '%' . $request->value . '%');
        }
        $new_partner = $partner->orderby('name')->get();
        foreach ($new_partner as $item) {
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
        return response()->json($new_partner, 200);
    }
}
