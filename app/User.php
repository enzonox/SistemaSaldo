<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Balance;
use App\Models\Historic;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance()
    {
        return $this->hasOne(Balance::class);//hasOne faz relacionamento de um para um com a tabela de usuarios
    }

    public function historics(){
        return $this->hasMany(Historic::class);//hasMany faz o relacionamento de um para muitos com a tabela de saldo 
    }

    public function getRemetente($remetente)
    {//Query que vai buscar usuario para confirmar transferencia
        return $this->where('name', 'LIKE', "%$remetente%")
                    ->orWhere('email', $remetente)
                    ->get()
                    ->first();
    }
}
