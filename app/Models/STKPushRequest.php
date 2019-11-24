<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STKPushRequest extends Model
{
    protected $fillable = [


        'MerchantRequestId',
        'CheckoutRequestID',
        'ResponseCode',
        'ResponseDescription',
        'CustomerMessage',
        'status',
        'user_id',
        'order_id'
    ];
}
