<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'id_number',
        'phone_number',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     *
     * Define the relationship between User and Employee models.
     *
     */
    public function file_resume(){
        return $this->hasOne(File::class, 'user_id');
    }

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function applications(){
        return $this->hasOne(Applicant::class, 'user_id');
    }

    /**
     *
     * Define the relationship between Job and Employer model.
     *
     */
    public function sched(){
        return $this->hasOne(Schedule::class, 'user_id');
    }
}
