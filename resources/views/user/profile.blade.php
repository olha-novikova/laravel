<?php
/**
 * Created by JetBrains PhpStorm.
 * User: olga
 * Date: 15.09.15
 * Time: 16:48
 * To change this template use File | Settings | File Templates.
 */
?>
@extends('layouts.layout')

@section('title', 'Profile')

@section('content')
<form  method="POST" action="{{ url('user/update', ['id' => $user->id])}}" enctype="multipart/form-data" >
<div class="row">
    <div class="col m8 s12">
        {!! csrf_field() !!}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="name" value="{{ $user->name }}" id="name" class="validate">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="{{ $user->email }}" type="email" class="validate" name="email" id="email" >
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                As your name will be display on pages
                <div class="chip">
                    <img src="{{ isset($user->avatar)&& $user->avatar!='' ? $user->avatar : asset('images/yuna.jpg') }} " alt="{{$user->name}}">
                    {{$user->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="col m4 s12">
        <div class="row">
            <div class="col s12">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" >
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="file" name = "avatar">
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="input-field col s12">
            <button class="btn waves-effect waves-light" type="submit">Save changes</button>
        </div>
</div>
   </form>

@endsection