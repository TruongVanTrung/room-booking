<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = PartnerModel::where('id_user', Auth::user()->id)->first();
        $room = RoomModel::where('id_partner', $partner->id)->get();

        foreach ($room as $key => $item) {
            $room[$key]["namecategory"] = CategoryModel::find($item->id_category)->name;
        }
        //dd($room);
        return view('partner.room', ['room' => $room]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::all();

        return view('partner.addRoom', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data_image = [];
        if ($request->image_room) {
            foreach ($request->image_room as $key => $image) {
                $time =  strtotime(date('Y-m-d H:i:s'));
                $name = $time . '_' . $image->getClientOriginalName();
                $name_2 = '2' . '_' . $time . '_' . $image->getClientOriginalName();
                $name_3 = '3' . '_' . $time . '_' . $image->getClientOriginalName();
                $data_image[] = $name;
                $path = public_path('upload/room/' . $name);
                $path2 = public_path('upload/room/' . $name_2);
                $path3 = public_path('upload/room/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(640, 480)->save($path2);
                Image::make($image->getRealPath())->resize(320, 240)->save($path3);

                // $image->move('upload/room/', $name);
            }
        }
        $id_partner = PartnerModel::where('id_user', Auth::user()->id)->first();
        $room = new RoomModel();
        $room->name = $request->room_name;
        $room->image = json_encode($data_image);
        $room->quantity = $request->number_room;
        $room->price = $request->number_price;
        $room->peoples = $request->number_people;
        $room->giuong = $request->number_giuong . ' - ' . $request->loai_giuong;
        $room->tienich = json_encode($request->tienich);
        $room->note = $request->note;
        $room->view = $request->text_view;
        $room->floor = $request->number_tang;
        $room->id_partner = $id_partner->id;
        $room->id_category = $request->id_danhmuc;

        if ($room->save()) {
            return redirect('/partner/room');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomModel  $roomModel
     * @return \Illuminate\Http\Response
     */
    public function show(RoomModel $roomModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomModel  $roomModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomModel $roomModel, string $id)
    {
        //
        $room = RoomModel::find($id);
        $category = CategoryModel::all();
        return view('partner.editRoom', ['room' => $room, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomModel  $roomModel
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, RoomModel $roomModel, string $id)
    {
        //
        $room  = RoomModel::find($id);
        $id_partner = $room->id_partner;
        $data_image = json_decode($room->image, true);
        if ($request->check_image) {
            foreach ($request->check_image as $key => $item) {
                foreach ($data_image as $k => $v) {
                    if ($v == $item) {
                        unset($data_image[$k]);
                    }
                }
            }
        }
        // $data = json_encode($data_image);
        // dd(json_decode($data, true));

        if ($request->image_room) {
            $length_img_new = count($request->image_room);

            $length_img_old = count($data_image);
            $x = 3 - $length_img_old;
            if ($length_img_new > $x) {
                return redirect()->back()->with('success', 'Hiện tại được thêm tối đa: ' . $x . ' ảnh');
            }
            foreach ($request->image_room as $key => $image) {
                $time =  strtotime(date('Y-m-d H:i:s'));
                $name = $time . '_' . $image->getClientOriginalName();
                $name_2 = '2' . '_' . $time . '_' . $image->getClientOriginalName();
                $name_3 = '3' . '_' . $time . '_' . $image->getClientOriginalName();
                $data_image[] = $name;
                $path = public_path('upload/room/' . $name);
                $path2 = public_path('upload/room/' . $name_2);
                $path3 = public_path('upload/room/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(640, 480)->save($path2);
                Image::make($image->getRealPath())->resize(320, 240)->save($path3);
            }
        }
        if ($request->check_image) {
            foreach ($request->check_image as $key => $item) {
                if (File::exists(public_path('/upload/room/' . $item))) {
                    File::delete(public_path('/upload/room/' . $item));
                }

                if (File::exists(public_path('/upload/room/2_' . $item))) {
                    File::delete(public_path('/upload/room/2_' . $item));
                }

                if (File::exists(public_path('/upload/room/3_' . $item))) {
                    File::delete(public_path('/upload/room/3_' . $item));
                }
            }
        }

        $room->name = $request->room_name;
        $room->image = json_encode($data_image);
        $room->quantity = $request->number_room;
        $room->price = $request->number_price;
        $room->peoples = $request->number_people;
        $room->giuong = $request->number_giuong . ' - ' . $request->loai_giuong;
        $room->tienich = json_encode($request->tienich);
        $room->note = $request->note;
        $room->view = $request->text_view;
        $room->floor = $request->number_tang;
        $room->id_partner = $id_partner;
        $room->id_category = $request->id_danhmuc;

        if ($room->save()) {
            return redirect('/partner/room');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomModel  $roomModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomModel $roomModel)
    {
        //
    }
}
