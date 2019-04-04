<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // private $table = 'balance'; // Deveria ser informado caso a migration tivesse a tabela com outro nome
    public $timestamps = false;

    public function recarga($value)
    {//Aqui colocaremos a logica de incrementacao
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
            return[
                'success' => true,

                'message' => 'Sucesso ao recarregar'
            ];
        }
        return [
            'success' => false,
                'message' => 'Falha ao carregar'
        ];
    }
}
