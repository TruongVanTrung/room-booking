<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\PartnerModel;
use App\Models\PaymentModel;
use App\Models\RoomModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|min:7',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Vui lòng nhập tên đăng nhập',
                'password.min' => 'Nhập ít nhất 6 ký tự',
                'email.min' => 'Vui lòng nhập ít nhất 7 ký tự',
                'email.email' => 'Vui lòng nhập dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        // dd($request);
        $remember  = false;
        if ($request->remember_me) {
            $remember = true;
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Đăng nhập thất bại!');
        }
    }

    public function viewRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users|min:7',
                'password' => 'required|min:6',
                'cpassword' => 'required|min:6|same:password',
            ],
            [
                'email.required' => 'Vui lòng nhập tên đăng nhập',
                'password.min' => 'Nhập ít nhất 6 ký tự',
                'email.min' => 'Vui lòng nhập ít nhất 7 ký tự',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'email.email' => 'Vui lòng nhập dạng email',
                'email.unique' => 'Email đã tồn tại',
                'cpassword.same' => 'Vui lòng nhập lại đúng mật khẩu',
            ]
        );

        //$data = $request->all();
        $user = new User();
        $user->name = $request->email;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 0;

        if ($user->save()) {
            return redirect('/login');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function historyOrder()
    {
        $order = PaymentModel::where('id_user', Auth::user()->id)->get();
        foreach ($order as $key => $item) {
            $room = RoomModel::where('id', $item->id_room)->first();
            $order[$key]['room_name'] = $room->name;
        }
        //dd($order);
        return view('member.historyOrder', ['order' => $order]);
    }
}
