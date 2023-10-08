<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistica extends Model
{
    use HasFactory;

    protected $table = 'logist';

    protected $fillable = ['coordinates', 'status', 'username'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $casts = [
        'coordinates' => 'array'
    ];
}
