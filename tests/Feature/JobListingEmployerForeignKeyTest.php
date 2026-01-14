<?php

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('rejects job listings with a missing employer', function () {
    Job::query()->create([
        'employer_id' => 999999,
        'title' => 'Software Engineer',
        'salary' => '$50,000 USD',
    ]);
})->throws(QueryException::class);

it('cascades job listings when the employer is deleted', function () {
    $employer = Employer::query()->create([
        'name' => 'Acme, Inc.',
    ]);

    $job = Job::query()->create([
        'employer_id' => $employer->id,
        'title' => 'Software Engineer',
        'salary' => '$50,000 USD',
    ]);

    $employer->delete();

    $this->assertDatabaseMissing('job_listings', [
        'id' => $job->id,
    ]);
});
