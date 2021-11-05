<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait InteractsWithKeyword
{
    function scopeByKeyword(Builder $builder, $key, $keyword): Builder
    {
        return $this->when(
            Str::of($keyword)->trim()->isNotEmpty(),
            fn ($builder) => $builder->where($key, 'like', "%{$keyword}%")
        );
    }
}
