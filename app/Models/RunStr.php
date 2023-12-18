<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunStr extends Model
{
    use HasFactory;

    protected $fillable = ['is_active', 'is_hcaptcha'];

    protected $table = 'run_string';
}
