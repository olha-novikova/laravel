<?php

Admin::model('App\Post')
    -> title('Posts')
    -> with('user')
    -> columns(function ()
    {
        Column::string('title', 'Title');
        Column::string('text', 'Text');
        Column::string('user.email', 'User');
        Column::string('created_at', 'Created by');
        Column::string('updated_at', 'Updated by');
    })
    -> form(function ()
    {
        FormItem::text('title', 'Title');
        FormItem::ckeditor('text', 'Text');
        FormItem::select('user_id', 'User')->list('App\User')->required();
    });