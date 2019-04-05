@extends('adminlte::page')

@section('title', 'Transferencia')<!--O titulo da janela no browser-->

@section('content_header')<!--O titulo da pagina-->
    <h1>Transferir</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
        <li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')<!--Conteudo da pagina-->
<div class="box">
        <div class="box-header">
            <h3>Transferir Saldo - Informe o Recebedor</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('confirmar.transferencia')}}">
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="remetente" placeholder="Quem vai receber o Saldo (Informe o Nome ou Email)">
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success" type>Proxima Etapa</button>
                    </div>
            </form>
        </div>
    </div>
@stop