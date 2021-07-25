@extends("teacher.layouts.app")
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Teacher</h3>
                    <a href="{{ route('teacher.teachers.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">User</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10 rounded-circle">
                                                @empty($teacher->image)
                                                    <a href="{{ route('teacher.teachers.show', $teacher->id) }}"
                                                        class="btn p-2 text-center rounded-circle btn-{{ randomColor($teacher->id) }}"
                                                        style="width: 40px;">
                                                        {{ substr($teacher->fullName(), 0, 2) }}
                                                    </a>
                                                @else
                                                    <a class="" href="{{ route('teacher.teachers.show', $teacher->id) }}">
                                                        <img src="{{ asset($teacher->image()) }}" alt="users"
                                                            class="rounded-circle" width="40" />
                                                    </a>
                                                @endempty
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $teacher->fullName() }}</td>
                                    <td>{{ $teacher->email }}</td>

                                    <td class="d-flex justify-content-around">

                                        <a href="{{ route('teacher.teachers.show', $teacher->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('teacher.teachers.edit', $teacher->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('teacher.teachers.destroy', $teacher->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $teacher->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $teacher->id }}"
                                            action="{{ route('teacher.teachers.destroy', $teacher->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
