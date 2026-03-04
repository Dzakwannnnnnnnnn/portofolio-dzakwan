<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('year', 'desc')->latest()->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|digits:4|integer|min:1900|max:2100',
            'achievement' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
        ]);

        Certification::create($data);

        return redirect()->route('certifications.index');
    }

    public function edit($id)
    {
        $certification = Certification::findOrFail($id);
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, $id)
    {
        $certification = Certification::findOrFail($id);

        $data = $request->validate([
            'year' => 'required|digits:4|integer|min:1900|max:2100',
            'achievement' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
        ]);

        $certification->update($data);

        return redirect()->route('certifications.index');
    }

    public function destroy($id)
    {
        Certification::destroy($id);
        return back();
    }
}
