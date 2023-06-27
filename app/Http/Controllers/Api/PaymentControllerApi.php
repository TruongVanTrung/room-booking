<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PaymentNoti;
use App\Models\CheckCountRoom;
use App\Models\PartnerModel;
use App\Models\PaymentModel;
use App\Models\RoomModel;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentControllerApi extends Controller
{
    public function payment(Request $request)
    {

        $pr_date = date('Y-m-d', strtotime($request->dateTra . ' -1 day'));
        $period = CarbonPeriod::create($request->dateNhan, $pr_date);
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
            return response()->json([
                'id' => 0,
                'message' => 'Số phòng bạn muốn đặt vượt quá hiện có'
            ], 200);
        }
        $order = new PaymentModel();

        $order->name = $request->name;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->quantity = $request->count;
        $order->price = $request->price;
        $order->employee = 0;
        $order->note = "";
        $order->check_in = $request->dateNhan;
        $order->check_out = $request->dateTra;
        $order->id_room = $request->idroom;
        $order->id_partner = $room->id_partner;
        $order->id_user = $request->iduser;
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
            'note' => "",
        ];

        Mail::to($request->email)->send(new PaymentNoti($data));

        return response()->json([
            'id' => 1,
            'message' => 'Đặt phòng thành công'
        ], 200);
    }

    public function detail($id, $status)
    {
        $order = PaymentModel::where(['id_user' => $id, 'status' => $status])->get();
        foreach ($order as $key => $item) {
            $image = RoomModel::where('id', $item->id_room)->first();
            $img = [];
            foreach (json_decode($image->image, true) as $v) {
                $img[] = asset('upload/room/2_' . $v);
            }
            $order[$key]['image'] = $img;
            $order[$key]['totalPrice'] = $item->price * $item->quantity;
        }

        return response()->json($order, 200);
    }

    public function totalUser($id)
    {
        //tổng số tiền của mỗi đơn
        //    $order = PaymentModel::select(DB::raw('*,(price * quantity) as totalPrice'))
        //         ->where('id_user', $id)->get();

        //tổng số tiền của user
        $totalPrice = PaymentModel::select(DB::raw('sum(price * quantity) as totalPrice'))
            ->where('id_user', $id)->first();
        // $total_qty = count($order);
        // tổng số đơn hàng của user
        $total_qty = PaymentModel::where('id_user', $id)->count();

        return response()->json([
            'total_quantity' => (int)$total_qty,
            'total_price' => (int)$totalPrice->totalPrice
        ], 200);
    }

    public function delete($id)
    {
        $order1 = PaymentModel::find($id);
        $order = PaymentModel::find($id);
        $order->status = 4;

        if ($order->save()) {
            $pr_date = date('Y-m-d', strtotime(((int)$order->check_out)) . ' -1 day');
            $period = CarbonPeriod::create(date('Y-m-d', ((int)$order->check_in)), $pr_date);
            foreach ($period as $date) {
                $check_count = CheckCountRoom::where(['id_room' => $order->idroom, 'date' => $date->format('Y-m-d')])->first();
                if ($check_count) {
                    $new_count = $check_count->count - $order->quantity;
                    $checkcount = CheckCountRoom::find($check_count->id);
                    $checkcount->count = $new_count;
                    $checkcount->save();
                }
            }
            return response()->json([
                'id' => 1,
                'message' => "Hủy thành công"
            ], 200);
        }
    }
}
