<?php

Admin::model('App\Comment')
    -> title('Comments')
    -> columns(function ()
    {
        Column::string('text', 'Text');
        Column::string('created_at', 'Created by');
        Column::string('updated_at', 'Updated by');
        Column::string('user.email', 'From user');
        Column::string('post.title', 'On post');
    })
    -> form(function ()
    {
        FormItem::ckeditor('text', 'Text');
       // FormItem::select('post_id', 'Post')->list('App\Post')->required();
       // FormItem::select('user_id', 'User')->list('App\User')->required();
    });