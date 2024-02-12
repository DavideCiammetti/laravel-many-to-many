@extends('layouts.admin')


@section('content')
    <form class="mt-5" action="{{route('admin.types.store')}}" method="POST">
        @csrf
        <label for="typesText">Type</label>
        <input type="text" name="name" id="typesText" placeholder="Type">
        <button type="submit">send</button>
    </form>
@endsection