<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ResumeItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Mail\ContactConfirmation;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->get();
        $projects = Project::orderBy('order')->get();
        $resumeItems = ResumeItem::orderBy('order')->get();
        
        return view('portfolio', compact('skills', 'projects', 'resumeItems'));
    }

    public function sendEmail(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

            $toAddress = env('MAIL_TO_ADDRESS');
            Mail::to($toAddress)->send(new ContactForm($request->all()));

            Mail::to($request->email)->send(new ContactConfirmation($request->all()));
            

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Email sent successfully'
                ]);
            }

            return redirect()->back()->with('success', 'Email sent successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please check your input and try again.',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send email. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to send email. Please try again.');
        }
    }
}
