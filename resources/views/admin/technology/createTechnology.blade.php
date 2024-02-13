@extends('layouts.admin')
@section('content')
    <form class="mt-5" action="{{route('admin.technologies.store')}}" method="POST">
        @csrf
            <label for="typesText">Technology</label>
            <input type="text" class=" @error('title') is-invalid @enderror" name="title" id="typesText">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Send</button>
    </form>
@endsection