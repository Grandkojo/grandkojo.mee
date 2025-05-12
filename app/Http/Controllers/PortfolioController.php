<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ResumeItem;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->get();
        $projects = Project::orderBy('order')->get();
        $resumeItems = ResumeItem::orderBy('order')->get();
        
        return view('portfolio', compact('skills', 'projects', 'resumeItems'));
    }
}
