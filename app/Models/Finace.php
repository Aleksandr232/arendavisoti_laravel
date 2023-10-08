<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finace extends Model
{
    use HasFactory;

    protected $fillable = ['action', 'amount', 'comment', 'total_amount'];

    protected $table = 'finance';

}
