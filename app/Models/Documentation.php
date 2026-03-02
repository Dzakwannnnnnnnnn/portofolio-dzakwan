<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $fillable = ['title', 'description'];

    public function photos()
    {
        return $this->hasMany(DocumentationPhoto::class);
    }
}
