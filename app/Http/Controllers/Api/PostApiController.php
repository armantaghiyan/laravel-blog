<?php

namespace App\Http\Controllers\Api;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Arman\LaravelHelper\Api\Api;
use Arman\LaravelHelper\Auth\WithAuth;

class PostApiController extends Controller {

    use WithAuth;

    public function index(): \Illuminate\Http\JsonResponse {
        $user = $this->auth(required: false);

        $loadedCount = \request(P_LOADED_COUNT, 0);
        $topicSlug = \request(P_TOPIC);
        $tagSlug = \request(P_TAG);
        $query = \request(P_QUERY);

        $builder = Post::withUser([COL_USER_ID, COL_USER_NAME, COL_USER_USERNAME, COL_USER_AVATAR])
            ->with('topic')
            ->page($loadedCount)
            ->latest(COL_POST_ID)
            ->where(COL_POST_STATUS, PostStatus::PUBLISHED)
            ->filter(COL_POST_TITLE, "%$query%");


        if ($tagSlug) {
            $builder->whereHas('tags', function ($q) use ($tagSlug) {
                $q->where(COL_TAG_SLUG, $tagSlug);
            });
        } elseif ($topicSlug) {
            $topic = Topic::where(COL_TOPIC_SLUG, $topicSlug)->first();
            $builder->filter(COL_POST_TOPIC_ID, $topic[COL_TOPIC_ID] ?? null);
        }

        if($user){
            $builder->withLikes(COL_LIKE_USER_ID, $user[COL_USER_ID]);
        }

        $posts = $builder->select([COL_POST_ID, COL_POST_USER_ID, COL_POST_TOPIC_ID, COL_POST_TITLE, COL_POST_SLUG, COL_POST_THUMBNAIL, COL_CREATED_AT])
            ->withCount('likes')
            ->get();


        foreach ($posts as $post){
            if(sizeof($post['likes'])>0){
                $post['is_liked']=1;
            }else{
                $post['is_liked']=0;
            }

            unset($post['likes']);
        }

        return Api::cast([RK_POSTS => $posts]);
    }

    public function show($username, $slug) {
        $user = User::where(COL_USER_USERNAME, $username)->firstOrError([COL_USER_ID, COL_USER_NAME, COL_USER_USERNAME, COL_USER_AVATAR]);

        $post = Post::with('topic')->with('tags')
            ->where(COL_POST_USER_ID, $user[COL_USER_ID])
            ->where(COL_POST_SLUG, $slug)
            ->where(COL_POST_STATUS, PostStatus::PUBLISHED)
            ->firstOrError();

        $post['user'] = $user;

        return Api::cast([RK_POST => $post]);
    }
}
