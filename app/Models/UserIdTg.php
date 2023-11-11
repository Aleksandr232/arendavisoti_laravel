<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserTg;

class UserIdTg extends Model
{
    use HasFactory;

    protected $table = 'user_tg';

    protected $fillable = [
        'user_id_tg',
    ];

   


}
