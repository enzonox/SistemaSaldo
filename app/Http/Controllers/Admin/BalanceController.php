<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function index(){
        //dd( auth()->user()->balance()->get()); Para jogar no dd os dados que estao vindo da tabela, o get esta retornando o registro
        $balance = auth()->user()->balance;//
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.balance', compact('amount'));
    }

    public function deposito()
    {
        return view('admin.balance.deposito');
    }

    public function depositoRecarregar(Request $request, Balance $balance)
    {
        //$balance->recarga($request->value);
        //dd(auth()->user()->balance()->FirstOrCreate([]));
        $balance = auth()->user()->balance()->FirstOrCreate([]);
        dd($balance->recarga($request->value));

    }
}
