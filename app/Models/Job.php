<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_title',
        'job_description',
        'job_location',
        'job_type',
        'job_status',
        'job_salary',
        'job_vacancy',
        'job_end_date',
    ];

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function employer(){
        return $this->belongsTo(Employer::class, 'user_id');
    }

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function applicants(){
        return $this->hasMany(Applicant::class, 'job_id');
    }
}
