<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantAccountProcessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_account_processor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_account_id')->unsigned();
            $table->foreign('merchant_account_id')
                ->references('id')
                ->on('merchant_accounts')
                ->onDelete('cascade');

            $table->integer('processor_id')->unsigned();
            $table->foreign('processor_id')
                ->references('id')
                ->on('processors')
                ->onDelete('cascade');

            $table->string('mid')->nullable();
            $table->string('routing')->nullable();
            $table->string('rebill_routing')->nullable();
            $table->string('start_date')->nullable();
            $table->string('currency')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('download_from_platform')->nullable();
            $table->string('validate_transaction_data')->nullable();
            $table->string('notes')->nullable();
            $table->string('descriptor')->nullable();
            $table->boolean('is_for_moto')->default(0);
            $table->string('payment_method')->nullable();
            $table->string('transaction_type')->nullable();
            $table->tinyInteger('acquire_type')->default(1);
            $table->text('api_url_production')->nullable();
            $table->text('api_url_testing')->nullable();
            $table->text('api_key')->nullable();
            $table->text('api_secret')->nullable();
            $table->text('api_token')->nullable();
            $table->string('api_hash')->nullable();
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
        Schema::dropIfExists('merchant_account_processor');
    }
}
