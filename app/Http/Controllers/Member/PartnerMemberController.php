<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\CheckCountRoom;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerMemberController extends Controller
{
    public function view(string $id)
    {
        $partner = PartnerModel::where('id', $id)->first();
        $partner["namecategory"] = CategoryModel::find($partner->id_category)->name;
        $room = RoomModel::where('id_partner', $partner->id)->get();
        $image = [];
        foreach ($room as $item) {
            foreach (json_decode($item['image']) as $img) {
                $image[] = $img;
            }
        }

        if (Session::has('check_in') && Session::has('check_out')) {
            $next_date = date('Y-m-d', strtotime(Session::get('check_out') . ' -1 day'));
            $period = CarbonPeriod::create(Session::get('check_in'), $next_date);
            foreach ($room as $key => $item) {
                $day = [];
                foreach ($period as $date) {
                    $check = CheckCountRoom::where(['id_room' => $item->id, 'date' => $date->format('Y-m-d')])->first();
                    if ($check) {
                        $day[] = $check->count;
                    } else {
                        $day[] = $item->quantity;
                    }
                }
                $room[$key]['count'] = min($day);
            }
        }
        return view('member.detailPartner', ['partner' => $partner, 'image_partner' => $image, 'room' => $room]);
    }

    public function checkDate(Request $request)
    {
        if (session()->has('check_in') && session()->has('check_out')) {
            Session::forget('check_in');
            Session::forget('check_out');
            Session::put('check_in', $request->check_in);
            Session::put('check_out', $request->check_out);
            return redirect()->back();
        } else {
            Session::put('check_in', $request->check_in);
            Session::put('check_out', $request->check_out);

            return redirect()->back();
        }
    }
}
