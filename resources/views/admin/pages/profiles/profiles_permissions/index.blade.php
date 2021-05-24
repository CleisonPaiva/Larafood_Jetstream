@extends('adminlte::page')

@section('title', 'Perfil com Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}" class="active">Permissões</a></li>
    </ol>
    <h1>Perfil com Permissão
    </h1>
@stop

@section('content')
    <p>Perfil com Permissão.</p>

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

                @foreach($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>

                        <td style="width: 10px">
                            <a href="{{route('permissions.profiles.detach',[$permission->id,$profile->id])}}" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i> Remover</a>
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
