<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    // private $table = 'balance'; // Deveria ser informado caso a migration tivesse a tabela com outro nome
    public $timestamps = false;

    public function recarga($value)
    {//Aqui colocaremos a logica de incrementacao

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposito = $this->save();//Comando para salvar no banco

        //registrando o historico para o usuario
        $historico = auth()->user()->historics()->create([
            'type' => 'I',
             'amount' => $value, // valor do saldo atual
             'total_before' =>$totalBefore,// valor do saldo antes da recarga
             'total_after' => $this->amount, //total apos recarga
             'date' => date('ymd'),
        ]);

        if($deposito && $historico){

            DB::commit();
            return[
                'success' => true,

                'message' => 'Sucesso ao Recarregar'
            ];
        }else{
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao Carregar'
            ];
        }
    }

    public function sacar($value)
    {//Aqui colocaremos a logica de retirada de saldo

       //verificar se o saldo do usuario e superior ao valor do saque
       if($this->amount < $value){
            return [
                'success' => false,
                'message' => 'saldo Insuficiente'
            ];
       }else{
            DB::beginTransaction();

            $totalBefore = $this->amount ? $this->amount : 0;
            $this->amount -= number_format($value, 2, '.', '');
            $saque = $this->save();//Comando para salvar no banco

            //registrando o historico para o usuario
            $historico = auth()->user()->historics()->create([
                'type' => 'O',
                'amount' => $value, // valor do saldo atual
                'total_before' =>$totalBefore,// valor do saldo antes da recarga
                'total_after' => $this->amount, //total apos recarga
                'date' => date('ymd'),
            ]);

            if($saque && $historico){

                DB::commit();
                return[
                    'success' => true,

                    'message' => 'Sucesso no Sacar'
                ];
            }else{
                DB::rollback();
                return [
                    'success' => false,
                    'message' => 'Falha ao Realizar Saque'
                ];
            }
       }
    }
}
