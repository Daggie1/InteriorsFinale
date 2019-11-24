<?php

namespace App\Http\Controllers\Seller;


use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Models\Seller;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $shop=Seller::find(auth()->id())->shop()->first();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('seller.orders.index', compact('orders','shop'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);
        $shop=Seller::find(auth()->id())->shop()->first();
        $this->setPageTitle('Order Details', $orderNumber);
        return view('seller.orders.show', compact('order','shop'));
    }
}
