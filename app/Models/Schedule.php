<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'employer_id',
        'date_time',
    ];

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
