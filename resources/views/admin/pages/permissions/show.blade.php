@extends('adminlte::page')

@section('title', 'Exibir Permissão')

@section('content_header')
    <h1>Detalhes da Permissão <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <p>Exibir Permissão.</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome: </strong>{{$permission->name}}</li>
                <li class="list-group-item"><strong>Descrição: </strong>{{$permission->description}}</li>
            </ul>

            @include('admin.includes.alerts')

            <form class="form" action="{{route('permissions.destroy',$permission->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{route('permissions.index')}}" class="btn btn-dark">Voltar</a>
        </div>
    </div>



@stop
