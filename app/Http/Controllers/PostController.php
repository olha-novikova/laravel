<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use DB;
use App\Post;
use App\Comment;
use App\Like;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $data['posts'] = $posts;
        $data['most_commented'] = $this -> getMostCommented();
        $data['last_comment'] = $this -> getLastComment();
        return view('post.index', $data);
    }


    private function getMostCommented(){
        $most_commented = Post::join('comments', 'posts.id', '=', 'comments.post_id')
            ->select(array('posts.*',
                DB::raw('count(*) as comments_count')
            ))
            ->groupBy('id')
            ->orderBy('comments_count', 'DESC')
            ->take(1)
            ->get();

        if (count ($most_commented) ) return $most_commented;

        return false;
    }

    /**
     * Return last comment
     * @return Response
     */

    private function getLastComment(){
        $last_comment = Comment::orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        if (count ($last_comment) ) return $last_comment;

        return false;
    }


    /**
     * Return count of likes for specific post
     * @param  int  $id
     * @return Response
     */

    public function getCountLikes( $id ){
        $like_count = Like::where('post_id', $id) ->count();
        if (count ($like_count) ) return $like_count;

        return false;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Получить экземпляр модели по ключу...
        $post = Post::find($id);
        $comments = Post::find($id)->comments;

        $data['post'] = $post;
        $data['comments'] = $comments;

        return view('post.show', $data);
    }

    /**
     * Search by string in fulltext fields title and text in post table

     **/

    public function postSearch(Request $request)
    {
        $q = $request -> s;

        $posts = Post::whereRaw("MATCH(title,text) AGAINST(? IN BOOLEAN MODE)",array($q))
            ->get();

        $data['posts'] = $posts;
        $data['most_commented'] = $this -> getMostCommented();
        $data['last_comment'] = $this -> getLastComment();
        $data['search_result'] = true;
        return view('post.index', $data);

    }
}
