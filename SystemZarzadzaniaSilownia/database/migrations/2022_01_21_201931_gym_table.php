<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_silowni');
            $table->string('address');
            $table->unsignedBigInteger('phone');
            $table->string('email');
            $table->unsignedBigInteger('nip');
        });
        DB::statement("INSERT INTO `gym` (`id`, `nazwa_silowni`, `address`, `phone`, `email`, `nip`) VALUES (NULL, 'Siłownia Exercise', 'ul. Testowa 1 Poznań', '999888555', 'info@exrecise.pl', '1234567891');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym');
    }
}
