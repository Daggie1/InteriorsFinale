<?php

use App\constants\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateC2BPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c2_b_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TransactionType');
            $table->string('transactionId');
            $table->integer('amount');
            $table->integer('businesscode');
            $table->string('billrefnumber');
            $table->float('organization_float');
            $table->string('ThirdPartyTransID')->nullable();
            $table->string('phone');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->enum('status',[Constants::STATUS_FAILED,Constants::STATUS_ACTIVE]);
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
        Schema::dropIfExists('c2_b_payments');
    }
}
