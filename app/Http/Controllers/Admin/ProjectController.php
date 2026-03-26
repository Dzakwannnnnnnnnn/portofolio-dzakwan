<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:1000',
            'project_role' => 'nullable|string|max:255',
        ]);

        $data['link'] = $data['demo_url'] ?? null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Projects::create($data);

        return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Projects::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:1000',
            'project_role' => 'nullable|string|max:255',
        ]);

        $data['link'] = $data['demo_url'] ?? null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
