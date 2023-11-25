<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImgTours extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'path', 'height', 'media'];
    protected $table = 'tours';

    

}
