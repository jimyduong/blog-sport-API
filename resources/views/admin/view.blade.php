@extends('homeadmin')
@section('title', $blog->post_title)

@section('content')
    <div class="col-lg-10">
        <hr>
        <a href="{{route('admin.edit',$blog->id)}}" class="btn btn btn-outline-info">Edit</a>
        <a href="{{route('admin.destroy',$blog->id)}}" class="btn btn btn-outline-danger">Delete</a>
        <!-- Title -->
        <h1 class="mt-4">{{$blog->post_title}}</h1>
        <hr>
        <!-- Date/Time -->
        <p class="badge badge-primary text-wrap">
            Ngày đăng: {{$blog->updated_at}}</p><br>
        <p class="badge badge-primary text-wrap">
            Số lượt xem: {{$blog->view}}
        </p>
        <p class="badge badge-primary text-wrap">
            Số lượt like: {{$blog->like}}
        </p>
        <p class="badge badge-primary text-wrap">
            {{$blog->category->name}}
        </p>
        <p style="float: right">
            <button class="">like</button>
        </p>
        <hr>
        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset($blog->image)}}" alt="">
        <hr>
        <!-- Post Content -->
        <div>
            <p class="text-justify">
                {{$blog->content}}
            </p>
        </div>

        <hr>
    </div>
@endsection