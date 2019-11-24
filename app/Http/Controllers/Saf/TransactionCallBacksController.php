<?php

namespace App\Http\Controllers\Saf;

use App\constants\Constants;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Site\CheckoutController;
use App\Models\Order;
use App\Models\STKPushLog;
use App\Models\STKPushPayment;
use App\Models\STKPushRequest;
use Cart;
use Illuminate\Http\Request;

/**
 * Class TransactionCallbacks
 * This class contains functions that will be used to obtain data from Mpesa callbacks

 */
class TransactionCallBacksController extends BaseController
{

    /**
     * Use this function to process the STK push request callback

     */
    public static function processSTKPushRequestCallback(Request  $request){

        $all=$request->all();
        $content=json_encode($all);

        STKPushLog::create(['content'=>$content]);

        $callbackJSONData=file_get_contents('php://input');


        $callbackData=json_decode($callbackJSONData,true);

        $resultCode=$callbackData['Body']['stkCallback']['ResultCode'];

        $resultDesc=$callbackData['Body']['stkCallback']['ResultDesc'];
        $merchantRequestID=$callbackData['Body']['stkCallback']['MerchantRequestID'];

        $checkoutRequestID=$callbackData['Body']['stkCallback']['CheckoutRequestID'];
        $mpesaRequest=STKPushRequest::where('CheckoutRequestID',$checkoutRequestID)->first();




        if($mpesaRequest){

            $orderId=$mpesaRequest->order_id;
            $userId=$mpesaRequest->user_id;
            if($resultCode==0){

                $amount=$callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];

                $mpesaReceiptNumber=$callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
                $transactionDate=$callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
                $phoneNumber=$callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];

                $result=[
                    "ResultDesc"=>$resultDesc,
                    "ResultCode"=>$resultCode,
                    "MerchantRequestId"=>$merchantRequestID,
                    "CheckoutId"=>$checkoutRequestID,
                    "amount"=>$amount,
                    "MpesaReceiptNumber"=>$mpesaReceiptNumber,
                    "transactionDate"=>$transactionDate,
                    "status"=>Constants::STATUS_SUCCESS,
                    "phone"=>$phoneNumber,
                    "user_id"=>$userId,
                    "order_id"=>$orderId
                ];
                STKPushPayment::create(
                    $result
                );
                $orderr = Order::find($orderId);
                $orderr->status = 'processing';
                $orderr->payment_status = 1;
                $orderr->payment_method = 'Mpesa STK PUSH';
                $orderr->save();

                Cart::clear();


            }else{
                $result=[
                    "ResultDesc"=>$resultDesc,
                    "ResultCode"=>$resultCode,
                    "MerchantRequestId"=>$merchantRequestID,
                    "CheckoutId"=>$checkoutRequestID,
                    "user_id"=>$userId,
                    "status"=>Constants::STATUS_FAILED,
                    "order_id"=>$orderId]  ;
                STKPushPayment::create(
                    $result
                );
                return redirect()->route('checkout.cart');
            }

        }

    }


}

