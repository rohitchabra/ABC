<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    
    //dd($jobs);
    return view('home');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    return view('job', ['job' => $job]);
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with('employer')->get()  
    ]);
});

// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::find((int) $id);
//     return view('job', ['job' => $job]);
// });

Route::get('/contact', function () {
    return view('contact');
});