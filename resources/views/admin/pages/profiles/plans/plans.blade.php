@extends('adminlte::page')

@section('title', 'Planos do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('profiles.index')}}" >Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.plans',$profile->id)}}" class="active">Planos</a></li>
    </ol>
    <h1>Planos do Perfil
    </h1>
@stop

@section('content')
    <p>Planos do Perfil.</p>

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

                @foreach($plans as $plan)
                    <tr>
                        <td>{{$plan->name}}</td>

                        <td style="width: 10px">
                            <a href="{{route('plans.profile.detach',[$plan->id,$profile->id])}}" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i> Remover</a>
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
