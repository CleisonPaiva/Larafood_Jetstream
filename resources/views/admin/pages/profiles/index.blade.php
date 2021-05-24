@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}" class="active">Perfis</a></li>
    </ol>
    <h1>Perfis <a href="{{route('profiles.create')}}" class="btn btn-dark" ><i class="fas fa-plus"></i> Novo Perfil</a> </h1>
@stop

@section('content')
    <p>Listagem dos Perfis.</p>

    <div class="card">
        <div class="card-header">
            <form class="form form-inline" action="{{route('profiles.search')}}" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Nome:" class="form-control" value="{{$filters['filter']?? ''}}">
                <button type="submit" class="btn btn-info"><i class="fas fa-filter"></i> Filtrar</button>
            </form>

        </div>
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:300px;text-align: center">Ações</th>
                </tr>

                </thead>
                <tbody>

                @foreach($profiles as $perfil)
                    <tr>
                        <td>{{$perfil->name}}</td>

                        <td style="width: 10px">
                            <a href="{{route('profiles.edit',$perfil->id)}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a>
                            <a href="{{route('profiles.show',$perfil->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i> Exibir</a>
                            <a href="{{route('profiles.permissions',$perfil->id)}}" class="btn btn-light"><i class="fas fa-unlock"></i> </a>
                            <a href="{{route('profiles.plans',$perfil->id)}}" class="btn btn-info"><i class="fas fa-id-card"></i> </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{--Paginação,não deixa perder o filtro caso mude a pagina--}}
            @if(isset($filters))
                {{$profiles->appends($filters)->links()}}
            @else
                {{$profiles->links()}}
            @endif
        </div>
    </div>

@stop
