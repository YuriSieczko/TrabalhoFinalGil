<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operacoes', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('ativo_id');
            $table->foreign('ativo_id')->references('id')->on('ativos');
            $table->integer('quantidade');
            $table->decimal('valorUnitario', 10, 2);
            $table->decimal('taxas', 10, 2);
            $table->string('tipoDeOperacao');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operacoes');
    }
};
