<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostScaff extends Model
{
    use HasFactory;

    protected $fillable = ['square', 'objects', 'media', 'appointment', 'path'];
    protected $table = 'scaff';


}
