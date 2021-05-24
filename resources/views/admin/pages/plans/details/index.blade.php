@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.index',$plan->url)}}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do Plano {{$plan->name}} <a href="{{route('details.create',$plan->url)}}" class="btn btn-dark" ><i class="fas fa-plus"></i> Novo Detalhe</a> </h1>
@stop

@section('content')
    <p>Listagem dos Detalhes.</p>

    <div class="card">

        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>

                    <th style="width: 200px">Ações</th>
                </tr>

                </thead>
                <tbody>

                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>

                        <td style="width: 10px">

                            <a href="{{route('details.edit',[$plan->url,$detail->id])}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a>
                            <a href="{{route('details.show',[$plan->url,$detail->id])}}" class="btn btn-warning"><i class="fas fa-eye"></i> Exibir</a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{route('plans.index',)}}" class="btn btn-dark">Voltar</a>
            {{--Paginação,não deixa perder o filtro caso mude a pagina--}}
            @if(isset($filters))
                {{$details->appends($filters)->links()}}
            @else
                {{$details->links()}}
            @endif
        </div>
    </div>

@stop
