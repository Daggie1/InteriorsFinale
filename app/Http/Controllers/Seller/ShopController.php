<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\BaseController;
use App\Models\Counties;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Shop;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use function Psy\sh;

class ShopController extends BaseController
{
    use UploadAble;
public function index(){
    $this->setPageTitle('My Shops','All Shops');
    $data=[
        'shop'=>Seller::find(auth()->id())->shop()->first(),
        'shops'=>Seller::find(auth()->id())->shop()->get(),
    ];
    return view('seller.shop.index',$data);
}
    public function showCreateShopPage(){
        $this->setPageTitle('New Shop','new shop');
        $data=[
            'counties'=>Counties::all()];
        return view('seller.shop.create',$data);
    }
    protected function create(Request $data)
    {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $collection = collect($data);

        $image = null;

        if ($collection->has('image') && ($data['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($data['image'], 'shops');
        }
        $shop= Shop::create([
            'seller_id'=>auth()->id(),
            'name' => $data['name'],
            'phone' => $data['phone'],
            'description' => $data['description'],
            'location' => $data['location'],
            'image'=>$image,
        ]);
        if($shop){

            return $this->responseRedirect('seller.shop','success',false);
        }

    }
    public function edit($id){
        $shopy=Shop::findOrFail($id);
        $shop=Seller::find(auth()->id())->shop()->first();
$data=[
    'shop'=>$shopy,
    'shopy'=>$shopy,
    'products' => Product::where ('shop_id',$shopy->id),
    'orders'=>Order::all(),
];

    $this->setPageTitle($shopy->name,$shopy->name." Details");
    return view('seller.shop.edit',$data);
    }
}
