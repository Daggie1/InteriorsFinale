<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Seller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index(){
        $data=[
        'shops'=>Shop::all(),
            'sellers'=>Seller::all(),
            'users'=>User::all(),
            'orders'=>Order::all(),
            ];
        return view('admin.dashboard.index',$data);
    }
}
