@extends('layouts.projects')

@section('title', 'Lista Post')

@section('page-header')
    <h1 class="fw-bold mb-1">Il Blog</h1>
    <p class="text-white-50 mb-0">Tutti gli articoli pubblicati</p>
@endsection

@section('content')

    <div class="row g-4">

        {{-- COLONNA PRINCIPALE: lista post --}}
        <div class="col-lg-8">

            @forelse ($projects as $post)
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body p-4">

                        {{-- Categoria --}}
                        <span class="badge bg-danger mb-2">{{ $post->category }}</span>

                        {{-- Titolo --}}
                        <h2 class="card-title h4 fw-bold mb-1">
                            <a href="{{ route('projects.show', $post) }}" class="text-dark text-decoration-none">
                                {{ $post->title }}
                            </a>
                        </h2>

                        {{-- Autore --}}
                        <p class="text-muted small mb-3">
                            <i class="bi bi-person"></i> di <strong>{{ $post->author }}</strong>
                        </p>

                        {{-- Anteprima contenuto --}}
                        <p class="card-text text-secondary">
                            {{ Str::limit($post->content, 200) }}
                        </p>

                        {{-- Link leggi di più --}}
                        <a href="{{ route('projects.show', $post) }}" class="btn btn-outline-danger btn-sm mt-2">
                            Leggi di più &rarr;
                        </a>

                    </div>
                </div>
            @empty
                <div class="alert alert-warning">
                    Nessun post disponibile al momento.
                </div>
            @endforelse

            {{-- PAGINAZIONE --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $projects->links() }}
            </div>

        </div>

        {{-- SIDEBAR --}}
        <aside class="col-lg-4">

            {{-- Widget categorie --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-dark text-white fw-bold">
                    Categorie
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('projects.index', ['category' => $category->category]) }}"
                               class="text-decoration-none text-dark">
                                {{ $category->category }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Widget ultimi progetti --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">
                    Ultimi progetti
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($latestProjects as $latest)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $latest) }}"
                               class="text-decoration-none text-dark fw-semibold d-block">
                                {{ $latest->title }}
                            </a>
                            <small class="text-muted">di {{ $latest->author }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>

        </aside>

    </div>

@endsection