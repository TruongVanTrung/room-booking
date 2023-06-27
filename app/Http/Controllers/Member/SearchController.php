<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\CheckCountRoom;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $partner = PartnerModel::orderBy('id', 'asc')
            ->limit(6)
            ->get();
        foreach ($partner as $key => $item) {
            $room = RoomModel::where('id_partner', $item->id)->first();
            if (isset($room)) {
                $partner[$key]["image"] = json_decode($room->image)[0];
            } else {
                $partner[$key]["image"] = "";
            }
        }
        return view('member.search', ['partner' =>  $partner]);
    }
    public function search(Request $request)
    {
        // dd($request);
        $partner = PartnerModel::query();

        if ($request->name) {
            $partner->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->address) {
            $partner->where('address', 'LIKE', '%' . $request->address . '%');
        }

        if ($request->check_in && $request->check_out) {
            if ($request->name || $request->address) {
                $partner->get();
            }

            foreach ($partner as $key => $item) {
                $room = RoomModel::where('id_partner', $item->id)->get();
                $min_count = 0;
                $pr_date = date('Y-m-d', strtotime($request->check_out . ' -1 day'));
                $period = CarbonPeriod::create($request->check_in, $pr_date);
                $ar_date = [];
                foreach ($room as $v) {
                    foreach ($period as $date) {
                        $check = CheckCountRoom::where(['id_room' => $v->id, 'date' => $date->format('Y-m-d')])->first();
                        if ($check) {
                            $ar_date[] = $check->count;
                        } else {
                            $ar_date[] = $v->quantity;
                        }
                    }
                }

                $min_count = min($ar_date);

                if ($room) {
                    //dd(json_decode($room[0]->image, true)[0]);
                    $partner[$key]["image"] = json_decode($room[0]->image, true)[0];
                } else {
                    $partner[$key]["image"] = "";
                }
                if ($min_count < 1) {
                    unset($partner[$key]);
                }
                //dd($partner);
                return view('member.search', ['partner' =>  $partner]);
            }
        }
        $new_partner = $partner->orderby('name')->get();
        foreach ($new_partner as $key => $item) {
            $room = RoomModel::where('id_partner', $item->id)->get();
            if (isset($room)) {
                $new_partner[$key]["image"] = json_decode($room[0]->image)[0];
            } else {
                $new_partner[$key]["image"] = "";
            }
        }
        return view('member.search', ['partner' =>  $new_partner]);
    }
}
