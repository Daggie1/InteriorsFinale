<?php

namespace App\Http\Controllers\Site;

use App\constants\Constants;
use App\Http\Controllers\Saf\MpesaController;
use App\Models\STKPushRequest;
use Cart;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public $order;

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $myOrder         = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order is not stored properly
        if ($myOrder) {
            $this->order=$myOrder;
          $mpesaController=  new MpesaController();
          $mpesa=$mpesaController->STKPushSimulation($this->order);

         $mpesaResponse=json_decode($mpesa,true);
            $mpesaResponse['order_id']=$this->order->id;
            $mpesaResponse['user_id']=$this->order->user_id;
              if ( $mpesaResponse['ResponseCode']==0){
                  $mpesaResponse['status']=Constants::STATUS_SUCCESS;
                  STKPushRequest::create( $mpesaResponse);
                  return $mpesaResponse;
                      //redirect()->route('payment.status');
              }
              else{
                  $mpesaResponse['status']=Constants::STATUS_FAILED;
                  STKPushRequest::create( $mpesaResponse);

                  return redirect()->back()->with('message','Order not placed');
              }


        }

        return redirect()->back()->with('message','Order not placed');
    }

    public function complete()
    {


        $orderr = Order::where('order_number', $this->order->order_number)->first();
        $orderr->status = 'processing';
        $orderr->payment_status = 1;
        $orderr->payment_method = 'Mpesa STK PUSH';
        $orderr->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
