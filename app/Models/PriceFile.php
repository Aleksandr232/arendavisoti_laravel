<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceFile extends Model
{
    use HasFactory;

    protected $fillable = ['filename','filepath'];

    protected $table = 'pricescaff';
}
