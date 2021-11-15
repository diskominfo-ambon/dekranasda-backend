<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostIncreaseVisitorController extends Controller
{
    public function store(Request $request, int $id)
    {
        $post = Post::findOrFail($id);
        views($post)->record();

        return new JsonResponse([
            'data' => [
                'message' => "Post [id]: {$id} was be increase.",
                'views' => $post->views()->count()
            ],
            'error' => false
        ], 200);
    }
}
