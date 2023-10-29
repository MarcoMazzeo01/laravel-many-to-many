@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container mt-5">
        <a href='{{ route('admin.projects.index') }}' class="btn btn-outline-primary">Torna ai progetti</a>
        <hr>
        <h1><i class="fa-regular fa-folder-open"></i> {{ $project->title }}</h1>

        <div class="row g-5 mt-1">
            {{-- type --}}
            <div class="col-3">
                <p>
                    <strong>Tipo</strong><br>
                    {{ $project->type?->label }}
                </p>
            </div>

            {{-- slug --}}
            <div class="col-3">
                <p>
                    <strong>Slug</strong><br>
                    {{ $project->slug }}
                </p>
            </div>

            {{-- created_at --}}
            <div class="col-3">
                <p>
                    <strong>Pubblicato</strong><br>
                    {{ $project->created_at }}
                </p>
            </div>

            {{-- updated_at --}}
            <div class="col-3">
                <p>
                    <strong>Aggiornato</strong><br>
                    {{ $project->updated_at }}
                </p>
            </div>

            {{-- description --}}
            <div class="col-12">
                <p>
                    <strong>Descrizione</strong><br>
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
