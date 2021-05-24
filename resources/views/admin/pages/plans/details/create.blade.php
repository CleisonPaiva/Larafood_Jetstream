@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.index',$plan->url)}}" >Detalhes</a></li>
        <li class="breadcrumb-item active" ><a href="{{route('details.create',$plan->url)}}" class="active">Novo Detalhe</a></li>
    </ol>
    <h1>Cadastrar Novo Detalhe </h1>
@stop

@section('content')
    <p>Cadastrar Novo Detalhe.</p>

    <div class="card">
        <div class="card-header">


        </div>
        <div class="card-body">
            <form class="form" action="{{route('details.store',$plan->url)}}" method="post">
                @csrf
                @include('admin.pages.plans.details.forms.forms_details')
            </form>

        </div>
        <div class="card-footer">
            <a href="{{route('details.index',$plan->url)}}" class="btn btn-dark">Voltar</a>
        </div>

    </div>

@stop
