@extends('adminlte::page')

@section('title', 'Recarga')<!--O titulo da janela no browser-->

@section('content_header')<!--O titulo da pagina-->
    <h1>Fazer Recarga</h1>

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
            @if($errors->any())<!--Estudar metodo any()-->
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}<p>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('deposito.consulta')}}">
                <!--{!!csrf_token()!!} //outra forma de passar -->
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <input type="text" name="value" placeholder="Valor Recarga">
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success" type>Recarregar Saldo</button>
                    </div>
            </form>
        </div>
    </div>
@stop