<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UploaderRequest;
use App\Http\Resources\AttachmentResource;

class UploadersController extends Controller
{
    public function store(UploaderRequest $request)
    {
        $file = $request->file('uploader');
        $filePath = $file->store('products', [
            'disk' => 'public'
        ]);

        $attachment = Attachment::create([
            'original_filename' => $file->getClientOriginalName(),
            'filename' => Str::of($filePath)->split('/\//')->last(),
            'content_type' => $file->getMimeType(),
            'path' => $filePath,
            'byte_size' => $file->getSize()
        ]);

        return new AttachmentResource($attachment);
    }


    public function destroy(int $id)
    {
        Attachment::findOrFail($id)
            ->delete();


        return new JsonResponse([
            'data' => [
                'message' => 'Successfully deleted.'
            ],
        ], 200);
    }
}
