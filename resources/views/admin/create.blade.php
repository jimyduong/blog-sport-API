@extends('homeadmin')
@section('title', 'Thêm mới')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <hr>
                <h1>Thêm mới bài viết </h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên bài viết </label>
                        <input type="text" class="form-control" name="post_title" required>
                        @if($errors->has('post_title'))
                            <p class=" text-danger">{{ $errors->first('post_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" required></textarea>
                        @if($errors->has('description'))
                            <p class=" text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea type="text" class="form-control" name="contents" required></textarea>
                        @if($errors->has('contents'))
                            <p class=" text-danger">{{ $errors->first('contents') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="text" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>Thể loại </label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn btn-outline-success">Thêm mới</button>
                    <button class="btn btn btn-outline-dark" onclick="window.history.go(-1); return false;">Hủy</button>
                    <hr>

                </form>
            </div>
        </div>
    </div>
@endsection