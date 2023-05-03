<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = CategoryModel::orderBy('id', 'asc')->limit(4)->get();

        return view('member.index', ['category' => $category]);
    }
}
