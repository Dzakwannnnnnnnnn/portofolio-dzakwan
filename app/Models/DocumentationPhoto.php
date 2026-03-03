<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationPhoto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}