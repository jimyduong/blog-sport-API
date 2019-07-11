@extends('homeadmin')
@section('title', 'Chỉnh sửa thể loại')
@section('content')
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <hr>

                <h1>Chỉnh sửa thể loại</h1>
            </div>
            <div class="col-8">
                <form method="post" action="{{route('category.update',$category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>

                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection