@extends('admin.layouts.app')

@section('content')


<div class="text-center mb-5 py-5 px-- shadow rounded-top bg_terziary c_primary">Preofilo {{$person->name}}</div>
<div class="container">
    <div class="row ">
        <div class="col flex-column">
            <div class="col">Nome: {{$person->name}}</div>
            <div class="col">Cognome: {{$person->surname}}</div>
            <div class="col">Genere: {{$person->gender}}</div>
            <div class="col">Email: {{$person->email}}</div>
        </div>
       
        <!-- first loop -->
        <div class="col">
            <h4>Esperienze formative:</h4>
            <div class="col"> Nome Istituto/Università/Ente di formazione {{$person->dettail->school}}</div>
            <div class="col"> Principali argomenti {{$person->dettail->argument}}</div>
            <div class="col"> Attestato/diploma conseguito {{$person->dettail->title}}</div>
            <div class="col"> Anno di frequenza {{$person->dettail->year_from}}-{{$person->dettail->year_to}}</div>
            <div class="col"> Eventuale votazione {{$person->dettail->vote}}</div>
            
            <!-- second loop -->
        </div>
    </div>
</div>

@endsection

<style>
    .px-- {
        margin-left: -0.7rem;
        margin-right: -0.7rem;
    }
</style>