@extends('layouts.admin')


@section('content')
        <div class="mt-3 mb-3">
            <h3 class="text-white">MODIFY PROJECT</h3>
        </div>
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- title --}}
            <div class=" mb-3">
                <label for="inputEmail4" class="border rounded">Title</label>
                <input type="text" name="title" class="ps-2 pt-1 pb-1 col-8 border-danger-b rounded @error('title') is-invalid @enderror"  value="{{$project->title}}" placeholder="title" id="inputEmail4">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- description --}}
            <div class="input-group mb-3">
                <label for="descTextArea">Description</label>
                <textarea class="ps-1 border-danger-b rounded" rows="8" cols="88" name="description" placeholder="description" id="descTextArea">{{$project->description}}</textarea>
            </div>
        
            <div class="d-flex row mb-3">
                    {{-- staff --}}
                <div class="mb-3">
                    <label for="staffInput" class="border rounded">Collaborators</label>
                    <input type="text" name="staff" class="ps-2 pt-1 pb-1 col-8 border-danger-b rounded" id="staffInput" value="{{$project->staff}}" placeholder="collaborators">
                </div>
                {{-- img --}}
                <div class="mb-1">
                    <label for="imageInput" class="border rounded">Immage</label>
                    <input type="text" name="img" class="ps-2 pt-1 pb-1 col-8 border-danger-b rounded @error('img') is-invalid @enderror" value="{{$project->img}}" id="imageInput" placeholder="img">
                </div>
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-12">
                <select class=" ps-2 pt-1 pb-1 col-8 border-danger-b rounded" aria-label="Default select example" name="type_id">
                    @foreach ( $type as $types )
                        <option value="{{$types->id}}" @if (old('types_id', $project->type_id) == $types->id) selected @endif>{{$types->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="border-0 ps-2 pe-2 pb-1 pt-1 text-white button-create">Sign in</button>
            </div>
        </form>
@endsection
