<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogModel::all();

        return view('admin.blog', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->image;
        $blog = new BlogModel();
        $blog->title = $request->title;
        $blog->image = $file->getClientOriginalName();;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->id_user = Auth::id();

        if ($blog->save()) {
            if (!empty($file)) {
                $file->move('upload/admin/blog/img_thum', $file->getClientOriginalName());
            }
            return redirect('/admin/blog');
        }
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function show(BlogModel $blogModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogModel $blogModel, string $id)
    {
        $blog = BlogModel::find($id);

        return view('admin.editBlog', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogModel $blogModel, string $id)
    {
        $blog = BlogModel::find($id);
        $file = $request->image;
        $data = $request->all();
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        } else {
            $data['image'] = $blog->image;
        }

        $blog->title = $data['title'];
        $blog->image = $data['image'];;
        $blog->description = $data['description'];;
        $blog->content = $data['content'];;
        $blog->id_user = Auth::id();

        if ($blog->save()) {
            if (!empty($file)) {
                $file->move('upload/admin/blog/img_thum', $file->getClientOriginalName());
            }
            return redirect('/admin/blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogModel $blogModel)
    {
        //
    }
}
