<?php

use App\constants\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSTKPushPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_t_k_push_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount')->nullable();
            $table->string('CheckoutId')->nullable();
            $table->string('balance')->nullable();
            $table->string('transactionDate')->nullable();
            $table->integer('ResultCode');
            $table->text('ResultDesc');
            $table->string('MerchantRequestId')->nullable();
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
        Schema::dropIfExists('s_t_k_push_payments');
    }
}
