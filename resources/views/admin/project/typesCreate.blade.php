@extends('layouts.admin')
@section('content')
    <div class="mt-3 mb-3">
        <h3 class="text-white">CREATE A TYPE</h3>
    </div>
    <form class="mt-5" action="{{route('admin.types.store')}}" method="POST">
        @csrf
        <label for="typesText">Type</label>
        <input type="text" name="name" id="typesText" placeholder="Type">
        <button type="submit">send</button>
    </form>
@endsection