<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->increments('id')->comment('自增长ID');
            $table->string('no')->unique()->comment('分期流水号');
            $table->unsignedInteger('user_id')->comment('用户 ID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('order_id')->comment('对应的商品订单 ID');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('total_amount')->comment('总本金');
            $table->unsignedInteger('count')->comment('还款期数');
            $table->float('fee_rate')->comment('手续费率');
            $table->float('fine_rate')->comment('逾期费率');
            $table->string('status')->comment('还款状态')->default(\App\Models\Installment::STATUS_PENDING);
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
        Schema::dropIfExists('installments');
    }
}
