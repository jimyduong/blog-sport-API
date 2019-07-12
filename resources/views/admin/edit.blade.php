@extends('homeadmin')
@section('title', 'Chỉnh sửa bài viết')
@section('content')
    <div class="col-10 col-md-10 ">
        <div class="row">

            <div class="col-12">
                <hr>
                <h1>Chỉnh sửa bài viết</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('admin.update', $blog->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên bài viết </label>
                        <input type="text" class="form-control" name="post_title" value="{{$blog->post_title}}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" required>{{$blog->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea type="text" class="form-control" name="contents" required>{{$blog->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <img src="{{asset($blog->image)}}" class="col-12" alt=""><br><br>
                        <input type="text" class="form-control" name="image" value="{{$blog->image}}">
                    </div>
                    <div class="form-group">
                        <label>Thể loại </label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $cate)
                                <option
                                        @if($blog->category_id == $cate->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection