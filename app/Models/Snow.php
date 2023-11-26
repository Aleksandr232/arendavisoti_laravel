<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snow extends Model
{
    use HasFactory;

    protected $fillable = ['media', 'path'];

    protected $table = 'snow';
}
