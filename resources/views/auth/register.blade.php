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

@section('title', 'Log In')

@section('content')

<div class="row">
    <form class="col s12" method="POST" action="{{ url('auth/register')}}" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="name" id="name" class="validate">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="email" class="validate" name="email" id="email">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="file" name = "avatar">
<!--                <div class="file-field input-field">-->
<!--                    <div class="btn">-->
<!--                        <span>Avatar</span>-->
<!--                        <input type="file" name = "avatar">-->
<!--                    </div>-->
<!--                    <div class="file-path-wrapper">-->
<!--                        <input class="file-path validate" type="text">-->
<!--                    </div>-->
<!--                </div>-->

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password" >
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password_confirmation" type="password" class="validate" name="password_confirmation" >
                <label for="password_confirmation">Confirm Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection