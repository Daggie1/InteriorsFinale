<?php

namespace App\Http\Controllers\Seller;

use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $shop=Seller::find(auth()->id())->shop()->first();

        $products = $this->productRepository->findProductByShop($shop->id);

        $this->setPageTitle('Products', 'Products List');
        return view('seller.products.index', compact('products','shop'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $shop=Seller::find(auth()->id())->shop()->first();
        $this->setPageTitle('Products', 'Create Product');
        return view('seller.products.create', compact('categories', 'brands','shop'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');
        $shop=Seller::find(auth()->id())->shop()->first();
        $params['shop_id']=$shop->id;
        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('seller.products.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $shop=Seller::find(auth()->id())->shop()->first();
        $this->setPageTitle('Products', 'Edit Product');
        return view('seller.products.edit', compact('categories', 'brands', 'product','shop'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('seller.products.index', 'Product updated successfully' ,'success',false, false);
    }
}
