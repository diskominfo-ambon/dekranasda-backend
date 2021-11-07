<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Publishable
{

    public function scopePublished(): Builder
    {
        return $this->whereNotNull('published');
    }

    public function scopeUnpublished(): Builder
    {
        return $this->whereNull('published');
    }


    public function getIsPublishedAttribute(): bool
    {
        return !is_null($this?->published);
    }
}
