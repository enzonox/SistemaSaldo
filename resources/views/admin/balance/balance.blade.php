@extends('adminlte::page')

@section('title', 'Saldos')<!--O titulo da janela no browser-->

@section('content_header')<!--O titulo da pagina-->
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
    </ol>
@stop

@section('content')<!--Conteudo da pagina-->
    <div class="box">
        <div class="box-header">
            <!--icones nao funcionaram-->
            <a href="{{route ('balance.deposito')}}" class="btn btn-warning money-check-alt">
                Recarregar</a>
            @if($amount > 0)<!--A opcao de saque so aparecerase o saldo for maior que 0-->
                <a href="{{route ('balance.saque')}}" class="btn btn-danger">
                        Sacar</a>
            @endif
            @if($amount > 0)<!--A opcao de Transferencia so aparecera se o saldo for maior que 0-->
            <a href="{{route ('balance.transferencia')}}" class="btn btn-primary">
                    Transferir</a>
        @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')    
                <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ {{number_format($amount, 2, ',', '')}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
@stop