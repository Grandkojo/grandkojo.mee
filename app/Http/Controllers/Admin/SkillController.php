<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SkillController extends Controller
{
    public function index()
    {
        // Cache admin skills list per page for 30 minutes
        $page = request()->get('page', 1);
        $skills = Cache::remember("admin.skills.page.{$page}", 1800, function () {
            return Skill::orderBy('order')->paginate(10);
        });
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

        // Invalidate caches
        Cache::forget('portfolio.skills');
        // Clear all admin skill pages (pagination)
        $this->clearAdminSkillsCache();

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
            'order' => 'nullable|integer|min:0',
        ]);

        $skill->update($validated);

        // Invalidate caches
        Cache::forget('portfolio.skills');
        // Clear all admin skill pages (pagination)
        $this->clearAdminSkillsCache();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        
        $skill->delete();

        // Invalidate caches
        Cache::forget('portfolio.skills');
        // Clear all admin skill pages (pagination)
        $this->clearAdminSkillsCache();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }

    /**
     * Clear all admin skills cache pages
     */
    private function clearAdminSkillsCache()
    {
        // Clear first 10 pages (should be enough for most cases)
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget("admin.skills.page.{$i}");
        }
    }
} 