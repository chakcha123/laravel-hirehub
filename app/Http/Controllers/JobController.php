<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{



    public function index()
    {
        $jobs = Job::paginate(6);
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required',
            'timing' => 'required|in:full-time,part-time,flexible',
            'description' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'company_name' => 'required',
            'company_location' => 'nullable',
            'company_website' => 'nullable',
        ]);

        Job::create($validatedData);
        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required',
            'timing' => 'required|in:full-time,part-time,flexible',
            'description' => 'required',
        ]);

        $job->update($validatedData);

        return redirect()->route('dashboard');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('dashboard');
    }



    public function jobDetail($id){

        $jobDetail = Job::findOrFail($id);

        if (is_null($jobDetail)){
            abort(404);
        }
        return view('jobs.details',compact('jobDetail'));
    }



    public function saveJob($id)
    {
        $job = Job::findOrFail($id);

        if ($job === null){
            return redirect()->back()->with('error', 'Job not found.');
        }

        $jobSave = SavedJob::where(['user_id'=>Auth::user()->id, 'job_id' => $id])->count();
        if ($jobSave > 0){

            return redirect()->back()->with('error', 'Job already saved.');
        }

        $jobSeved = new SavedJob();
        $jobSeved->user_id = Auth::user()->id;
        $jobSeved->job_id = $id;
        $jobSeved->save();

        return redirect()->back()->with('success', 'Job has been successfully saved.');

    }

    public function savedJobs()
    {
        $savedjobs = SavedJob::where('user_id', Auth::user()->id)->paginate(5);

        return view('jobs.savedjobs',compact('savedjobs'));

    }

    public function removeSavedJob($id)
    {
        // $id = $request->id;

        $savedJob = SavedJob::where([
            'id'=> $id,
            'user_id'=>Auth::user()->id
        ])->first();

        if ($savedJob === null){
            return redirect()->back()->with('error', 'Job not found.');
        }

        SavedJob::find($id)->delete();
        return redirect()->back()->with('success', 'Job removed successfully.');

    }
}
