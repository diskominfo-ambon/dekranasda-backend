<?php

namespace App\Models\Concerns;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAttachment {

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
