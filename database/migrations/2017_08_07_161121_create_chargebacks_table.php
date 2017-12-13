<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargebacksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chargebacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned();
            $table->integer('processor_id')->unsigned();
            $table->string('reason_code')->nullable();
            $table->string('auth_code')->nullable();
            $table->string('reference_number')->nullable();

            $table->string('date')->nullable();
            $table->text('comment')->nullable();
            $table->string('update_date')->nullable();
            $table->string('charged_date')->nullable();
            $table->string('amount')->nullable();

            $table->string('sale_date')->nullable();
            $table->string('sale_value')->nullable();
            $table->integer('sale_transaction_id')->unsigned()->nullable();
            $table->boolean('is_for_moto')->default(false);

            $table->string('deadline')->nullable();
            $table->string('response_date')->nullable();
            $table->string('response_text')->nullable();

            $table->string('credit_card_type')->nullable();
            $table->string('credit_card_number')->nullable();

            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('status')->default(1);
            $table->string('dispute_result')->nullable();
            $table->boolean('new')->default(1);
            $table->timestamps();

            $table->foreign('merchant_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->index([
                'id', 'merchant_id', 'status',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('chargebacks');
    }
}
