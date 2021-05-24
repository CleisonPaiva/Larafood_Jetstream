@extends('adminlte::page')

@section('title', 'Exibir Perfil')

@section('content_header')
    <h1>Detalhes do Perfil <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <p>Exibir Perfil.</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome: </strong>{{$profile->name}}</li>
               <li class="list-group-item"><strong>Descrição: </strong>{{$profile->description}}</li>
            </ul>

            @include('admin.includes.alerts')

            <form class="form" action="{{route('profiles.destroy',$profile->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{route('profiles.index')}}" class="btn btn-dark">Voltar</a>
        </div>
    </div>



@stop
