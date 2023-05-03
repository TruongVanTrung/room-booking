<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(LoginRequest $request)
    {
        $remember  = false;
        if ($request->remember_me) {
            $remember = true;
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => 1], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/category');
        } else {
            return redirect('/login/admin');
        }
    }

    public function registerAdmin(UserRequest $request)
    {
        //dd($request);
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 1;
        if ($user->save()) {
            return redirect('/login/admin');
        }
    }
}
