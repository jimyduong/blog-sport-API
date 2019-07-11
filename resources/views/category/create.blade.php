@extends('homeadmin')
@section('title', 'Thêm mới thể loại')
@section('content')
    <div class="col-8 col-md-8">
        <div class="row">
            <div class="col-8">
                <hr>
                <h1>Thêm mới thể lọai</h1>
            </div>
            <div class="col-8">
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection