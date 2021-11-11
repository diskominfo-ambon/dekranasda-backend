<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait InteractsWithKeyword
{
    function scopeByKeyword(Builder $builder, $key, $keyword): Builder
    {
        if ( Str::of($keyword)->trim()->isNotEmpty() ) {
            $builder->where($key, 'like', "%{$keyword}%");
        }

        return $builder;
    }
}
