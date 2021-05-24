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
                <li class="list-group-item"><strong>Nome: </strong>{{$detail->name}}</li>

            </ul>


            <form class="form" action="{{route('details.destroy',[$plan->url,$detail->id])}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{route('details.index',$plan->url)}}" class="btn btn-dark">Voltar</a>
        </div>
    </div>



@stop

