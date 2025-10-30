<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $featuredJobs = Job::where('featured', true)
      ->latest()
      ->with(['employer', 'tags'])
      ->take(6)
      ->get();

    $jobs = Job::where('featured', false)
      ->latest()
      ->with(['employer', 'tags'])
      ->get();

    return view('jobs.index', [
      'featuredJobs' => $featuredJobs,
      'jobs' => $jobs,
      'tags' => Tag::all(),
    ]);
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('jobs.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreJobRequest $request)
  {
    $attributes = $request->validate([
      'title' => ['required'],
      'salary' => ['required'],
      'location' => ['required'],
      'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
      'url' => ['required', 'active_url'],
      'image' => ['required', 'image'],
      'tags' => ['nullable'],
    ]);

    $imagePath = $request->file('image')->store('jobs', 'public');
    $attributes['image'] = $imagePath;

    $attributes['featured'] = $request->has('featured');
    $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

    if ($attributes['tags'] ?? false) {
      foreach (explode(',', $attributes['tags']) as $tagName) {
        $tag = Tag::firstOrCreate([
          'name' => trim($tagName),
        ]);
        $job->tags()->syncWithoutDetaching([$tag->id]);
      }
    }
    ToastMagic::success('🎉 Job added successfully!');
    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(Job $job)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Job $job)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateJobRequest $request, Job $job)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Job $job)
  {
    //
  }
}