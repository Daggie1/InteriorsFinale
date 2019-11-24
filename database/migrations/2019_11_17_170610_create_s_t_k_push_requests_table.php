<?php

use App\constants\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSTKPushRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_t_k_push_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MerchantRequestId');
            $table->string('CheckoutRequestID');
            $table->string('ResponseCode');
            $table->text('ResponseDescription');
            $table->text('CustomerMessage');
            $table->enum('status',[Constants::STATUS_FAILED,Constants::STATUS_SUCCESS]);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_t_k_push_requests');
    }
}
