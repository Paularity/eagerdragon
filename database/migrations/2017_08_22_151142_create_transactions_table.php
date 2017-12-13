<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->integer('processor_id')->unsigned();
            $table->string('environment')->nullable();
            $table->text('processor_response')->nullable();
            $table->string('reference_id')->nullable();
            

            //Refund
            $table->string('original_transaction_id')->nullable();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('us_state')->nullable();
            $table->string('zippostal_code')->nullable();
            $table->string('country')->nullable();

            $table->text('credit_card_number');
            $table->string('credit_card_number_last_four');
            $table->text('credit_card_expiration_year');
            $table->text('credit_card_expiration_month');
            $table->string('credit_card_type');
            $table->text('credit_card_key');

            $table->string('payment_method');
            $table->string('transaction_type')->nullable();
            $table->tinyInteger('acquire_type')->default(1);
            $table->string('routing')->nullable();
            $table->string('rebill_routing')->nullable();
            $table->boolean('is_for_moto')->default(false);

            //Capture Only
            $table->string('authorization_code')->nullable();

            $table->text('api_url_production')->nullable();
            $table->text('api_url_testing')->nullable();
            $table->text('api_key')->nullable();
            $table->text('api_secret')->nullable();
            $table->text('api_token')->nullable();

            $table->string('amount');
            $table->string('tax');
            $table->string('currency')->nullable();

            $table->string('order_id')->nullable();
            $table->text('order_description')->nullable();

            $table->string('shipping_firstname')->nullable();
            $table->string('shipping_lastname')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address1')->nullable();
            $table->string('shipping_address2')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_us_state')->nullable();
            $table->string('shipping_zippostal_code')->nullable();
            $table->string('shipping_country')->nullable();

            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
