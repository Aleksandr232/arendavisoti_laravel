<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Facades\Location;
use App\Models\User;

class Sessions extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $fillable = [
        'id',
        'user_id',
        'city',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($session) {
            $ip = request()->ip();
            $location = Location::get($ip);

            if ($location) {
                $session->city = $location->cityName;
            }
        });
    }
}
