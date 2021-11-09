<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use Illuminate\Support\Facades\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->limit(20)
            ->get();

        return new PostCollection($posts);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return new PostResource($post);
    }
}
