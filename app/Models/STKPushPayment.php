<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STKPushPayment extends Model
{
    protected $fillable = [
        'MpesaReceiptNumber',
        'phone',
        'amount',
        'ResultCode',
        'ResultDesc',
        'CheckoutId',
        'MerchantRequestId',
        'transactionDate',
        'balance',
        'status',
        'order_id',
        'user_id',
    ];
}
