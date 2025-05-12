<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResumeItem;
use Illuminate\Http\Request;

class ResumeItemController extends Controller
{
    public function index()
    {
        $resumeItems = ResumeItem::orderBy('order')->get();
        return view('admin.resume.index', compact('resumeItems'));
    }

    public function create()
    {
        return view('admin.resume.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:education,experience,certification',
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        ResumeItem::create($validated);

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume item created successfully.');
    }

    public function edit(ResumeItem $resumeItem)
    {
        return view('admin.resume.form', compact('resumeItem'));
    }

    public function update(Request $request, ResumeItem $resumeItem)
    {
        $validated = $request->validate([
            'type' => 'required|in:education,experience,certification',
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        $resumeItem->update($validated);

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume item updated successfully.');
    }

    public function destroy(ResumeItem $resumeItem)
    {
        $resumeItem->delete();

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume item deleted successfully.');
    }
} 