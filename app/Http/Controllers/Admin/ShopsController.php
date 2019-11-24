<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopsController extends BaseController
{
    public function index(){
        $this->setPageTitle('Shops','All shops');
        $shops= Shop::all();
        return view('admin.shop.index',compact('shops'));
    }}
