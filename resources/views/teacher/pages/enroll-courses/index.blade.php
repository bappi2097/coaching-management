@extends("teacher.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('teacher.enroll-courses'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Student</h3>
                    <a href="{{ route('teacher.enroll-courses.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">User</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Enroll Coourse</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10 rounded-circle">
                                                @empty($student->image)
                                                    <a href="{{ route('teacher.enroll-courses.show', $student->id) }}"
                                                        class="btn p-2 text-center rounded-circle btn-{{ randomColor($student->id) }}"
                                                        style="width: 40px;">
                                                        {{ substr($student->fullName(), 0, 2) }}
                                                    </a>
                                                @else
                                                    <a class=""
                                                        href="{{ route('teacher.enroll-courses.show', $student->id) }}">
                                                        <img src="{{ asset($student->image()) }}" alt="users"
                                                            class="rounded-circle" width="40" />
                                                    </a>
                                                @endempty
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $student->fullName() }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->courses()->count() }}</td>
                                    <td class="d-flex justify-content-around">

                                        <a href="{{ route('teacher.enroll-courses.show', $student->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('teacher.enroll-courses.edit', $student->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        {{-- <a href="{{ route('teacher.enroll-courses.destroy', $student->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $student->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $student->id }}"
                                            action="{{ route('teacher.enroll-courses.destroy', $student->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
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
