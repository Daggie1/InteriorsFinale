<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellersController extends BaseController
{
    public function index(){
        $this->setPageTitle('Sellers','All sellers');
        $sellers= Seller::all();
        return view('admin.sellers.index',compact('sellers'));
    }
}
