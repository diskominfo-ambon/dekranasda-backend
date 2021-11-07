<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Concerns\Publishable;
use App\Models\Concerns\HasAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Concerns\InteractsWithKeyword;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model implements Viewable
{
    use HasFactory, InteractsWithViews, HasAttachment, InteractsWithKeyword,
    Publishable;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    protected $with = ['categories'];


    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::of($model->title)->slug()->substr(0, 20) . '-'.Str::random();
            $model->user_id = 3;
        });
    }


    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrentMonth(Builder $buidler): Builder
    {

        return $this->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);
    }


    public function getIsDiscountAttribute(): bool
    {
        return $this?->discount > 0;
    }
}
