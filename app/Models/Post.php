<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use App\Models\Concerns\HasAttachment;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model implements Viewable
{
    use HasFactory, InteractsWithViews, HasAttachment;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    public function cover(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

}
