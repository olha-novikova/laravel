<?php
Admin::model('App\User')
    ->title('Users')
    ->columns(function ()
        {
            Column::string('name', 'Name');
            Column::string('email', 'Email');
            Column::imageByUrl('avatar', 'Avatar');
        })
    ->form(function ()
        {
            FormItem::text('name', 'Name');
            FormItem::text('email', 'Email')->unique();

        });