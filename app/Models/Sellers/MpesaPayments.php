<?php

namespace App\Models\Sellers;

use Illuminate\Database\Eloquent\Model;

class MpesaPayments extends Model
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
        'seller_id',

    ];
}
