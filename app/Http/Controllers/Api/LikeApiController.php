<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Arman\LaravelHelper\Api\Api;
use Arman\LaravelHelper\Auth\WithAuth;
use Illuminate\Http\Request;

class LikeApiController extends Controller {

    use WithAuth;

    public function toggle($type) {
        $id = \request(P_ID);

        $user = $this->auth();

        $post = Post::where(COL_POST_ID, $id)->firstOrError();

        $like = Like::where(COL_LIKE_USER_ID, $user[COL_USER_ID])
            ->where(COL_LIKE_TARGET_TYPE, $type)
            ->where(COL_LIKE_TARGET_ID, $post[COL_POST_ID])
            ->first();

        if($like){
            $like->delete();
            $isLiked = 0;
        }else{
            $like = new Like();
            $like[COL_LIKE_USER_ID] = $user[COL_USER_ID];
            $like[COL_LIKE_TARGET_ID] = $post[COL_POST_ID];
            $like[COL_LIKE_TARGET_TYPE] = $type;
            $like->save();
            $isLiked = 1;
        }

        return Api::cast([P_IS_LIKED => $isLiked]);
    }
}
