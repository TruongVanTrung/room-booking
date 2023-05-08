<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Illuminate\Http\Request;

class BlogMemberController extends Controller
{
    public function index()
    {
        $user = BlogModel::paginate(2);
        return view('member.blog', ['user' => $user]);
    }

    public function show(string $id)
    {
        $blog = BlogModel::find($id);
        $user = BlogModel::find($id)->user;

        return view('member.blogDetail', ['blog' => $blog, 'user' => $user]);
    }
}
