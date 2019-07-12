@extends('homecustomer')
@section('title', 'News')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Định viết gì vào đây.
            <small>nhưng lại không biết viết gì! </small>
        </h1>
        <hr>
        <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#categoryModal">
            Lọc theo thể loại
        </a>
{{--        <div class="col-12">--}}
{{--            @if (Session::has('success'))--}}
{{--                <p class="text-success">--}}
{{--                    <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--                    {{ Session::get('success') }}--}}
{{--                </p>--}}
{{--            @endif--}}
{{--        </div>--}}
        <hr>
        <!-- Blog Post -->
        @if(count($blogs) == 0)
            <tr>
                <td colspan="4">Chưa có vài viết nào !!!</td>
            </tr>
        @else
            @foreach($blogs as $key => $blog)
                <div class="card mb-4">
                    <img class="card-img-top" src="{{asset($blog->image)}}" width="700" height="300"
                         alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$blog->post_title}}</h2>
                        <p class="card-text">{{$blog->description}}</p>
                        <a href="{{route('customer.view',$blog->id)}}" class="btn btn-primary">Read More &rarr;</a>
                        <hr>
                        <p class="badge badge-primary text-wrap">
                            Số lượt xem: {{$blog->view}}
                        </p>
                        <p class="badge badge-primary text-wrap">
                            Số lượt like: {{$blog->like}}
                        </p>
                        <p class="badge badge-primary text-wrap">
                            {{$blog->category->name}}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted {{$blog->created_at}}
                    </div>
                </div>
        @endforeach
    @endif

    <!-- Modal -->
        <div class="modal fade" id="categoryModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <form action="{{ route('customer.filterByCategory') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!--Lọc theo khóa học -->
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label border-right">Lọc bài viết theo thể loại: </label>
                                    <div class="col-sm-7">
                                        <select class="custom-select w-100" name="category_id">
                                            <option value="">Chọn thể loại</option>
                                            @foreach($category as $cate)
                                                @if(isset($categoryFilter))
                                                    @if($cate->id == $categoryFilter->id)
                                                        <option value="{{$cate->id}}"
                                                                selected>{{ $cate->name }}</option>
                                                    @else
                                                        <option value="{{$cate->id}}">{{ $cate->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$cate->id}}">{{ $cate->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div>{{$blogs->appends(request()->query())}}</div>
    </div>
@endsection