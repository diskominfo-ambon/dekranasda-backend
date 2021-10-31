<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttachmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'originalFilename' => $this->original_filename,
            'filename' => $this->filename,
            'path' => $this->path,
            'contentType' => $this->content_type,
            'metadata' => $this->metadata,
            'byteSize' => $this->byte_size
        ];
    }
}
