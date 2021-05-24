@extends('adminlte::page')

@section('title', 'Exibir Plano')

@section('content_header')
    <h1>Detalhes do Plano <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <p>Exibir Plano.</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome: </strong>{{$plan->name}}</li>
                <li class="list-group-item"><strong>URL: </strong>{{$plan->url}}</li>
                <li class="list-group-item"><strong>Preço: </strong>R${{ number_format($plan->price,2,',','.')}}</li>
                <li class="list-group-item"><strong>Descrição: </strong>{{$plan->description}}</li>
            </ul>

            @include('admin.includes.alerts')

            <form class="form" action="{{route('plans.destroy',$plan->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
        </div>
    </div>



@stop
