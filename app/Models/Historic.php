<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Historic extends Model
{
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];

    public function type($tipo = null)
    {
        $tipos =[
            'I' => 'Recarga',
            'O' => 'Saque',
            'T' => 'Transferência',
        ];

        if(!$tipo){
            return $tipos;
        }

        if($this->user_id_transaction != null && $tipo == 'I'){
            return 'Valor Recebido';
        }
        return $tipos[$tipo];
    } 

    public function user()
    {
        return $this->belongsTo(User::class);//Fazendo a referencia d eum para um
    }

    public function usuarioRemetente()
    {//Esse metodo esta puxando o id do usuario que transferiu, poi sem esse id sera retornado o id do usuario logado
        return $this->belongsTo(User::class, 'user_id_transaction');
    }

    public function getDateAttribute($value)
    {//Metodo precisa ter exatamente este nome
        return Carbon::parse($value)->format('d/m/Y');
    }
}
