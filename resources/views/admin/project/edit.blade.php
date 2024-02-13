@extends('layouts.admin')


@section('content')
        <div class="mt-3 mb-3">
            <h3 class="text-white">EDIT PROJECT</h3>
        </div>
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
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
                {{-- immagine --}}
                <div class="mb-1">
                    <label for="formFile" class="border rounded">Immage</label>
                    <input class=" col-8 border-danger-b rounded @error('img') is-invalid @enderror" name="img" value="{{$project->img}}" type="file" id="formFile" placeholder="choose img">
                  </div>
                  
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- type --}}
            <div class="mb-3 col-12">
                <select class=" ps-2 pt-1 pb-1 col-8 border-danger-b rounded" aria-label="Default select example" name="type_id">
                    @foreach ( $type as $types )
                        <option value="{{$types->id}}" @if (old('type_id', $project->type_id) == $types->id) selected @endif>{{$types->name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- check technologies --}}
            <div class="mb-3">
                <div>
                    <p class="fs-5 text-black">Technologies</p>
                </div>
                @foreach ($technology as $technologies)
                {{-- @dd($technologies) --}}
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <label class="form-check-label text-white d-inline" for="inlineCheckbox2">{{$technologies->title}}</label>
                            <input class="form-check-input" type="checkbox" name="technologies[]" value="{{$technologies->id}}" 
                            {{in_array($technologies->id, old('technologies', []))? 'checked': ''}}>
                        @else
                            <label class="form-check-label text-white d-inline" for="inlineCheckbox2">{{$technologies->title}}</label>
                            <input class="form-check-input" type="checkbox" name="technologies[]" value="{{$technologies->id}}" 
                            {{$project->technologies->contains($technologies->id)? 'checked': ''}}>
                        @endif
                    </div>
                @endforeach
           </div>

            <div class="col-12">
                <button type="submit" class="border-0 ps-2 pe-2 pb-1 pt-1 text-white button-create">Sign in</button>
            </div>
        </form>
@endsection
