<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControllerApi extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $response = [
                'id' => Auth::id(),
                'message' => "Đăng nhập thành công"
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => "Đăng nhập thất bại"
            ];
            return response()->json($response, 200);
        }
    }
}
