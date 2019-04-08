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
                            <td>{{$historic->type($historic->type)}}</td>
                            <td>{{$historic->date}}</td>
                            <td>
                                @if($historic->user_id_transaction)
                                    <!--{{$historic->user()->get()->first()->name}} O problema desta forma e a quantidade de consultas-->
                                    Transferido por {{$historic->usuarioRemetente->name}}
                                @else
                                    --
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop