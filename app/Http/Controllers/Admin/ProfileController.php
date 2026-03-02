<?php

namespace App\Http\Controllers\Admin;

use App\Models\PersonalProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = PersonalProfile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'nullable',
            'about' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'whatsapp' => 'nullable',
            'address' => 'nullable',
            'birth_place' => 'nullable',
            'birth_date' => 'nullable|date',
            'last_education' => 'nullable',
            'location' => 'nullable',
            'github' => 'nullable',
            'instagram' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profiles', 'public');
        }

        PersonalProfile::create($data);

        return redirect()->route('profile.index');
    }

    public function edit($id)
    {
        $profile = PersonalProfile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = PersonalProfile::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'role' => 'nullable',
            'about' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'whatsapp' => 'nullable',
            'address' => 'nullable',
            'birth_place' => 'nullable',
            'birth_date' => 'nullable|date',
            'last_education' => 'nullable',
            'location' => 'nullable',
            'github' => 'nullable',
            'instagram' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->route('profile.index');
    }

    public function destroy($id)
    {
        PersonalProfile::destroy($id);
        return back();
    }
}
