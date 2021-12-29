<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public $incrementing = false;
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'password',
        'occupation',
        'status'
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
    ];

    public function progressWork(){
        return $this->hasMany(ProgressWork::class, 'employee_id', 'employee_id');
    }

    public function indicatorWork(){
        return $this->hasMany(IndicatorWork::class, 'employee_id', 'employee_id');
    }

    public function headOfSubordinate()
    {
        return $this->belongsToMany(HeadOfSubordinate::class, 'head_of_subordinates', 'head', 'head', 'employee_id', 'employee_id');
    }
}
