<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref')->nullable();
            $table->string('nome');
            $table->integer('quantitaximballo')->nullable();
            $table->integer('quantitaminima')->nullable();
            $table->integer('prezzo')->nullable();
            $table->string('descrizione')->nullable();
			$table->string('foto')->default('default.png');
			$table->boolean('active')->default(true);
            $table->bigInteger('supplier_id');
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
        Schema::dropIfExists('articles');
    }
}
