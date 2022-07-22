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


    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOK');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id'
    ];

    protected $appends = array('thumbnail');

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }

    public function getThumbnailAttribute()
    {
        $path = pathinfo($this->profile_pic);
        return $path['dirname'].'/'.$path['filename']."-thumb.jpg";
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
