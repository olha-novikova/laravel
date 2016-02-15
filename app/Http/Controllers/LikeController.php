<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    private function getCountLikesByPostId( $id ){
        $posts_like = Like:: where('post_id', $id) ->count();
        return $posts_like;
    }

    public function ajaxCheckLike(Request $request){
        $post_id = $request->post_id;
        $user_id = $request->user_id;
        $host_ip = $request->host_ip;

        if( isset($user_id) && $user_id != '' ){
             $posts_like = Like::where('user_id', $user_id)
                ->where('post_id', $post_id)
                ->first();
             if ( isset($posts_like) &&  count($posts_like)>0 ) { //dislike
                 $posts_like->delete();
                 $type = -1;
             }else { // like
                 $like = new Like;
                 $like->post_id = $post_id;
                 $like->user_id = $user_id;
                 $like->save();
                 $type = 1;
             }
        }else {
             $posts_like = Like::where('ip_address', $host_ip)
                ->where('post_id', $post_id)
                ->first();

            if ( isset($posts_like) &&  count($posts_like)>0 ) { //dislike
                $posts_like->delete();
                $type = -1;
            }else { // like
                $like = new Like;
                $like->post_id = $post_id;
                $like->ip_address = $host_ip;
                $like->save();
                $type = 1;
            }
        }
        $data['type']= $type;
        $data['count']= $this -> getCountLikesByPostId($post_id);

        echo json_encode($data);
    }
}
