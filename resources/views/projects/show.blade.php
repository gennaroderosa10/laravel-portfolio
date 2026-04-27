@extends('layouts.projects')

@section('title', $project->title)

@section('page-header')
    <span class="badge bg-danger mb-3">{{ $project->type?->name }}</span>
    <h1 class="fw-bold mb-2">{{ $project->title }}</h1>
    <p class="text-white-50 mb-0">
        di <strong class="text-white">{{ $project->author }}</strong>
    </p>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Contenuto del post --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <p class="lead">{{ $project->content }}</p>

                    @if ($project->technologies->isNotEmpty())
                        <hr>
                        <h5 class="fw-bold mb-3">Tecnologie usate</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($project->technologies as $technology)
                                <span class="badge bg-secondary">{{ $technology->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Bottoni azione --}}
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-outline-dark">
                    &larr; Torna alla lista
                </a>
                @auth
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-danger">
                        Modifica
                    </a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalElimina">
                        Elimina
                    </button>
                @endauth
            </div>

        </div>
    </div>

    @auth
        <div class="modal fade" id="modalElimina" tabindex="-1" aria-labelledby="modalEliminaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalEliminaLabel">Conferma eliminazione</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        Sei sicuro di voler eliminare il post <strong>{{ $project->title }}</strong>?
                        <br>
                        <span class="text-muted small">Questa operazione è irreversibile.</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">
                            No, annulla
                        </button>

                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Sì, elimina
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endauth

@endsection