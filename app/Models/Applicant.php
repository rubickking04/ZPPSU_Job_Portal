<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employer_id',
        'user_id',
        'job_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function jobs(){
        return $this->belongsTo(Job::class, 'job_id');
    }

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
