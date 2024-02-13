@extends('layouts.admin')
@section('content')
    <div class="mt-3 mb-3">
        <h3 class="text-white">SHOW PROJECT</h3>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h2>{{$project->title}}</h2>

            <hr class="border border-danger border-2 opacity-100">
            <p>{{$project->description}}</p>
            @if ($project->description !== null)
                <hr class="border border-danger border-2 opacity-100">
            @endif
            <div>
                <p>{{$project->staff}}</p>
            </div>
            @if ($project->staff !== null)
                <hr class="border border-danger border-2 opacity-100">
            @endif
            <div>
                <img src="{{asset('storage/' . $project->img)}}" alt="img">
            </div>
                <hr class="border border-danger border-2 opacity-100">
            <div>
                <p> Categoria: {{$project->type?->name}}</p>
            </div>
            <hr class="border border-danger border-2 opacity-100">
            <div>
                <p>technologies: </p>
                <ul>
                    @foreach ($project->technologies as $technology)
                        <li>
                            {{$technology->title}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
      </div>
@endsection