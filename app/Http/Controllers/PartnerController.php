<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\RoomModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function index()
    {
        $category = CategoryModel::all();
        return view('member.registerPartner', ['category' => $category]);
    }

    public function create(PartnerRequest $request)
    {
        // $data = PartnerModel::find(1);
        // return view('member.test', ['data' => $data]);
        //dd($request);
        $query = new PartnerModel();

        $query->name = $request->doitac;
        $query->address = $request->location;
        $query->note = $request->note;
        $query->utilities = json_encode($request->tienich);
        $query->popular = json_encode($request->diadiem);
        $query->id_user = Auth::user()->id;
        $query->id_category = $request->id_danhmuc;
        $query->status = 0;

        if ($query->save()) {
            $user = User::find(Auth::user()->id);
            $user->level = 3;
            $user->save();
            return redirect('/');
        }
    }

    public function view()
    {
        $partner = PartnerModel::where('id_user', Auth::user()->id)->first();
        $partner["namecategory"] = CategoryModel::find($partner->id_category)->name;
        //dd($partner);
        $room = RoomModel::where('id_partner', $partner->id)->get();
        $image = [];
        foreach ($room as $item) {
            foreach (json_decode($item['image']) as $img) {
                $image[] = $img;
            }
        }

        return view('partner.partner', ['partner' => $partner, 'image_partner' => $image]);
    }

    public function edit(string $id)
    {
        $partner = PartnerModel::find($id);
        $category = CategoryModel::all();
        return view('partner.editPartner', ['partner' => $partner, 'category' => $category]);
    }

    public function update(PartnerRequest $request, string $id)
    {
        $query = PartnerModel::find($id);

        $query->name = $request->doitac;
        $query->address = $request->location;
        $query->note = $request->note;
        $query->utilities = json_encode($request->tienich);
        $query->popular = json_encode($request->diadiem);
        $query->id_user = Auth::user()->id;
        $query->id_category = $request->id_danhmuc;
        $query->status = 0;

        if ($query->save()) {
            return redirect('/partner/profile');
        }
    }
}
