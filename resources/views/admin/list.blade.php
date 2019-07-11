@extends('homeadmin')
@section('title', 'Danh sách bài viết ')
@section('content')

        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách post</title>
</head>
<body style="">
<div class="container">
    <div class="col-12">
        <hr>
        <h1>Danh Sách post</h1>
        <hr>
        <a href="{{route('admin.create')}}" class="btn btn-outline-success">Create</a>
        <hr>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Post title</th>
                <th scope="col">Descripton</th>
                <th scope="col">View</th>
                <th scope="col">Like</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(count($blogs) == 0)
                <tr>
                    <td colspan="4">Không có dữ liệu</td>
                </tr>
            @else
                @foreach($blogs as $key => $blog)
                    <tr>
                        <th scope="row" class="align-middle">{{ ++$key }}</th>
                        <td class="align-middle">
                            <a href="{{route('admin.view',$blog->id)}}">
                                {{ $blog['post_title'] }}
                            </a>
                        </td>
                        <td class="align-middle">{{ $blog['description'] }}</td>
                        <td class="align-middle">{{ $blog['view'] }}</td>
                        <td class="align-middle">{{ $blog['like'] }}</td>
                        <td class="align-middle">
                            <img src="{{ asset($blog->image) }}"
                                 alt="" style="width: 60px;height: 30px"></td>
                        <td>
                            <a href="{{route('admin.edit',$blog->id)}}" class="btn btn-outline-info">Edit</a>
                        </td>
                        <td>
                            <a href="{{route('admin.destroy',$blog->id)}}" class="btn btn-outline-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <p></p>
    <div>{{$blogs->links()}}</div>
    <hr>
</div>
</body>
</html>
@endsection