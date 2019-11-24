<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }
    public function index(){
      $data=[
        'featured_categories'=>  Category::where('featured',1)->limit(3)->get(),
          'featured_products'=>  Product::where('featured',1)->with('reviews')->limit(4)->get(),
          'recently_added'=>  Product::paginate(15)

      ] ;
     // dd(Product::where('featured',1)->with('reviews')->limit(3)->get());
      return view('site.pages.homepage',$data);
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
