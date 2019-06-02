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
            $table->string('nome');
			$table->string('logo')->default('default.png');
            $table->string('indirizzo1')->nullable();
            $table->string('indirizzo2')->nullable();
            $table->string('citta')->nullable();
            $table->string('cap')->nullable();
            $table->string('paese')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->boolean('active')->default(true);
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
