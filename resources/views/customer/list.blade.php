@extends('home')
@section('title', 'News')

@section('content')
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- Blog Post -->
                @if(count($blogs) == 0)
                    <tr>
                        <td colspan="4">Chưa có vài viết nào !!!</td>
                    </tr>
                @else
                    @foreach($blogs as $key => $blog)
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{asset($blog->image)}}" width="700" height="300" alt="Card image cap">
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
                            </div>
                            <div class="card-footer text-muted">
                                Posted {{$blog->created_at}}
{{--                                <a href="#">Start Bootstrap</a>--}}
                            </div>
                        </div>
                    @endforeach
                @endif
                <div>{{$blogs->links()}}</div>
            </div>
@endsection