<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteiras', function (Blueprint $table) {
            $table->id();
            $table->string('operacao');
            $table->integer('quantidade');
            $table->decimal('valor', 10, 2);
            $table->decimal('total', 10, 2)->default(0.00);
            $table->string('data');
            $table->unsignedBigInteger('ativo_id');
            $table->foreign('ativo_id')->references('id')->on('ativos');
            $table->softDeletes();
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
        Schema::dropIfExists('carteiras');
    }
}
