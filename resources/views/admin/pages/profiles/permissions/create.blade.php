@extends('adminlte::page')

@section('title', 'Permissões dispniveis Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}" class="active">Perfis</a></li>
    </ol>
    <h1>Permissões disponiveis para o Perfil
    </h1>
@stop

@section('content')
    <p>Permissões disponiveis para o Perfil.</p>

    <div class="card">
        <div class="card-header">
            <form class="form form-inline" action="{{route('profiles.permissions.available',$profile->id)}}" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Nome:" class="form-control"
                       value="{{$filters['filter']?? ''}}">
                <button type="submit" class="btn btn-info"><i class="fas fa-filter"></i> Filtrar</button>
            </form>

        </div>
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th style="width:50px">#</th>
                    <th>Nome</th>


                </tr>

                </thead>
                <tbody>
                <form class="form form-inline " action="{{route('profiles.permissions.attach',$profile->id)}}" method="post">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>

                                <td><input type="checkbox" name="permissions[]"
                                           value="{{$permission->id}}"></td>

                            <td>{{$permission->name}}</td>


                        </tr>
                    @endforeach
                    <td>
                    <td colspan="500">

                        <button type="submit" class="btn btn-outline-primary">Vincular</button>
                    </td>
                    </td>
                </form>

                </tbody>
            </table>
        </div>
        <div class="card-footer">


        </div>
    </div>

@stop

