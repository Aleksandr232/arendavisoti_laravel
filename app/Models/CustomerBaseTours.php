<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBaseTours extends Model
{
    use HasFactory;

    protected $fillable = [ 'sign','act', 'dateact', 'counterparty', 'phone',  'adreess', 'duration', 'contractamount', 'calculation' , 'paidby', 'view', 'cost', 'flights', 'amount',
    'name_tours', 'footing1_5', 'footing2_4', 'area0_45', 'rama1_2', 'rigel2', 'link0_7', 'rama1_1', 'emphasis', 'footing0_7', 'area07_15', 'rama0_7', 'rigel1_5', 'rama0_7_1', 'pipe', 'rama1_4', 'link0_9', 'sum_equipment',
    'data_contract', 'deposit'
];
    protected $table = 'customer_tours';
}
