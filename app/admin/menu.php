<?php

Admin::menu()->url('/')->label('Dashboard')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu('App\User')->icon('fa-users');
Admin::menu()->label('Posts and Comments')->icon('fa-book')->items(function ()
    {
        Admin::menu('App\Post')->icon('fa-align-center');
        Admin::menu('App\Comment')->icon('fa-align-center');
    }
);