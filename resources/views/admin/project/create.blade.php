@extends('layouts.admin')


@section('content')
    <div class="mt-3 mb-3">
        <h3 class="text-white">CREATE A PROJECT</h3>
    </div>
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- title --}}
            <div class=" mb-3">
                <label for="inputEmail4" class="border rounded">Title</label>
                <input type="text" name="title" class="ps-2 pt-1 pb-1 col-8 border-danger-b rounded @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="title" id="inputEmail4" required>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- description --}}
            <div class="input-group mb-3">
                <label for="descTextArea">Description</label>
                <textarea class="ps-1 border-danger-b rounded" rows="4" cols="88" name="description" placeholder="description" value="{{old('description')}}" id="descTextArea"></textarea>
            </div>

        <div class="d-flex row mb-3">
                {{-- staff --}}
            <div class="mb-3">
                <label for="staffInput" class="border rounded">Collaborators</label>
                <input type="text" name="staff" class="ps-2 pt-1 pb-1 col-8 border-danger-b rounded" id="staffInput" value="{{old('staff')}}" placeholder="collaborators">
            </div>
            <div class="mb-1">
                <label for="formFile" class="border rounded">Immage</label>
                <input class=" col-8 border-danger-b rounded @error('img') is-invalid @enderror" name="img" value="{{old('img')}}" type="file" id="formFile" placeholder="choose img">
              </div>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- type --}}
        <div class="mb-3 col-12">
            <select class=" ps-2 pt-1 pb-1 col-8 border-danger-b rounded" aria-label="Default select example" name="type_id">
                @foreach ( $type as $types )
                    <option value="{{$types->id}}" @if (old('types_id') == $types->id) selected @endif>{{$types->name}}</option>
                @endforeach
            </select>
        </div>
        {{-- tecnologies --}}
       <div class="mb-3">
            <div>
                <p class="fs-5 text-black">Tecnologies</p>
            </div>
            @foreach ($tecnology as $tecnologies)
                <div class="form-check form-check-inline">
                        <label class="form-check-label text-white d-inline" for="inlineCheckbox2">{{$tecnologies->title}}</label>
                        <input class="form-check-input" type="checkbox" name="tecnologies[]" value="{{$tecnologies->id}}" 
                        {{in_array($tecnologies->id, old('tecnologies', []))? 'checked': ''}}>
                </div>
            @endforeach
       </div>
        <div class="col-12">
            <button type="submit" class="border-0 ps-2 pe-2 pb-1 pt-1 text-white button-create">Sign in</button>
        </div>
    </form>
@endsection


