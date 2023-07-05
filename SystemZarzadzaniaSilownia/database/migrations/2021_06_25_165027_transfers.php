<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_karnetu');
            $table->bigInteger('cena');
            $table->string('klient');
            $table->string('klient_email');
            $table->string('klient_address');
            $table->string('klient_phone');
            $table->bigInteger('klient_id');
            $table->timestamp('data_zakupu');
            $table->string('order_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
