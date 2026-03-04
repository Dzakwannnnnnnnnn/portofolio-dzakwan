<?php

namespace App\Http\Controllers;

use App\Mail\HireMeMail;
use App\Models\Capability;
use App\Models\Certification;
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
        $capabilities = Capability::latest()->get();
        $certifications = Certification::orderBy('year', 'desc')->latest()->get();

        return view('welcome', compact(
            'profile',
            'projects',
            'educations',
            'capabilities',
            'certifications'
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
