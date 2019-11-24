<?php

use App\constants\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MerchantRequestId')->nullable();
            $table->string('CheckoutRequestID');
            $table->string('ResponseCode');
            $table->text('ResponseDescription');
            $table->text('CustomerMessage');
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
        Schema::dropIfExists('mpesa_requests');
    }
}
