<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerControllerAPI extends Controller
{
    public function index()
    {
        try{
            $blogs = Blog::orderby('created_at', 'desc')->paginate(3);
            $arrsBlog=[];
            foreach ($blogs as $blog){
                $obj=new \stdClass();
                $obj->id = $blog->id;
                $obj->post_title = $blog->post_title;
                $obj->description = $blog->description;
                $obj->content = $blog->content;
                $obj->view = $blog->view;
                $obj->like = $blog->like;
                $obj->image = $blog->image;
                $obj->category = $blog->category;
                array_push($arrsBlog, $obj);
            }
            return response()->json([
                'status' => 'thanh cong',
                'data' => $arrsBlog
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>"error",
                'message'=>$e->getMessage()]);
        }


    }

    public function view($id)
    {
        $blogKey = 'post_' . $id;
        if (!Session::has($blogKey)) {
            Blog::where('id', $id)->increment('view');
            Session::put($blogKey, 1);
        }
        $blog = Blog::findOrFail($id);
        $obj = new \stdClass();
        $obj->id = $blog->id;
        $obj->post_title = $blog->post_title;
        $obj->description = $blog->description;
        $obj->content = $blog->content;
        $obj->view = $blog->view;
        $obj->like = $blog->like;
        $obj->image = $blog->image;
        $obj->category = $blog->category->name;

        return response()->json($obj);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!$keyword) {
            return response()->json([
                'status' => 'error',
                'message' => 'Phai nhap keyword'
            ]);
        }
        $blogs = Blog::where('post_title', 'LIKE', '%' . $keyword . '%')
            ->get();

        $arrsBlog = [];

        foreach ($blogs as $blog) {
            $obj = new \stdClass();
            $obj->id = $blog->id;
            $obj->post_title = $blog->post_title;
            $obj->description = $blog->description;
            $obj->content = $blog->content;
            $obj->view = $blog->view;
            $obj->like = $blog->like;
            $obj->image = $blog->image;
            $obj->category = $blog->category;
            array_push($arrsBlog, $obj);
        }
        if (!$arrsBlog) {
            return response()->json(['status' => "khong co bai viet"]);
        }
        return response()->json([
            'status' => 'thanh cong',
            'data' => $arrsBlog
        ]);

    }

    public function filterByCategory(Request $request)
    {
        $idCategory = $request->input('category_id');
        $categoryFilter = Category::findOrFail($idCategory);
        $blogs = Blog::where('category_id', $categoryFilter->id)->orderby('created_at', 'desc')->paginate(3);
        $totalPostFilter = count($blogs);
        $category = Category::all();

//        return view('customer.list', compact('blogs', 'totalPostFilter', 'category', 'categoryFilter'));
        return response()->json($blogs, $category, $totalPostFilter, $categoryFilter);
    }
}
