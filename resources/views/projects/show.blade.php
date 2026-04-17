@extends('layouts.projects')

@section('title', $project->title)

@section('page-header')
    <span class="badge bg-danger mb-3">{{ $project->category }}</span>
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
                </div>
            </div>

            {{-- Bottone torna indietro --}}
            <div class="mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-outline-dark">
                    &larr; Torna alla lista
                </a>
            </div>

        </div>
    </div>

@endsection