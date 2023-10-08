<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBase extends Model
{
    use HasFactory;

    protected $fillable = [ 'sign','act', 'dateact', 'counterparty', 'phone', 'duration', 'contractamount', 'calculation' , 'paidby', 'view', 'cost', 'flights', 'amount', 'stairsframes', 'passageframes', 'doubleconnections', 'singleconnections', 'alllevelrafters', 'bash', 'jack', 'equipment', 'alllevelpanels', 'area', 'contract', 'collateral'];
    protected $table = 'customer';
}
