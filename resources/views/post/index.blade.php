@extends('layouts.layout')
@section('title', 'News')
@section('content')
@if (isset($search_result) && ($search_result === true))
    @section('page_name', 'Search result')
    @section('breadcrumbs', Breadcrumbs::render('search'))
@else
    @section('page_name', 'Latest news')
    @section('breadcrumbs', Breadcrumbs::render('news'))
@endif

<div class="row">
    @foreach ($posts as $post)
        <div class="section entry-post">
            <header class="entry-header clearfix">
                <div class="entry-meta row clearfix">
                    <div class="post-ut">
                        By
                        <a href="#">
                            <span class="author-link">{{$post->user->name}}</span>
                        </a>
                    </div>
                    <div class="post-ut">
                        <a rel="bookmark" title="" href="#">
                            <span class="entry-date">{{ $post->created_at ->format('F d, Y')}}</span>
                        </a>
                    </div>
                    <div class="post-ut">
                        @if (count($post->comments) > 0)
                            <span class="comments-has">
                                <a href="#">{{ count($post->comments) }}<i class="material-icons small prefix active">chat_bubble</i></a>

                            </span>
                        @else
                            <span class="comments-no">
                                <a href="#">0<i class="material-icons small prefix">chat_bubble</i></a>

                            </span>
                        @endif
                    </div>
                    <div class="entry-like like_it">
                        <a title="Like it" data-postid="{{$post->id}}" @if(!Auth::guest()) data-userid="{{Auth::user()->id}}" @endif >
                            <i class="material-icons small prefix @if (count($post->likes) >0 ) {{"active"}} @endif">thumbs_up_down</i>
                            <span class="count-likes">{{ count($post->likes) }}</span>
                        </a>
                    </div>
                </div>
            </header>
            <h1 class="entry-title standard-post-title">
                <a rel="bookmark" title="{{$post->title}}" href="{{ url('post', ['id' => $post->id])}}">{{$post->title}}</a>
            </h1>
            <div class="entry-content clearfix">
                <div class="entry-summary">
                    <p class="truncate"><?php echo strip_tags($post->text); ?><a title = "Full text"  href="{{ url('post', ['id' => $post->id])}}"> ... </a></p>
                </div>
            </div>
            <footer class="entry-footer clearfix"> </footer>
        </div>
    @endforeach
    <div id="client_data">
        {!! csrf_field() !!}
        <input type="hidden" name="client_ip" value="{{ get_client_ip_server() }}">
    </div>
</div>
@endsection

@section('most_commented')
    <h3 class="widget-title">
        <span>Most commented post</span>
    </h3>
    @foreach ($most_commented as $most_commented_post)
        <ul>
            <li class="last_post widget">
                <a href="{{ url('post', ['id' => $most_commented_post->id])}}">{{$most_commented_post->title}} </a>By {{$most_commented_post->user->name}}
            </li>
        </ul>
    @endforeach
@endsection

@section('last_comment')
    <h3 class="widget-title">
        <span>Latest comment</span>
    </h3>
    @foreach ($last_comment as $last_comment_post)
        <ul>
            <li class="last_comment widget">
                {{$last_comment_post->user->name}} on <a href="{{ url('post', ['id' => $last_comment_post->post_id])}}"> {{$last_comment_post->post->title}} </a> &#10077;{{str_limit($last_comment_post->text, 60, '...')}}&#10078;
            </li>
        </ul>
    @endforeach
@endsection
