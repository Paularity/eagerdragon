<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentCsr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_csr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_account_id')->unsigned();
            $table->foreign('agent_account_id')
                ->references('id')
                ->on('agent_accounts')
                ->onDelete('cascade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->text('address');
            $table->string('mobile');
            $table->timestamps();

            $table->index([
                'id', 'agent_account_id', 'email',
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
        Schema::dropIfExists('agent_csr');
    }
}
