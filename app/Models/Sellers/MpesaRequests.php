<?php

namespace App\Models\Sellers;

use Illuminate\Database\Eloquent\Model;

class MpesaRequests extends Model
{
    protected $fillable = [


        'MerchantRequestId',
        'CheckoutRequestID',
        'ResponseCode',
        'ResponseDescription',
        'CustomerMessage',
        'status',
        'seller_id',

    ];
}
