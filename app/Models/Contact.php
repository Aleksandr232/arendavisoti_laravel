<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [ 'hidden', 'phone', 'company', 'address', 'telegram', 'email',   'created_month'];
    protected $table = 'contact';

    protected $casts = [
        'hidden'=>'string',
        'phone' => 'string',
        'company' => 'string',
        'address' => 'string',
        'telegram'=>'string',
        'email'=>'string',
        'created_month'=> 'string'
    ];
}

/* 'hidden' => 'string', */
