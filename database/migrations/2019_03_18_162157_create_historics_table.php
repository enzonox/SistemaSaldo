<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//id do usuario que fez uma transacao
            $table->enum('type', ['I', 'O', 'T']);// tipo da transacao I = Input/Entrada O = Output/Saida T = Transaction/Transferencia
            $table->double('amount', 10, 2);//Total movimentado
            $table->double('total_before', 10, 2);//Total que tinha antes de fazer a transacao
            $table->double('total_after', 10, 2);//Total apos a transacao
            $table->integer('user_id_transaction')->nullable();//Armazenando id da transacao
            $table->date('date');//data da transacao
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
        Schema::dropIfExists('historics');
    }
}
