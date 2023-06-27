<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = CategoryModel::orderBy('id', 'asc')->limit(4)->get();
        $partner = PartnerModel::orderBy('id', 'asc')
            ->limit(3)
            ->get();
        foreach ($partner as $key => $item) {
            $room = RoomModel::where('id_partner', $item->id)->first();
            if (isset($room)) {
                $partner[$key]["image"] = json_decode($room->image)[0];
            } else {
                $partner[$key]["image"] = "";
            }
        }
        //dd($partner);
        return view('member.index', ['category' => $category, 'partner' => $partner]);
    }

    public function category($id)
    {
        $category = CategoryModel::find($id);
        $partner = PartnerModel::where('id_category', $id)->get();
        foreach ($partner as $key => $item) {
            $room = RoomModel::where('id_partner', $item->id)->first();
            if (isset($room)) {
                $partner[$key]["image"] = json_decode($room->image)[0];
            } else {
                $partner[$key]["image"] = "";
            }
        }
        return view('member.categoryDetail', ['category' => $category, 'partner' => $partner]);
    }
}
