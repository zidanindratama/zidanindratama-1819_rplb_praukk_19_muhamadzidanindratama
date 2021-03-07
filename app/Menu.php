<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class Menu extends Model
{
    use LogsActivity;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'status',
        'price',
        'gambar',
        'deskripsi',
    ];

    protected static $logAttributes = ['name', 'price', 'status'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return Auth::user()->name." "."has been {$eventName} menu";
    }


    protected static $logName = 'menu';
}
