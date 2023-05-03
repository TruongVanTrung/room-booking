<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user();
        return view('admin.profile', ['user' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);
        $data = $request->all();

        $img = $request->avatar;
        if (!empty($img)) {
            $data['avatar'] = $img->getClientOriginalName();
        } else {
            $data['avatar'] = $user->avatar;
        }

        $pass = $request->password;
        if (!empty($pass)) {
            $data['password'] = Hash::make($pass);
        } else {
            $data['password'] = $user->password;
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->password = $data['password'];
        $user->avatar = $data['avatar'];

        if ($user->save()) {
            if (!empty($img)) {
                $img->move('upload/admin/avatar', $img->getClientOriginalName());
            }
            return redirect('/admin/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
