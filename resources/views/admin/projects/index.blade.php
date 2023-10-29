@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container pb-2">
        <a href='{{ route('admin.projects.create') }}' class='btn btn-outline-success'>Nuovo Progetto</a>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Creato</th>
                    <th scope="col">Aggiornato</th>
                    <th>Opzioni</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td><a href='{{ route('admin.projects.show', $project) }}'>{{ $project->title }}</a></td>
                        <td>{{ $project->type?->label }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            {{-- edit --}}
                            <a href="{{ route('admin.projects.edit', $project) }}" class='btn btn-warning'>
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            {{-- delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteProject_{{ $project->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteProject_{{ $project->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Progetto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicur* di voler eliminare il progetto "{{ $project->title }}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>

                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr colspan="6"><i>Nessun progetto da mostrare.</i></tr>
                @endforelse

            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
