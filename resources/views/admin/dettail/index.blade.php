@extends('admin.layouts.app')

@section('content')
<div class="">
    {{-- messaggio di creazione, modifica, eliminazione --}}
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- Sezione per aggiungere un ulteriore appartamento -->
    <div class="d-flex justify-content-between py-4">
        <h1>Lista delle <strong class="c_secondary">esperienze formative</strong></h1>
        <div id="query_mobile">
            <a href="{{ route('admin.person.create') }}" class="media_none btn btn-danger text-white">Aggiungi un'esperienze +</a>
        </div>
    </div>
    <div class="row my-5">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th class="border-0"><strong>Cognome</strong></th>
                    <th class="border-0"><strong>Nome</strong></th>
                    <th class="border-0"><strong>Università</strong></th>
                    <th class="border-0"><strong>argomenti</strong></th>
                    <th class="border-0"><strong>diploma conseguito</strong></th>
                    <th class="border-0"><strong>da</strong></th>
                    <th class="border-0"><strong>a</strong></th>
                    <th class="border-0"><strong>voto</strong></th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @forelse ($dettails as $dettail)
                <tr>
                    <td>{{$dettail->surname}}</td>
                    <td>{{$dettail->name}}</td>
                    <td>{{$dettail->school}}</td>
                    <td>{{$dettail->argoment}}</td>
                    <td>{{$dettail->title}}</td>
                    <td>{{$dettail->year_from}}</td>
                    <td>{{$dettail->year_to}}</td>
                    <td>{{$dettail->vote}}</td>
                    <td>
                        <ul class="d-flex justify-content-around">
                            <li class="px-1">
                                <a class="btn btn-success text-white btn-sm" href="{{ route('admin.dettail.edit', $dettail->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg>
                                </a>

                            </li>
                            <!-- /Modifica -->
                            <li>
                                <!-- Bottone per avviare la modale -->
                                <button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#delete-dettail-{{ $dettail->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                                <!-- Modale -->
                                <div class="modal fade" id="delete-dettail-{{ $dettail->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitle-{{ $dettail->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Elimina Utente:
                                                    "{{ $dettail->surname }} {{ $dettail->name }}"</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare questo utente?<br>
                                                !Attenzione questa è un'operazione distruttiva!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.dettail.destroy', $dettail->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- /Cancella -->
                        </ul>
                    </td>
                    @empty
                    <p class="my-3">Il database è vuoto, non è presente nessun utente. Inserisci manualmente le informazioni per visualizzarle</p>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- /.Table -->
    </div>
    <!-- NavBar -->
</div>

@endsection

<style>
ul{
        list-style-type: none;
    }
</style>