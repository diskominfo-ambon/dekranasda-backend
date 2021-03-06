<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\Publishable;
use App\Models\Concerns\HasAttachment;


class Post extends Model implements Viewable
{
    use HasFactory, InteractsWithViews, Publishable, HasAttachment;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    public function getIsPublishedAttribute(): bool
    {
        return !is_null($this->published);
    }


    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::of($model->title)->slug()->substr(0, 20) . '-'.Str::random();
        });
    }
}
