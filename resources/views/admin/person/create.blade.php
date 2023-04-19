@extends('admin.layouts.app')

@section('content')
<h2 class="py-4">Registrazione nuovo utente</h2>
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

<form action="{{ route('admin.person.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Nome Utente -->
    <div class="mb-4">
        <label for="name">Nome*</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Mario" required aria-describedby="nameHelper">
        <small id="nameHelper" class="text-muted">Aggiungi il nome dell'utente</small>
    </div>

    <!-- Cognome Utente -->
    <div class="mb-4">
        <label for="surname">Cognome*</label>
        <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Rossi" required aria-describedby="surnameHelper">
        <small id="surnameHelper" class="text-muted">Aggiungi il cognome dell'utente</small>
    </div>

    <!-- Genere Utente -->
    <div class="mb-4">
        <label for="gender">E-mail*</label>
        <input type="text" name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" placeholder="Maschio" required aria-describedby="genderHelper">
        <small id="genderHelper" class="text-muted">Aggiungi il Genere dell'utente</small>
    </div>

    <!-- E-mail Utente -->
    <div class="mb-4">
        <label for="email">E-mail*</label>
        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Prova@prova.com" required aria-describedby="emailHelper">
        <small id="emailHelper" class="text-muted">Aggiungi l'email dell'utente</small>
    </div>

    <!-- Data di Nascita Utente -->
    <div class="mb-4">
        <label for="date_of_birth">Data di Nascita*</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" required aria-describedby="date_of_birthHelper">
        <small id="date_of_birthHelper" class="text-muted">Aggiungi la data di nascita dell'utente</small>
    </div>

    <button type="submit" class="btn btn-danger text-white my-4">Registrazione</button>

    <!-- Script JS -->

</form>
@endsection