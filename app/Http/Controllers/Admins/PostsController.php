<?php

namespace App\Http\Controllers\Admins;

use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $posts = Post::latest()
            ->when(
                Str::of($keyword)->trim()->isNotEmpty(),
                fn($builder) => $builder->where('title', 'like', "%{$keyword}%")
            )
            ->paginate();

        $posts->append('keyword');

        return view('admins.posts.index', compact('posts', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->only(['title', 'content', 'published']));

        $post->cover()->create(
            $this->resolvedFile($request->file('file'))
        );


        return redirect()
            ->route('admins.post.index')
            ->with('message', 'Berhasil menambahkan postingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admins.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admins.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only(['title', 'content', 'published']));

        if ($request->hasFile('file')) {
            $path = $post->cover->path;
            /**
             * Delete old file if is exsist.
             */
            if (Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);

            $post->cover()->create(
                $this->resolvedFile($request->file('file'))
            );
        }

        return redirect()
            ->route('admins.post.index')
            ->with('message', 'Berhasil menyimpan perubahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus postingan');
    }


    /**
     * @param \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null $file
     * @return array
     */
    private function resolvedFile($file): array
    {
        $originalFileName = $file->getClientOriginalName();
        $filePath = $file->store('posts');

        return [
            'original_filename' => $originalFileName,
            'filename' => Str::of($filePath)->split('/\//')->last(),
            'content_type' => $file->getMimeType(),
            'path' => $filePath,
            'byte_size' => $file->getSize()
        ];
    }
}
