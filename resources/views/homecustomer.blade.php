<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/drop-button.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background: lightblue">
    <div class="container">
        <a class="navbar-brand text-white" href="{{route('customer.index')}}"><h3>Sport Blog</h3></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <button class="btn btn-outline-danger ">Menu</button>
                        <div class="dropdown-content dropdown-menu">
                            <a href="{{route('customer.index')}}">Customer page</a>
                            <a href="{{route('admin.index')}}">Admin page</a>
                            <a href="{{route('category.index')}}">Category page</a>
                            <hr>
                            <a href="{{route('login')}}">
                                Login
                            </a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">

        @yield('content')

        <div class="col-md-4">
            <!-- Search Widget -->
            <form action="{{route('customer.search')}}">
                @csrf
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{route('customer.index')}}">
                                        Bài viết mới nhất
                                    </a>
                                </li>
                                <hr>
                                <li>
                                    <a href="{{route('customer.show.view')}}">Bài viết có lượt xem nhiều nhất</a>
                                </li>
                                <hr>
                                <li>
                                    <a href="{{route('customer.show.like')}}">Bài viết có lượt like nhiều nhất</a>
                                </li>
                            </ul>
                        </div>
                        {{--                        <div class="col-lg-6">--}}
                        {{--                            <ul class="list-unstyled mb-0">--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">Italia</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">Pháp</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">Tennis</a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">Liên hệ quảng cáo !</h5>
                <div class="card-body">
                    <img src="https://www.upsieutoc.com/images/2019/01/02/lien-he-quang-cao.png">
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="py-5" style="background: lightblue">
    <div class="container">
        <p class="m-0 text-center text-black-50">Copyright &copy; Your Website 2019</p>
    </div>
</footer>
</body>
</html>