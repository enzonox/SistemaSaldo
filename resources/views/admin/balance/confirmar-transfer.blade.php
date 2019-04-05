@extends('adminlte::page')

@section('title', 'Confirmar Transferencia')<!--O titulo da janela no browser-->

@section('content_header')<!--O titulo da pagina-->
    <h1>Confirmar Transferencia</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
        <li><a href="">Transferir</a></li>
        <li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')<!--Conteudo da pagina-->
<div class="box">
        <div class="box-header">
            <h3>Confirmar Transferencia de Saldo</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <p><strong>Seu Saldo Atual: </strong>{{number_format($saldo->amount, 2, ',', '.')}}</p>
            <p><strong>Recebedor: </strong>{{$remetente->name}}</p>

            <form method="POST" action="{{ route('transferencia.confirmada')}}">
                    {!!csrf_field()!!}
            <!--Passando o id do usuario de forma oculta-->
            <input type="hidden" name="remetente_id" value="{{$remetente->id}}">

                    <div class="form-group">
                        <input type="text" class="form-control" name="value" placeholder="Valor:">
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success" type>Proxima Etapa</button>
                    </div>
            </form>
        </div>
    </div>
@stop