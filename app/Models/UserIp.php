<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sessions;

class UserIp extends Model
{
    use HasFactory;

    protected $table = 'user_ip';

    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'countryName',
        'regionName',
        'cityName'
    ];

    public function sessions()
    {
        return $this->belongsTo(Sessions::class, 'user_id');
    }
}
