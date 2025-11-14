<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'technologies' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Convert technologies string to array
        $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));

        if ($request->hasFile('featured_image')) {
            // Store image in project-imgs folder and save only the filename
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('project-imgs'), $filename);
            $validated['featured_image'] = $filename;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'technologies' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Convert technologies string to array
        $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($project->featured_image) {
                $oldImagePath = public_path('project-imgs/' . $project->featured_image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('project-imgs'), $filename);
            $validated['featured_image'] = $filename;
        }

        $project->update($validated);   

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete featured image if exists
        if ($project->featured_image) {
            $oldImagePath = public_path('project-imgs/' . $project->featured_image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            // Storage::disk('public')->delete($project->featured_image);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
} 