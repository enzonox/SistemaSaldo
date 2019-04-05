<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

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

    public function depositoRecarregar(MoneyValidationFormRequest $request)
    {
        //$balance->recarga($request->value);
        //dd(auth()->user()->balance()->FirstOrCreate([]));
        $balance = auth()->user()->balance()->FirstOrCreate([]);
        $response =$balance->recarga($request->value);

        if($response['success']){
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);
        }else{
            return redirect()
                        ->back()
                        ->with('error', $response['message']);
        }

    }

    public function saque()
    {
        return view('admin.balance.saque');
    }
    
    public function retiradaSaque(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->FirstOrCreate([]);
        $response =$balance->sacar($request->value);

        if($response['success']){
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);
        }else{
            return redirect()
                        ->back()
                        ->with('error', $response['message']);
        }

    }

    public function transferencia()
    {
        return view('admin.balance.transferencia');
    }

    public function confirmarTransferencia(Request $request, User $user)
    {//Caso nao encontre o usuario retornara uma mensagem de erro
        if(!$remetente = $user->getRemetente($request->remetente)){
            return redirect()
                    ->back()
                    ->with('error','Usuario Nao Foi Encontrado!');
        }

        if($remetente->id === auth()->user()->id){
            return redirect()
                    ->back()
                    ->with('error','Nao pode Transferir o saldo para voce mesmo!');
        }
        
        return view('admin.balance.confirmar-transfer', compact('remetente'));
    }

    public function transferirSaldo(Request $request)
    {
        dd($request->all());
    }
}
