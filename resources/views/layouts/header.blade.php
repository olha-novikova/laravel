<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!--Import materialize.css-->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/helper.js') }}"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
    @if(!Auth::guest())
    <?php $user = Auth::user(); ?>
    <ul id="dropdown1" class="dropdown-content">
        <li><a class="grey-text text-darken-4" href="{{ url('user', ['id' => $user->id])}}">Profile</a></li>
        <li><a class="grey-text text-darken-4" href="{{ url('auth/logout')}}">LogOut</a></li>
    </ul>
    @endif
    <nav class="z-depth-0">
        <div class="nav-wrapper white" id="site-navigation">
            <a href="{{ url('/')}}" class="brand-logo grey-text text-darken-4">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="grey-text text-darken-4" href="{{ url('/')}}">Home</a></li>
                <li><a class="grey-text text-darken-4" href="{{ url('/post')}}">News</a></li>
                <li>
                    @if(Auth::guest())
                    <a class="grey-text text-darken-4" href="{{ url('auth/login')}}">LogIn</a>
                    @else
                    <a class="grey-text text-darken-4 dropdown-button" href="#!" data-activates="dropdown1">{{$user->name}}<i class="material-icons right">arrow_drop_down</i></a>
                    @endif
                </li>
                <li><a class="grey-text text-darken-4" target = "_blank" href="{{ url('/admin')}}">Admin</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a class="grey-text text-darken-4" href="{{ url('/')}}">Home</a></li>
                <li><a class="grey-text text-darken-4" href="{{ url('/post')}}">News</a></li>
                @if(Auth::guest())
                    <li><a class="grey-text text-darken-4" href="{{ url('auth/login')}}">LogIn</a> </li>
                @else
                    <li><a class="grey-text text-darken-4" href="{{ url('user', ['id' => $user->id])}}">Profile</a> </li>
                    <li><a class="grey-text text-darken-4" href="{{ url('auth/logout')}}">LogOut</a> </li>
                @endif
                <li><a class="grey-text text-darken-4" target = "_blank" href="{{ url('/admin')}}">Admin</a></li>
            </ul>
        </div>
    </nav>
</div><!--container-->
