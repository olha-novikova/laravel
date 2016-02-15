@extends('layouts.layout')
@section('title', $post->title)
@section('breadcrumbs', Breadcrumbs::render('post', $post))
@section('page_name', $post->title)
@section('content')
<?php $user = Auth::user();?>
<div class="row">
        <div class="entry-meta row clearfix">
            <div class="post-ut">
                By
                <a href="#">
                    <span class="author-link">{{$post->user->name}}</span>
                </a>
            </div>
            <div class="post-ut">
                <a rel="bookmark" title="" href="#">
                    <span class="entry-date">{{ $post->created_at }}</span>
                </a>
            </div>
            <div class="post-ut">
                            <span class="comments-link">
                            <a href="#">{{count($comments)}}</a>
                            </span>
            </div>
            <div class="entry-like like_it">
                <a title="Like it" data-postid="{{$post->id}}" @if(!Auth::guest()) data-userid="{{Auth::user()->id}}" @endif >
                <i class="material-icons small prefix @if (count($post->likes) >0 ) {{"active"}} @endif">thumbs_up_down</i>
                <span class="count-likes"> {{ count($post->likes) }}</span>
                </a>
            </div>
        </div>

    <div class="entry-content">
        {!! $post->text !!}
    </div>
    <div id="client_data">
        {!! csrf_field() !!}
        <input type="hidden" name="client_ip" value="{{ get_client_ip_server() }}">
    </div>
    @if (count($comments) >=1)
        @if (count($comments) === 1)
            <h3 class="widget-title">
                <span>This post has one comment</span>
            </h3>
         @else
            <h3 class="widget-title">
                <span>This post has {{count($comments)}} comments</span>
            </h3>
        @endif
        <div class="row">
            <div class="col s12">
                <ul class="commentlist">
                    @include('post.comment')
                </ul>
            </div>
        </div>
    @else
        <p class="right-align grey-text text-darken-1">This post has no comments yet</p>
    @endif

    <?php  if (Auth::check()) {?>
        <div class="divider"></div>
        <div class="row">
            <form class="col s12" action="{{ url('/comment')}}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s8">
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <input type="hidden" value="{{$user->id}}" name="user_id">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" name= "text" class="materialize-textarea "></textarea>
                        <label for="icon_prefix2">Comment</label>
                    </div>
                    <div class="input-field col s4">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Sent
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <?php }?>

</div>
@endsection
