@extends('adminlte::page')

@section('title', 'Permissões do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}" class="active">Perfis</a></li>
    </ol>
    <h1>Permissões do Perfil
        <a href="{{route('profiles.permissions.available',$profile->id)}}" class="btn btn-dark" ><i class="fas fa-plus"></i> Nova Permissão</a>
    </h1>
@stop

@section('content')
    <p>Permissões do Perfil.</p>

    <div class="card">

        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:200px">Ações</th>
                </tr>

                </thead>
                <tbody>

                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>

                        <td style="width: 10px">
                            <a href="{{route('profiles.permissions.detach',[$profile->id,$permission->id])}}" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i> Remover</a>
                         </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="card-footer">


        </div>
    </div>

@stop
