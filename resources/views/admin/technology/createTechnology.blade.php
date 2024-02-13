@extends('layouts.admin')
@section('content')
    <div class="mt-3 mb-3">
        <h3 class="text-white">CREATE A TECHNOLOGY</h3>
    </div>
    <form class="mt-5" action="{{route('admin.technologies.store')}}" method="POST">
        @csrf
            <label for="typesText">Technology</label>
            <input type="text" class=" @error('title') is-invalid @enderror" name="title" id="typesText">
            <button type="submit">Send</button>
            <div class="mt-2">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    </form>
@endsection