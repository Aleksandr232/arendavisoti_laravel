<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDiscount extends Model
{
    use HasFactory;

    protected $fillable = ['discounts'];

    protected $table = 'post_discounts';
}
