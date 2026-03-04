<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('start_year', 'desc')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'activity_type' => 'required|in:Pendidikan,Kuliah,Kerja,Magang',
            'school' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900|max:2100',
            'end_year' => 'nullable|digits:4|integer|min:1900|max:2100|gte:start_year',
            'description' => 'nullable|string',
            'developed_skills' => 'nullable|string|max:500',
        ]);

        Education::create($data);

        return redirect()->route('educations.index');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);

        $data = $request->validate([
            'activity_type' => 'required|in:Pendidikan,Kuliah,Kerja,Magang',
            'school' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900|max:2100',
            'end_year' => 'nullable|digits:4|integer|min:1900|max:2100|gte:start_year',
            'description' => 'nullable|string',
            'developed_skills' => 'nullable|string|max:500',
        ]);

        $education->update($data);

        return redirect()->route('educations.index');
    }

    public function destroy($id)
    {
        Education::destroy($id);
        return back();
    }
}
