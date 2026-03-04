<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{
    public function index()
    {
        $capabilities = Capability::latest()->get();
        return view('admin.capabilities.index', compact('capabilities'));
    }

    public function create()
    {
        return view('admin.capabilities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'languages' => 'nullable|string|max:1000',
        ]);

        Capability::create($data);

        return redirect()->route('capabilities.index');
    }

    public function edit($id)
    {
        $capability = Capability::findOrFail($id);
        return view('admin.capabilities.edit', compact('capability'));
    }

    public function update(Request $request, $id)
    {
        $capability = Capability::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'languages' => 'nullable|string|max:1000',
        ]);

        $capability->update($data);

        return redirect()->route('capabilities.index');
    }

    public function destroy($id)
    {
        Capability::destroy($id);
        return back();
    }
}
