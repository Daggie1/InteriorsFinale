<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
//    public function makeSelection(){
//$shop=Seller::find(auth()->id())->shop()->first();
//if($shop){
//    return redirect()->route('seller.dashboard.show');
//}
//else{
//    return redirect()->route('seller.shop.create');
//}
//    }
    public function index(){
        $shop=Seller::find(auth()->id())->shop()->first();
        $data=[
            'shop'=>Seller::find(auth()->id())->shop()->first(),
            'products'=>Product::where('shop_id',$shop->id),
            'transactions'=>0,
            //'users'=>User::all(),
            'orders'=>0,
        ];
        return view('seller.dashboard.index',$data);
    }
}
