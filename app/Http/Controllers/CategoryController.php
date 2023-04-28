<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryModel::all();
        return view('admin.category', ['category' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new CategoryModel();
        $image = $request->image;
        if (!empty($image)) {
            $category->name = $request->namedanhmuc;
            $category->image =  $image->getClientOriginalName();
            if ($category->save()) {
                if (!is_dir(public_path('/upload/admin/category'))) {
                    mkdir(public_path('/upload/admin/category'));
                }

                if (!empty($image)) {
                    $image->move('upload/admin/category', $image->getClientOriginalName());
                }

                return redirect('/admin/category');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $categoryModel, string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $categoryModel, string $id)
    {
        $data = CategoryModel::find($id);
        return view('admin.editCategory', ['category' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, CategoryModel $categoryModel, string $id)
    {
        $data = CategoryModel::find($id);
        $value = $request->all();

        $image = $request->image;
        if (!empty($image)) {
            $value['image'] = $image->getClientOriginalName();
        }

        $data->name = $value['namedanhmuc'];
        $data->image = $value['image'];
        if (!is_dir(public_path('/upload/admin/category'))) {
            mkdir(public_path('/upload/admin/category'));
        }
        if ($data->save()) {
            if (!empty($image)) {
                $image->move('upload/admin/category', $image->getClientOriginalName());
            }
            return redirect('/admin/category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $categoryModel, string $id)
    {
        if (CategoryModel::destroy($id)) {
            return redirect('/admin/category');
        }
    }
}
