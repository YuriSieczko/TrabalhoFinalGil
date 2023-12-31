<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_corporativos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->unsignedBigInteger('ativo_id');
            $table->foreign('ativo_id')->references('id')->on('ativos');
            $table->decimal('valor', 10, 2);
            $table->date('data_recebida');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('eventos_corporativos');
    }
}
