@extends('layouts.projects')

@section('title', 'Profilo')

@section('page-header')
    <h1 class="fw-bold mb-1">Profilo</h1>
    <p class="text-white-50 mb-0">Gestisci le tue informazioni personali</p>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Informazioni profilo --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-dark text-white fw-bold">
                    Informazioni profilo
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Aggiorna password --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-dark text-white fw-bold">
                    Aggiorna password
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Elimina account --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-danger text-white fw-bold">
                    Elimina account
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            {{-- Torna alla home --}}
            <div class="mb-5">
                <a href="{{ url('/') }}" class="btn btn-outline-dark">
                    &larr; Torna alla home
                </a>
            </div>

        </div>
    </div>

@endsection