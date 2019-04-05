@extends('adminlte::page')

@section('title', 'Saque de Saldo')<!--O titulo da janela no browser-->

@section('content_header')<!--O titulo da pagina-->
    <h1>Realizar Saque</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')<!--Conteudo da pagina-->
<div class="box">
        <div class="box-header">
            <h3>Deposito</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('saque.consulta')}}">
                <!--{!!csrf_token()!!} //outra forma de passar -->
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="value" placeholder="Valor Saque">
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success" type>Recarregar Saldo</button>
                    </div>
            </form>
        </div>
    </div>
@stop