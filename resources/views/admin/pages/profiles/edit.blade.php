@extends('adminlte::page')

@section('title', 'Editar Perfil ')

@section('content_header')
    <h1>Editar Perfil </h1>
@stop

@section('content')
    <p>Editar Perfil .</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('profiles.update',$profile->id)}}" method="post">
                @csrf
                @method('put')
                @include('admin.pages.profiles._partials_profiles.forms_profiles')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('profiles.index')}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
