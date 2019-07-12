<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\CreateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::orderby('created_at', 'desc')->paginate(10);
        return view('admin.list', compact('blogs'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.create', compact('category'));
    }


    public function store(CreateBlogRequest $request)
    {
        $blog = new Blog();
        $blog->post_title = $request->post_title;
        $blog->description = $request->description;
        $blog->content = $request->contents;
        $blog->image = $request->image;
        $blog->category_id = $request->category_id;
        $blog->save();

        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $category = Category::all();

        return view('admin.edit', compact('blog', 'category'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->post_title = $request->post_title;
        $blog->description = $request->description;
        $blog->content = $request->contents;
        $blog->image = $request->image;
        $blog->category_id = $request->category_id;
        $blog->save();

        return redirect()->route('admin.index');
    }


    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('admin.index');
    }

    public function view($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.view', compact('blog'));
    }


}
