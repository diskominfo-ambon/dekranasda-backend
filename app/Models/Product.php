<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Concerns\HasAttachment;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Concerns\InteractsWithKeyword;
use App\Models\Concerns\Publishable;

class Product extends Model implements Viewable
{
    use HasFactory, InteractsWithViews, HasAttachment, InteractsWithKeyword,
    Publishable;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

    protected $with = ['categories'];


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
}
