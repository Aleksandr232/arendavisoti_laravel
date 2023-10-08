<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'logined_at', 'username'];
    protected $addHttpCookie = true;

    protected $table = 'loginlog1';
}
