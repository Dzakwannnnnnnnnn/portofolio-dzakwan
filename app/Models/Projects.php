<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'github_url',
        'demo_url',
        'technologies',
        'project_role',
    ];
}
