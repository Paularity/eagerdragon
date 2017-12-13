<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            #Agent Info
            $table->string('business_name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('zippostal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('us_state')->nullable();
            $table->string('city')->nullable();
            $table->string('timezone')->nullable();            

            #Agent Support Contact Information
            $table->string('cs_firstname')->nullable();
            $table->string('cs_lastname')->nullable();
            $table->string('cs_phone')->nullable();
            $table->string('cs_email')->nullable();

            #Commission Payment Information
            $table->string('account_number')->nullable();
            $table->string('legal_name')->nullable();
            $table->string('swift_routing_number')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('business_type')->nullable();

            $table->integer('created_by')->unsigned();
            

            $table->timestamps();

            $table->index([
                'id', 'user_id', 'created_by',
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
        Schema::dropIfExists('agent_accounts');
    }
}
