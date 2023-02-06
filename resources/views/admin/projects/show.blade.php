@extends('layouts.admin')
@section('title')
    | PROJECTS | DETAILS
@endsection


@section('content')
    <div class="container d-flex flex-column align-items-center secondary-color">
        <div class="mb-5 text-center">
            <h1 class="box-edit d-inline-block my-2 p-2">
                DETTAGLIO {{ $project->name }}
            </h1>
            <div>
                <a class="btn btn-info" href=" {{ route('admin.project.index') }} ">
                    TABELLA PROGETTI
                </a>
                <a class="btn btn-warning" href=" {{ route('admin.project.edit', $project) }} ">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                @include('admin.partials.form-delete', [
                    'title' => $project->name,
                    'route' => 'admin.project.destroy',
                    'element' => $project,
                ])
            </div>
        </div>
        @include('admin.partials.messages-session')
        <div class="mf-admin-card box-edit p-2">
            <img src="{{ asset('storage/' . $project->cover_image) }} " class="card-img-top"
                alt=" {{ $project->image_original_name }} ">
            <div class="card-body p-5">
                <h5 class="card-title">{{ $project->name }} </h5>
                <p class="card-text">{{ $project->client_name }}</p>
                <p class="card-text"> DESCRIZIONE: <br> {{ $project->summary }}</p>
                @if ($project->type)
                    <div class="text-center my-3">
                        <span>
                            TIPO:
                        </span>
                        <span class="badge text-bg-info text-uppercase">{{ $project->type->name }}</span>
                    </div>
                @endif

                @forelse ($project->technologies as $technology)
                    <div class="d-inline-block">
                        <span class="badge text-bg-warning text-uppercase">{{ $technology->name }}</span>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
