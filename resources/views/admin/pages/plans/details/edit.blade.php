@extends('adminlte::page')

@section('title', 'Editar Detalhe ')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.index',$plan->url)}}" >Detalhes</a></li>
        <li class="breadcrumb-item active" ><a href="{{route('details.edit',[$plan->url,$detail->id])}}" class="active">Editar Detalhe</a></li>
    </ol>
    <h1>Editar Detalhe  </h1>
@stop

@section('content')
    <p>Editar Detalhe .</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form class="form" action="{{route('details.update',[$plan->url,$detail->id])}}" method="post">
                @csrf
                @method('put')
                @include('admin.pages.plans.details.forms.forms_details')
            </form>
        </div>


        <div class="card-footer">
            <a href="{{route('details.index',$plan->url)}}" class="btn btn-dark">Voltar</a>
        </div>

@stop
