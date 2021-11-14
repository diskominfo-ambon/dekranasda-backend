<?php

namespace App\Models;

use Illuminate\Support\Str;
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
    use HasFactory, InteractsWithViews, HasAttachment, InteractsWithKeyword;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    protected $with = ['categories', 'user'];

    const PENDING = 'pending';

    const PUBLISHED = 'published';

    const REJECTED = 'rejected';


    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::of($model->title)->slug()->substr(0, 20) . '-'.Str::random();
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


    public function scopePublished(Builder $buidler): Builder
    {
        return $buidler->whereStatus(self::PUBLISHED);
    }

    public function scopePending(Builder $buidler): Builder
    {
        return $buidler->whereStatus(self::PENDING);
    }


    public function getIsPublishedAttribute(): bool
    {
        return $this?->status === self::PUBLISHED;
    }

    public function getIsRejectedAttribute(): bool
    {
        return $this?->status === self::REJECTED;
    }


    public function getIsDiscountAttribute(): bool
    {
        return $this?->discount > 0;
    }
}
