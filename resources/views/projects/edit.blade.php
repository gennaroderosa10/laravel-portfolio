@extends('layouts.projects')

@section('title', 'Modifica: ' . $project->title)

@section('page-header')
    <h1 class="fw-bold mb-1">Modifica Progetto</h1>
    <p class="text-white-50 mb-0">Stai modificando: <strong>{{ $project->title }}</strong></p>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        {{-- Titolo --}}
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Titolo</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $project->title) }}"
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Autore --}}
                        <div class="mb-3">
                            <label for="author" class="form-label fw-semibold">Autore</label>
                            <input
                                type="text"
                                id="author"
                                name="author"
                                class="form-control @error('author') is-invalid @enderror"
                                value="{{ old('author', $project->author) }}"
                            >
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Type --}}
                        <div class="mb-3">
                            <label for="type_id" class="form-label fw-semibold">Tipo</label>
                            <select
                                id="type_id"
                                name="type_id"
                                class="form-select @error('type_id') is-invalid @enderror"
                            >
                                <option value="">Seleziona un tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contenuto --}}
                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold">Contenuto</label>
                            <textarea
                                id="content"
                                name="content"
                                rows="8"
                                class="form-control @error('content') is-invalid @enderror"
                            >{{ old('content', $project->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bottoni --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-danger">
                                Salva modifiche
                            </button>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-dark">
                                Annulla
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection