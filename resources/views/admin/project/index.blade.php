@extends('layouts.admin')


@section('content')
    @if (session('message'))
        <div class="toast show mt-3 align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body">
                <p class="text-black fs-6 fw-medium">il progetto: {{session('message')}} --->è stato eliminato correttamente</p>
              </div>
              <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div>
    @endif
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">slug</th>
                <th scope="col">description</th>
                <th scope="col">immage</th>
                <th scope="col">staff</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($project as $projects)
            <tr>
                <td>
                    <div>
                        {{ $projects->id }}
                    </div>
                </td>
                <td>
                   <div>
                        {{ $projects->title }}
                   </div>
                </td>
                <td>
                  <div>
                    {{ $projects->slug }}
                  </div>
                </td>
                <td class="text-break">
                    <div class="height-overflow">
                        {{ $projects->description }}
                    </div>
                </td>
                <td>
                    {{ $projects->img }}
                </td>
                <td>
                    {{ $projects->staff }}
                </td>
                <td colspan="2" class="table-active">
                    <div class=" d-flex flex-column align-items-center btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="submit" class="font-s-12-w-60 border-0 text-bg-primary mb-1">
                            <a class="text-black nav-link " href="{{ route('admin.projects.show', $projects->slug) }}">Info</a>
                        </button>
                        <div>
                            <form action="{{route('admin.projects.destroy', $projects->slug)}}" method="POST" class="mb-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-s-12-w-60 border-0 bg-danger">Delete</button>
                            </form>
                          </div>
                        <button type="submit" class="font-s-12-w-60 border-0 text-bg-warning">
                            <a class="text-black nav-link "href="{{ route('admin.projects.edit',  $projects->slug) }}">Update</a>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
@endsection