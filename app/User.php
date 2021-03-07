<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class User extends Authenticatable
{
    use Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level_id', 'username', 'role'
    ];

    protected static $logAttributes = ['name', 'role', 'username'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Someone has been {$eventName} user";
    }


    protected static $logName = 'user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Level(){
        return $this->belongsTo(Level::class, 'level_id');
    }
}
