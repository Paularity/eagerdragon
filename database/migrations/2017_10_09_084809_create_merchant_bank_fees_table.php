<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantBankFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_bank_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned();
            $table->integer('processor_id')->unsigned();
            $table->string('mid');
            $table->string('transaction_fee')->nullable();
            $table->string('authorization_fee')->nullable();
            $table->string('capture_fee')->nullable();
            $table->string('sale_fee')->nullable();
            $table->string('decline_fee')->nullable();
            $table->string('refund_fee')->nullable();
            $table->string('chargeback_1_fee')->nullable();
            $table->string('chargeback_2_fee')->nullable();
            $table->string('chargeback_threshold_fee')->nullable();
            $table->string('discount_rate_fee')->nullable();
            $table->string('avs_premium_fee')->nullable();
            $table->string('cvv_premium_fee')->nullable();
            $table->string('interogional_premium_fee')->nullable();
            $table->string('wire_fee')->nullable();
            $table->string('reserve_rate_fee')->nullable();
            $table->integer('reserve_period_months')->nullable();
            $table->string('initial_reserve')->nullable();
            $table->string('setup_fee')->nullable();
            $table->string('monthly_fee')->nullable();
            $table->timestamps();

            $table->index([
                'merchant_id', 'processor_id', 'mid',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_bank_fees');
    }
}
