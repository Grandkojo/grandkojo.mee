<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|in:Frontend,Backend,Database,DevOps,Tools',
            'proficiency' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('skills', 'public');
            $validated['icon'] = $path;
        }

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.form', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|in:Frontend,Backend,Database,DevOps,Tools',
            'proficiency' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($skill->icon) {
                Storage::disk('public')->delete($skill->icon);
            }
            $path = $request->file('icon')->store('skills', 'public');
            $validated['icon'] = $path;
        }

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        // Delete icon file if exists
        if ($skill->icon) {
            Storage::disk('public')->delete($skill->icon);
        }
        
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
} 