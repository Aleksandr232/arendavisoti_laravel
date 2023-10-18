<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBase extends Model
{
    use HasFactory;

    protected $fillable = [ 'sign','act', 'added_by', 'added_status', 'dateact', 'counterparty', 'adreess', 'phone', 'duration', 'contractamount', 'calculation' , 'paidby', 'view', 'cost', 'flights', 'amount', 'stairsframes', 'passageframes', 'doubleconnections', 'singleconnections', 'alllevelrafters', 'bash', 'jack', 'equipment', 'alllevelpanels', 'area', 'contract', 'collateral', 'uraddress','mailaddress','email','orgn','inn','kpp','rs','ks','bank','bik'];
    protected $table = 'customer';
}



