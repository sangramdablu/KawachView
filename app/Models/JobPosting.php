<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Read-side mirror of KawachAdmin's JobPosting model — same shared
 * `job_postings` table, managed from the admin panel's Jobs module.
 */
class JobPosting extends Model
{
    /**
     * Countries a job can be targeted at — ISO 3166-1 alpha-2 (lowercase),
     * matching flag-icons classes and the areaServed list already used in
     * this site's Organization schema. Must stay in sync with
     * KawachAdmin's App\Models\JobPosting::COUNTRIES.
     */
    public const COUNTRIES = [
        'in' => 'India',
        'us' => 'United States',
        'gb' => 'United Kingdom',
        'de' => 'Germany',
        'fr' => 'France',
        'nl' => 'Netherlands',
        'es' => 'Spain',
        'it' => 'Italy',
        'au' => 'Australia',
    ];

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'countries',
        'type',
        'experience_level',
        'openings',
        'salary_range',
        'application_deadline',
        'summary',
        'responsibilities',
        'requirements',
        'nice_to_have',
        'status',
        'sort_order',
        'created_by',
    ];

    protected $casts = [
        'responsibilities'      => 'array',
        'requirements'          => 'array',
        'nice_to_have'          => 'array',
        'countries'             => 'array',
        'application_deadline'  => 'date',
    ];
}
