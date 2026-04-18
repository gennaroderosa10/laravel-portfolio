@extends('layouts.projects')

@section('title', 'Home')

@section('page-header')
    <h1 class="fw-bold mb-2">Benvenuto nel Blog</h1>
    <p class="text-white-50 mb-0">Scopri tutti i progetti pubblicati</p>
@endsection

@section('content')

    {{-- Hero --}}
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <p class="lead text-secondary">
                Una raccolta di progetti, articoli e idee. Sfoglia i post, filtra per categoria
                o inizia a scrivere il tuo contributo.
            </p>
        </div>
    </div>

    {{-- Link cards --}}
    <div class="row g-4 justify-content-center">

        {{-- Post --}}
        <div class="col-sm-6 col-lg-4">
            <a href="{{ route('projects.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="card-body">
                        <div class="display-5 mb-3 text-danger">&#128240;</div>
                        <h5 class="card-title fw-bold">Tutti i post</h5>
                        <p class="card-text text-muted small">
                            Sfoglia l'elenco completo degli articoli pubblicati.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        @auth

            {{-- Nuovo progetto --}}
            <div class="col-sm-6 col-lg-4">
                <a href="{{ route('projects.create') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <div class="display-5 mb-3 text-danger">&#43;&#9711;</div>
                            <h5 class="card-title fw-bold">Nuovo progetto</h5>
                            <p class="card-text text-muted small">
                                Crea e pubblica un nuovo articolo.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Dashboard --}}
            <div class="col-sm-6 col-lg-4">
                <a href="{{ route('admin.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <div class="display-5 mb-3 text-danger">&#9881;</div>
                            <h5 class="card-title fw-bold">Dashboard</h5>
                            <p class="card-text text-muted small">
                                Accedi all'area di amministrazione.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Profilo --}}
            <div class="col-sm-6 col-lg-4">
                <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <div class="display-5 mb-3 text-danger">&#128100;</div>
                            <h5 class="card-title fw-bold">Profilo</h5>
                            <p class="card-text text-muted small">
                                Modifica le tue informazioni personali.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        @else

            {{-- Login --}}
            <div class="col-sm-6 col-lg-4">
                <a href="{{ route('login') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <div class="display-5 mb-3 text-danger">&#128274;</div>
                            <h5 class="card-title fw-bold">Login</h5>
                            <p class="card-text text-muted small">
                                Accedi per gestire i progetti e il tuo profilo.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        @endauth

    </div>

@endsection