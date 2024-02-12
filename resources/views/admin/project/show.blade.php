@extends('layouts.admin')


@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h2>{{$project->title}}</h2>
            <hr class="border border-danger border-2 opacity-100">
            <p>{{$project->description}}</p>
            <hr class="border border-danger border-2 opacity-100">
            <div>
                <p>{{$project->staff}}</p>
            </div>
            <hr class="border border-danger border-2 opacity-100">
            <div>
                <img src="{{asset('storage/' . $project->img)}}" alt="img">
            </div>
            <hr class="border border-danger border-2 opacity-100">
            <div>
                <p> Categoria: {{$project->type?->name}}</p>
            </div>
            <hr class="border border-danger border-2 opacity-100">
            <div>
                <p>tecnologies: </p>
                <ul>
                    @foreach ($project->tecnologies as $tecnology)
                        <li>
                            {{$tecnology->title}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
      </div>
@endsection