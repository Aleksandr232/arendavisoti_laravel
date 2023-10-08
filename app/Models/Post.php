<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'img'];

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('img')) {
            if ($image) Storage::delete($image);

            $folder = date('Y-m-d');

            return $request->file('img')->store("images/{$folder}");
        }

        return null;
    }
}
