<?php

namespace App\Http\Controllers\Saf\Sellers;


use App\constants\Constants;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Site\CheckoutController;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Sellers\MpesaPayments;
use App\Models\Sellers\MpesaRequests;
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
        $mpesaRequest=MpesaRequests::where('CheckoutRequestID',$checkoutRequestID)->first();




        if($mpesaRequest){

            $sellerId=$mpesaRequest->seller_id;

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
                    "seller_id"=>$sellerId,
                ];
                MpesaPayments::create(
                    $result
                );
                $seller = Seller::find($sellerId);
                $seller->subscription = Constants::SUBSCRIBED;
                $seller->save();




            }else{
                $result=[
                    "ResultDesc"=>$resultDesc,
                    "ResultCode"=>$resultCode,
                    "MerchantRequestId"=>$merchantRequestID,
                    "CheckoutId"=>$checkoutRequestID,
                    "status"=>Constants::STATUS_FAILED,
                    "seller_id"=>$sellerId]  ;
                STKPushPayment::create(
                    $result
                );

            }

        }

    }


}
