<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function depositoRecarregar(Request $request)
    {
        dd($request->all());
    }
}
