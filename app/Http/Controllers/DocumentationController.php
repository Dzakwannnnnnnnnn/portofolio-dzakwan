<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    // Halaman publik dokumentasi
    public function publicIndex()
    {
        $documentations = \App\Models\Documentation::with('photos')->latest()->get();
        return view('dokumentasi.index', compact('documentations'));
    }

    public function publicShow($id)
    {
        $documentation = \App\Models\Documentation::with('photos')->findOrFail($id);
        return view('dokumentasi.show', compact('documentation'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentations = \App\Models\Documentation::with('photos')->latest()->get();
        return view('admin.documentations.index', compact('documentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documentations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $documentation = \App\Models\Documentation::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('documentation_photos', 'public');
                $documentation->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('documentations.index')->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $documentation = \App\Models\Documentation::with('photos')->findOrFail($id);
        return view('admin.documentations.show', compact('documentation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $documentation = \App\Models\Documentation::with('photos')->findOrFail($id);
        return view('admin.documentations.edit', compact('documentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $documentation = \App\Models\Documentation::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $documentation->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('documentation_photos', 'public');
                $documentation->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('documentations.index')->with('success', 'Dokumentasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $documentation = \App\Models\Documentation::findOrFail($id);
        $documentation->delete();
        return redirect()->route('documentations.index')->with('success', 'Dokumentasi berhasil dihapus');
    }
}
