<?php

namespace App\Http\Controllers;

use App\Models\PersonalProfile;
use App\Models\Projects;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = PersonalProfile::latest()->first();
        $projects = Projects::latest()->get();

        return view('welcome', compact('profile', 'projects'));
    }
}