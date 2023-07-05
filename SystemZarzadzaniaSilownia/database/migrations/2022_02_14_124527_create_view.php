<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW messagesvss AS SELECT messages.id, messages.kto, messages.wiadomosc, messages.data, messages.kto_id, users.image FROM messages INNER JOIN users on users.id = messages.kto_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW messagesvss");
    }
}
