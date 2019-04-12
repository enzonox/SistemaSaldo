<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function perfil()
    {
        return view('site.perfil.perfil');
    }

    public function perfilUpdate(Request $request)
    {
        $data = $request->all();

        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);//criptografando a nova senha

        }else{
            unset($data['password']);
        }
        //atualizando os campos
       $update = auth()->user()->update($data);

       if($update){
            return redirect()
                    ->route('perfil')
                    ->with('success', 'Sucesso ao Atualizar Perfil');
        }else{
            return redirect()
                    ->route('perfil')
                    ->with('error', 'Falha ao Atualizar Perfil...');
        }
    }
}
