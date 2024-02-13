@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="toast show mt-3 align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <p class="text-black fs-6 fw-medium">{{session('message')}} --->è stato eliminato correttamente</p>
      </div>
      <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
@endif
    <div>
        <button type="button"> 
            <a class="text-black nav-link " href="{{route('admin.technologies.create')}}">add technology</a>
        </button>
    </div>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">slug</th>
                <th scope="col">operations</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($technology as $technologies)
            <tr>
                <td>
                    <div>
                        {{$technologies->id}}
                    </div>
                </td>
                <td>
                    <div>
                        {{$technologies->title}}
                    </div>
                </td>
                <td>
                    <div>
                        {{$technologies->slug}}
                    </div>
                </td>
                  {{-- button show, update, delete --}}
                  <td class="table-active">
                    <div class=" d-flex flex-column align-items-center btn-group" role="group" aria-label="Basic mixed styles example">
                        {{-- show --}}
                        <button type="submit" class="font-s-12-w-60 border-0 text-bg-primary mb-1">
                            <a class="text-black nav-link " href="{{ route('admin.technologies.show', $technologies->slug) }}">Info</a>
                        </button>
                        {{-- delete --}}
                        <div>
                            <form action="{{route('admin.technologies.destroy', $technologies->slug)}}" method="POST" class="mb-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-s-12-w-60 border-0 bg-danger">Delete</button>
                            </form>
                          </div>
                          {{-- update --}}
                        <button type="submit" class="font-s-12-w-60 border-0 text-bg-warning">
                            <a class="text-black nav-link "href="{{ route('admin.technologies.edit',  $technologies->slug) }}">Update</a>
                        </button> 
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
@endsection