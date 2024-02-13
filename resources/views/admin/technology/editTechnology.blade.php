@extends('layouts.admin')
@section('content')
    <form class="mt-5" action="{{route('admin.technologies.update', $technology->slug)}}" method="POST">
        @csrf
        @method('PUT')
            <label for="typesText">Technology</label>
            <input type="text" name="title" id="typesText" class=" @error('title') is-invalid @enderror"  value="{{$technology->title}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Send</button>
    </form>
@endsection