<?php

namespace App\Http\Controllers;

use App\Models\PersonalProfile;
use App\Models\Projects;
use App\Models\Education;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $profile = PersonalProfile::latest()->first();
        $projects = Projects::latest()->get();
        $educations = Education::orderBy('start_year', 'desc')->get();

        return view('welcome', compact(
            'profile',
            'projects',
            'educations'
        ));
    }
}