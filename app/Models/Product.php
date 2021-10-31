<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

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
}
