@extends('adminlte::page')

@section('title', 'Editar Plano ')

@section('content_header')
    <h1>Editar Plano </h1>
@stop

@section('content')
    <p>Editar Plano .</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('plans.update',$plan->id)}}" method="post">
                @csrf
                @method('put')
               @include('admin.pages.plans.form.forms')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
