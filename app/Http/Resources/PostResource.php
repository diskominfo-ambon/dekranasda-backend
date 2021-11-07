<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public $with = ['error' => false];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'published' => $this->published,
                'content' => $this->content,
                'views' => views($this->resource)->count(),
                'attachments' => AttachmentResource::collection($this->attachments),
                'created' => [
                    'calendar' => $this->created_at->isoFormat('LL'),
                    'full' => $this->created_at->isoFormat('LLLL'),
                    'default' => $this->created_at
                ],
                'updated' => [
                    'calendar' => $this->updated_at->isoFormat('LL'),
                    'full' => $this->updated_at->isoFormat('LLLL'),
                    'default' => $this->updated_at
                ]
            ];
    }
}
