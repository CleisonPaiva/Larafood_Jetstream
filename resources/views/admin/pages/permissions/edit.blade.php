@extends('adminlte::page')

@section('title', 'Editar Permissão ')

@section('content_header')
    <h1>Editar Permissão </h1>
@stop

@section('content')
    <p>Editar Permissão .</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('permissions.update',$permission->id)}}" method="post">
                @csrf
                @method('put')
                @include('admin.pages.permissions._partials_permission.forms_permissions')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('permissions.index')}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
