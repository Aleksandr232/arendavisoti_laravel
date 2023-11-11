<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTg extends Model
{
    use HasFactory;

    protected $table = 'telegraph_chats';

    protected $fillable = [
        'chat_id',
    ];


}
