<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
        <!-- Styles -->

    </head>
    <body>
        <div class="flex-top position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
                <div class="top-left links">
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="#"><span>Laracasts</span>
                            <div class="menu-top">

                                
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="menu-item">
                                            @foreach($categories as $category)
                                                <div class="card-header" id="headingOne-{{ $category->id }}">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $category->id }}" aria-expanded="true" aria-controls="collapseOne-{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </button>
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="menu-list">
                                            @foreach($categories as $category)
                                                <div id="collapseOne-{{ $category->id }}" class="collapse " aria-labelledby="headingOne-{{ $category->id }}" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            @foreach($category->children as $cats)
                                                                <div class="col-md-3">
                                                                    <h5>{{ $cats->name }}</h5>
                                                                    <hr />
                                                                    <ul>
                                                                        @foreach($cats->children as $cat)
                                                                            <li><a href="">{{$cat->name}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>

            <div class="content">
                <div class="title m-b-md text-center">
                    Laravel
                </div>

                <div class="links text-center">
                    <a href="https://laravel.com/docs">Documentation</a>

                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>



                <div class="container mt-5 mb-5">
                    @yield('content')
                </div>

                {{--<div class="text-left">--}}
                    {{--<ul>--}}
                        {{--@foreach($categories as $category)--}}
                            {{--<div class="col-md-12">--}}
                                {{--<h4 style="background: #d6e9f8">{{ $category->name }}</h4>--}}
                                {{--<hr />--}}
                                {{--<div class="row">--}}
                                    {{--@foreach($category->children as $cats)--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<h5>{{ $cats->name }}</h5>--}}
                                            {{--<hr />--}}
                                            {{--@foreach($cats->children as $cat)--}}
                                                {{--<h6>{{$cat->name}}</h6>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>
