@extends('layouts.admin')
@section('content')
    <div class="mt-3 mb-3">
        <h3 class="text-white">EDIT TECHNOLOGY</h3>
    </div>
    <form class="mt-5" action="{{route('admin.technologies.update', $technology->slug)}}" method="POST">
        @csrf
        @method('PUT')
            <label for="typesText">Technology</label>
            <input type="text" name="title" id="typesText" class=" @error('title') is-invalid @enderror"  value="{{$technology->title}}">
            <button type="submit">Send</button>
            <div class="mt-2">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    </form>
@endsection