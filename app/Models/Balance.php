<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // private $table = 'balance'; // Deveria ser informado caso a migration tivesse a tabela com outro nome
    public $timestamps = false;

    public function recarga($value)
    {//Aqui colocaremos a logica de incrementacao
        $this->amount += number_format($value, 2, '.', '');
        $deposito = $this->save();//Comando para salvar no banco

        if($deposito){
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
