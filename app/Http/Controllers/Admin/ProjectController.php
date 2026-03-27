<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ProjectController extends Controller
{
    /**
     * Columns that may not exist yet on deployments where migrations
     * have not been applied.
     */
    private const OPTIONAL_COLUMNS = [
        'github_url',
        'demo_url',
        'technologies',
        'project_role',
    ];

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
            'image' => 'nullable|image|max:10240',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:1000',
            'project_role' => 'nullable|string|max:255',
        ]);

        $data['link'] = $data['demo_url'] ?? null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Projects::create($this->filterDataByAvailableColumns($data));

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
            'image' => 'nullable|image|max:10240',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:1000',
            'project_role' => 'nullable|string|max:255',
        ]);

        $data['link'] = $data['demo_url'] ?? null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($this->filterDataByAvailableColumns($data));

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }

    private function filterDataByAvailableColumns(array $data): array
    {
        foreach (self::OPTIONAL_COLUMNS as $column) {
            if (! Schema::hasColumn('projects', $column)) {
                unset($data[$column]);
            }
        }

        return $data;
    }
}
