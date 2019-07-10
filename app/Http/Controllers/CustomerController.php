<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderby('created_at','desc')->paginate(3);
        return view('customer.list', compact('blogs'));
    }
    public function showByView()
    {
        $blogs = Blog::orderby('view','desc')->paginate(3);
        return view('customer.list', compact('blogs'));
    }
    public function showByLike()
    {
        $blogs = Blog::orderby('like','desc')->paginate(3);
        return view('customer.list', compact('blogs'));
    }

    public function view($id)
    {
//        $blogKey = 'product_' . $id;
//        if (!Session::has($blogKey)) {
//            Blog::where('id', $id)->increment('view');
//            Session::put($blogKey, 1);
//            Session::forget($blogKey);
//        }

        $blog = Blog::findOrFail($id);
        $blog->view++;
        $blog->save();
        return view('customer.view', compact('blog'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customer.index');
        }
        $blogs = Blog::where('post_title', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);
        return view('customer.list', compact('blogs'));
    }
}
