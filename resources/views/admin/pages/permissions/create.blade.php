@extends('adminlte::page')

@section('title', 'Nova Permissão')

@section('content_header')
    <h1>Cadastrar Nova Permissão </h1>
@stop

@section('content')
    <p>Cadastrar Nova Permissão.</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('permissions.store')}}" method="post">
                @csrf
                @include('admin.pages.profiles._partials_profiles.forms_profiles')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('profiles.index')}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
