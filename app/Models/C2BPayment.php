<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class C2BPayment extends Model
{
    protected $fillable = [
        'TransactionType',
        'transactionId',
        'amount',
        'businesscode',
        'billrefnumber',
        'organization_float',
        'organization_float',
        'ThirdPartyTransID',
        'phone',
        'firstname',
        'middlename',
        'lastname',
        'status',
        'order_id',
        'user_id',
    ];
}
