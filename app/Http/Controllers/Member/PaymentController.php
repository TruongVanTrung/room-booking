<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Mail\PaymentNoti;
use App\Models\CheckCountRoom;
use App\Models\PartnerModel;
use App\Models\PaymentModel;
use App\Models\RoomModel;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index($id, $count)
    {
        $room = RoomModel::where('id', $id)->first();
        //dd($count);

        $partner = PartnerModel::where('id', $room->id_partner)->first();

        return view('member.payment', ['room' => $room, 'partner' => $partner, 'count' => $count]);
    }

    public function payment(PaymentRequest $request)
    {
        // dd($request);
        $pr_date = date('Y-m-d', strtotime($request->check_out . ' -1 day'));
        $period = CarbonPeriod::create($request->check_in, $pr_date);
        $room = RoomModel::where('id', $request->idroom)->first();
        // dd($period);
        $ar_date = [];
        foreach ($period as $date) {
            $check = CheckCountRoom::where(['id_room' => $request->idroom, 'date' => $date->format('Y-m-d')])->first();
            if ($check) {
                $ar_date[] = $check->count;
            } else {
                $ar_date[] = $room->quantity;
            }
        }
        $min_count = min($ar_date);

        if ($request->count > $min_count) {
            return redirect()->back()->with(['error' => 'Số phòng bạn muốn đặt vượt quá hiện có']);
        }

        $order = new PaymentModel();

        $order->name = $request->name;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->quantity = $request->count;
        $order->price = $request->price;
        $order->employee = 0;
        $order->note = $request->note;
        $order->check_in = $request->check_in;
        $order->check_out = $request->check_out;
        $order->id_room = $request->idroom;
        $order->id_partner = $request->idpartner;
        $order->id_user = Auth::user()->id;
        $order->status = 0;

        if ($order->save()) {
            foreach ($period as $date) {
                $check_count = CheckCountRoom::where(['id_room' => $request->idroom, 'date' => $date->format('Y-m-d')])->first();
                if ($check_count) {
                    $new_count = $check_count->count - $request->count;
                    $checkcount = CheckCountRoom::find($check_count->id);
                    $checkcount->update(['count' => $new_count]);
                } else {
                    $new_count = $room->quantity - $request->count;

                    $check_count_room = new CheckCountRoom();
                    $check_count_room->date = $date->format('Y-m-d');
                    $check_count_room->id_room = $request->idroom;
                    $check_count_room->count = $new_count;

                    $check_count_room->save();
                }
            }
        }
        $partner = PartnerModel::where('id', $room->id_partner)->first();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'partner_name' => $partner->name,
            'partner_address' => $partner->address,
            'room_name' =>  $room->name,
            'qty' =>  $request->count,
            'price' =>  $request->price,
            'total' => $request->count * $request->price,
            'note' => $request->note,
        ];

        Mail::to($request->email)->send(new PaymentNoti($data));
    }
}
