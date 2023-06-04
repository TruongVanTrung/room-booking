<?php

namespace App\Http\Controllers;

use App\Models\PartnerModel;
use App\Models\PaymentModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPartnerController extends Controller
{
    public function view()
    {
        $partner = PartnerModel::where('id_user', Auth::user()->id)->first();
        $order = PaymentModel::where('id_partner', $partner->id)->get();
        foreach ($order as $key => $item) {
            $room = RoomModel::where('id', $item->id_room)->first();
            $order[$key]['room_name'] = $room->name;
        }
        //dd($order);
        return view('partner.order', ['order' => $order]);
    }
}
