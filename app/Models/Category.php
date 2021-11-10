<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\InteractsWithKeyword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory, InteractsWithKeyword;

    protected $guarded = ['id'];


    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::of($model->title)->slug()->substr(0, 20) . '-'.Str::random();
        });
    }


    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'categoriable');
    }
}
