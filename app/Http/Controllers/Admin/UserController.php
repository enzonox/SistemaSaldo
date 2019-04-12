<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePerfilFormRequest;

class UserController extends Controller
{
    
    public function perfil()
    {
        return view('site.perfil.perfil');
    }

    public function perfilUpdate(UpdatePerfilFormRequest $request)
    {
        $usuario = auth()->user();
        $data = $request->all();

        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);//criptografando a nova senha

        }else{
            unset($data['password']);
        }
    //inserindo a imagem    
        $data['image'] = $usuario->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if($usuario->image){
                $name = $usuario->image;
            }else{
                $name = $usuario->id.kebab_case($usuario->name);//Criando o nome da imagem para assim evitar conflitos de nomenclatura iguais
            }

            $extensao = $request->image->extension();//extensao da imagem
            $nomeArquivo ="{$name}.{$extensao}";//Concatenando nome da imagem com a extensao 
            $data['image'] = $nomeArquivo;//atualizar o nome da imagem

            //Agora sera definido aonde que a imagem vai ficar
            $upload = $request->image->storeAs('usuarios', $nomeArquivo);

            if(!$upload){
                return redirect()
                            ->back()
                            -with('error','Falha ao fazer o upload da Imagem');
            }
        }


    //atualizando os campos
       $update = $usuario->update($data);

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
