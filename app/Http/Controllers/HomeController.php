<?php

namespace App\Http\Controllers;

use App\Mail\HireMeMail;
use App\Models\PersonalProfile;
use App\Models\Project;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $profile = PersonalProfile::latest()->first();
        $projects = Project::latest()->get();
        $educations = Education::orderBy('start_year', 'desc')->get();

        return view('welcome', compact(
            'profile',
            'projects',
            'educations'
        ));
    }

    public function sendContactEmail(Request $request)
    {
        $details = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('muhammaddzakwan035@gmail.com')->send(new HireMeMail($details));

        return back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}