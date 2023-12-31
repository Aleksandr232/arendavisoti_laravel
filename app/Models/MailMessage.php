<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailMessage extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'path', 'name', 'emails', 'message'];

    protected $table = 'mail';

    
}
