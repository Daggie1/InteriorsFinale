<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

use App\Models\Sellers\MpesaPayments;
use App\Models\STKPushPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionsController extends BaseController
{
    public function bookings(){
        $this->setPageTitle('Transaction','All bookings transaction');
        $transactions=STKPushPayment::all();

        return view('admin.transactions.bookings',compact('transactions'));
    }


    public function subscriptions(){
        $this->setPageTitle('Transactions','All business owners subscriptions');
        $transactions=MpesaPayments::all();
        return view('admin.transactions.subscriptions',compact('transactions'));
    }


    public function sellerBookings(){
        $this->setPageTitle('Transaction','All bookings transaction');
        $transactions=STKPushPayment::all();

        return view('admin.transactions.bookings',compact('transactions'));
    }


    public function sellerSubscriptions(){
        $this->setPageTitle('Transactions','All Transactions');
        $transactions=MpesaPayments::all();
        return view('seller.transactions.subscriptions',compact('transactions'));
    }
}
