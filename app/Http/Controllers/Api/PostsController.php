<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->limit(20)->get();

        return new PostCollection($posts);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return new PostResource($post);
    }
}
