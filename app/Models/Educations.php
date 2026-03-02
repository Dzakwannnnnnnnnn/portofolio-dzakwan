<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    protected $fillable = [
        'school',
        'major',
        'description',
        'start_year',
        'end_year'
    ];
}