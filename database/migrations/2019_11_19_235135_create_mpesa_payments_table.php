<?php

use App\constants\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_payments', function (Blueprint $table) {
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
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');

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
        Schema::dropIfExists('mpesa_payments');
    }
}
