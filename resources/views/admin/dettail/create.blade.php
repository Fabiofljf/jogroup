@extends('admin.layouts.app')

@section('content')
<h2 class="py-4">Registrazione Informazioni aggiuntive</h2>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<p class="my-3 d-flex justify-content-end">Campi obbligatori contrassegnati da *</p>
<!-- / Avviso campi obbligatori -->

<form action="{{ route('admin.dettail.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Utente -->
    <div class="mb-4">
        <label for="person_id" required aria-describedby="RoleHelper">Scegli un utente*</label>
        <select name="person_id" id="person_id" class=" @error('person_id') is-invalid @enderror">
            <option value="">Seleziona un utente</option>
            @forelse($people as $person)
            <option value="{{$person->id}}" uniqid>{{$person->name}} {{$person->surname}}</option>
            @empty
            <option value="">Non esistono utenti</option>
            @endforelse
        </select>
        <small id="RoleHelper" class="text-muted">Aggiungi un utente a cui associare le info aggiuntive</small>
    </div>

    <!-- Istituto Utente -->
    <div class="mb-4">
        <label for="school">Istituto*</label>
        <input type="text" name="school" id="school" class="form-control @error('school') is-invalid @enderror" placeholder="Università di Catania" required aria-describedby="schoolHelper">
        <small id="schoolHelper" class="text-muted">Aggiungi l'Istituto dell'utente</small>
    </div>

    <!-- Argomenti -->
    <div class="mb-4">
        <label for="argoment">Argomenti*</label>
        <input type="text" name="argoment" id="argoment" class="form-control @error('argoment') is-invalid @enderror" placeholder="Economia, Fisica" required aria-describedby="argomentHelper">
        <small id="argomentHelper" class="text-muted">Aggiungi l'Argomento</small>
    </div>

    <!-- Attestato Utente -->
    <div class="mb-4">
        <label for="title">Attestato*</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Laurea" required aria-describedby="titleHelper">
        <small id="titleHelper" class="text-muted">Aggiungi L, LM</small>
    </div>

    <!-- Anno da -->
    <div class="mb-4">
        <label for="year_from">Anno da*</label>
        <input type="text" name="year_from" id="year_from" class="form-control @error('year_from') is-invalid @enderror" placeholder="2012" required aria-describedby="year_fromHelper">
        <small id="year_fromHelper" class="text-muted">Aggiungi l'email dell'utente</small>
    </div>

    <!-- Anno a -->
    <div class="mb-4">
        <label for="year_to">Anno a*</label>
        <input type="text" name="year_to" id="year_to" class="form-control @error('year_to') is-invalid @enderror" placeholder="2015" required aria-describedby="year_toHelper">
        <small id="year_toHelper" class="text-muted">Aggiungi l'email dell'utente</small>
    </div>

    <!-- Voto -->
    <div class="mb-4">
        <label for="vote">Voto</label>
        <input type="text" name="vote" id="vote" class="form-control @error('vote') is-invalid @enderror" placeholder="100" required aria-describedby="voteHelper">
        <small id="voteHelper" class="text-muted">Aggiungi la data di nascita dell'utente</small>
    </div>


    <button type="submit" class="btn btn-danger text-white my-4">Aggiungi</button>

</form>
@endsection