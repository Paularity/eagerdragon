<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionPostFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_post_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->string('payment_method')->nullable();
            
            $table->string('username')->nullable();
            $table->string('password')->nullable();

            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('us_state')->nullable();
            $table->string('country')->nullable();
            $table->string('zippostal_code')->nullable();
            $table->string('customer_ip')->nullable();
            
            $table->string('shipping_firstname')->nullable();
            $table->string('shipping_lastname')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address1')->nullable();
            $table->string('shipping_address2')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_us_state')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_zippostal_code')->nullable();

            $table->string('order_id')->nullable();
            $table->string('order_description')->nullable();
            $table->string('amount')->nullable();
            $table->string('tax')->nullable();

            $table->text('credit_card_number')->nullable();
            $table->string('credit_card_number_last_four')->nullable();
            $table->text('credit_card_expiration_year')->nullable();
            $table->text('credit_card_expiration_month')->nullable();
            $table->string('credit_card_type')->nullable();

            $table->string('post_url')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('merchant_website')->nullable();

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
        Schema::dropIfExists('transaction_post_fields');
    }
}
