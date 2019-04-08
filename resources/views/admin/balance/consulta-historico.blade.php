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
            
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>?Remetente?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                        <tr>
                            <td>{{$historic->id}}</td>
                            <td>{{number_format($historic->amount, 2, ',', '.')}}</td>
                            <td>{{$historic->type}}</td>
                            <td>{{$historic->date}}</td>
                            <td>{{$historic->user_id_transaction}}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop