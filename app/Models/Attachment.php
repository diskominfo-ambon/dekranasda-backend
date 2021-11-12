<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function attachable()
    {
        return $this->morphTo();
    }

    public function delete()
    {
        if (Storage::disk('public')->exists($this->path)) {
            Storage::disk('public')
                ->delete($this->path);
        }

        return parent::delete();
    }
}
