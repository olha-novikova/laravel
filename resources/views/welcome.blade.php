@extends('layouts.home_layout')
@section('title', 'Home Page')
@section('content')
<div class="row z-depth-6 banner">
    <div class="col s12 m6 l9 full-width">
        <div class="middle-valign">
            <h5 class="right-align">This should be vertically aligned</h5>
        </div>

    </div>
    <div class="col s12 m6 l3 left-panel full-width">
        @if(Auth::guest())
        @include('auth.login')
        @else
        <?php $user = Auth::user(); ?>
        <div class="middle-valign left-absolute-align">
            <h5>setferger MASTER will have conflict</h5>
            <h5 class="left-align"><a class="white-text" href="{{ url('user', ['id' => $user->id])}}">{{$user->name}}</a></h5>
            <h5 class="left-align"><a class="white-text" href="{{ url('auth/logout')}}"> LogOut </a></h5>
        </div>
        @endif
    </div>
<!--    <div class="col s12 m12 l12 banner valign-wrapper">-->
<!--        <div class="valign">-->
<!--            <h5 class="right-align">This should be vertically aligned</h5>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col s12 m6 l3 offset-m6 offset-l9 left-panel valign-wrapper">-->
<!--                @if(Auth::guest())-->
<!--                    @include('auth.login')-->
<!--                @else-->
<!--                    --><?php //$user = Auth::user(); ?>
<!--                    <div class="valign">-->
<!--                        <h5 class="left-align"><a class="white-text" href="{{ url('user', ['id' => $user->id])}}">{{$user->name}}</a></h5>-->
<!--                        <h5 class="left-align"><a class="white-text" href="{{ url('auth/logout')}}"> LogOut </a></h5>-->
<!--                    </div>-->
<!--                @endif-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card z-depth-0">
                <div class="card-image">
                    <img src="{{ URL::asset('images/pics16.jpg') }}">
                    <span class="card-title">Название карточки</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn-large">Ссылка здесь</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card z-depth-0">
                <div class="card-image">
                    <img src="{{ URL::asset('images/pics14.jpg') }}">
                    <span class="card-title">Название карточки</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn-large">Ссылка здесь</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card z-depth-0">
                <div class="card-image">
                    <img src="{{ URL::asset('images/pics15.jpg') }}">
                    <span class="card-title">Название карточки</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn-large">Ссылка здесь</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection