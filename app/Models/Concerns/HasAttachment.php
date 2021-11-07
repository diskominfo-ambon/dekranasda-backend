<?php

namespace App\Models\Concerns;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasAttachment {

    public function attachments(): MorphToMany
    {
        return $this->morphToMany(
            Attachment::class,
            'record',
            'model_has_attachments',
            'record_id',
            'attachment_id'
        );
    }
}
