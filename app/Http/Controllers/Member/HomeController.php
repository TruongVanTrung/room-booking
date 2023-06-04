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
        $partner = PartnerModel::orderBy('id', 'desc')
            ->limit(3)
            ->get();
        foreach ($partner as $key => $item) {
            $img = RoomModel::where('id_partner', $item->id)->first()->image;
            if ($img) {
                $partner[$key]["image"] = json_decode($img)[0];
            }
        }
        //dd($partner);
        return view('member.index', ['category' => $category, 'partner' => $partner]);
    }
}
