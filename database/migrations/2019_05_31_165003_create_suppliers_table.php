<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('giuridica');
            $table->string('nome');
            $table->string('cognome');
            $table->string('indirizzo1');
            $table->string('indirizzo2');
            $table->string('citta');
            $table->string('cap');
            $table->string('paese');
            $table->string('tel');
            $table->string('email');
            $table->smallInteger('active');
            $table->unsignedBigInteger('agent_id');
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
        Schema::dropIfExists('suppliers');
    }
}
