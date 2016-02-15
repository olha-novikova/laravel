<?php
/**
 * Created by JetBrains PhpStorm.
 * User: olga
 * Date: 13.10.15
 * Time: 13:07
 * To change this template use File | Settings | File Templates.
 */
?>
<ul class="commentlist">
    @foreach ($comments as $comment)
        @if ( $comment->approval != 'p' || (Auth::check() && $comment->approval == 'p' && $comment->user_id == $user->id) )
        <li id="li-comment-1" class="comment even thread-even depth-1">
            <div id="comment-1" class="single-comment clearfix">
                <figure class="comment-author vcard ">
                    <img class = "circle" src="{{ isset($comment->user->avatar)&& $comment->user->avatar!='' ? $comment->user->avatar : asset('images/yuna.jpg') }} " alt="{{$comment->user->name}}">
                </figure>
                <article class="comment-body">
                    <header class="comment-header">
                        <cite class="fn">
                            <a class="url" rel="external nofollow" href="#"> {{$comment->user->name}}</a>
                        </cite>
                        <br>
                        <span class="comment-date">{{ $comment->created_at ->format('F d, Y')}} - {{ $comment->created_at ->format('G:i:s ') }}</span>
                    </header>
                    <p>
                        {{$comment->text}}
                    </p>
                    <footer class="comment-meta commentmetadata"> </footer>
                </article>
            </div>
        </li>
        @endif
    @endforeach
</ul>


