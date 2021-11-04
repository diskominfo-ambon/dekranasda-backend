<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    public function cover(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

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
