<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $fillable = [
        'name',
        'role',
        'about',
        'photo',
        'email',
        'phone',
        'whatsapp',
        'address',
        'birth_place',
        'birth_date',
        'last_education',
        'location',
        'experience_years',
        'total_projects',
        'total_certifications',
        'github',
        'instagram'
    ];
}
