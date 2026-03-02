<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationPhoto extends Model
{
    protected $fillable = ['documentation_id', 'photo_path'];

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}
