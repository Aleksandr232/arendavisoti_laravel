<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceScaff extends Model
{
    use HasFactory;

    protected $fillable = [ 'img','path'];

    protected $table = 'pricescaff';
}
