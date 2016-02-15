<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > About
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->push('News', url('post'));
});

Breadcrumbs::register('post', function($breadcrumbs, $post) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push($post->title, url('post', ['id' => $post->id]));
});

Breadcrumbs::register('search', function($breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push("Search results", url('post'));
});
