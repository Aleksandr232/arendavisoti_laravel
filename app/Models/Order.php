<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [ 'name', 'phone', 'order'];
    protected $table = 'order';

    protected $casts = [
        'order'=>'string',
        'name' => 'string',
        'phone' => 'string',

    ];
}
