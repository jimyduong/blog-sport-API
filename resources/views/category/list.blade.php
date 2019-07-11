@extends('homeadmin')
@section('title', 'Danh sách')
@section('content')
    <div class="col-12">
        <div class="row">

            <div class="col-12">
                <hr>
                <h1>Danh Sách Thể Loại</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col">Số bài viết</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ count($category->blog) }}</td>
                            <td><a href="{{route('category.edit',['id'=>$category->id])}}"
                                   class="btn btn-outline-info">sửa</a>
                            <a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-outline-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('category.create')}}">Thêm mới</a>
        </div>
        <hr>
    </div>
@endsection