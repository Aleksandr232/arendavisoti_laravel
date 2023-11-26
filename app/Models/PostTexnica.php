<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostTexnica extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'media', 'text_img'];
    protected $table = 'texnica';


}
