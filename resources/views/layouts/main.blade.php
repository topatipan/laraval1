<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('articles') }}" class="navbar-brand">Breaking News</a>
            </div>

            <a href="{{ url('lang/en') }}" class="btn">EN</a>
            <a href="{{ url('lang/th') }}" class="btn">TH</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('articles/create') }}">New Article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


   <div class="container">
        @if(session()->has('flash_message'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('flash_message') }}
        </div>
        @endif
       @yield('content')
   </div>


   {!! HTML::script('js/jquery.min.js') !!}
   {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>
