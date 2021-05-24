@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano </h1>
@stop

@section('content')
    <p>Cadastrar Novo Plano.</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('plans.store')}}" method="post">
                @csrf
                @include('admin.pages.plans.form.forms')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
