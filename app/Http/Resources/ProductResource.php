<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
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
            'content' => $this->content,
            'price' => $this->price,
            'priceWithDiscountToRupiah' => rupiah(($this->price * $this->discount) / 100),
            'priceToRupiah' => rupiah($this->price),
            'categories' => CategoryResource::collection($this->categories),
            'status' => $this->status,
            'discount' => $this->discount,
            'isDiscount' => $this->isDiscount,
            'views' => views($this->resource)->count(),
            'attachments' => AttachmentResource::collection($this->attachments),
            'created' => [
                'calendar' => $this->created_at->isoFormat('LL'),
                'full' => $this->created_at->isoFormat('LLLL'),
                'default' => $this->created_at
            ],
            'user' => new UserResource($this->user)
        ];
    }
}
