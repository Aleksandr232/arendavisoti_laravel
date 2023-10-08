<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];
    protected $table = 'logiststatus';
}
