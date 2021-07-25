@extends("student.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('student.exam-types'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Exam Type</h3>
                    <a href="{{ route('student.exam-types.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Slug</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examTypes as $examType)
                                <tr>
                                    <td>{{ $examType->name }}</td>
                                    <td>{{ $examType->slug }}</td>

                                    <td class="d-flex justify-content-around">

                                        <a href="{{ route('student.exam-types.show', $examType->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('student.exam-types.edit', $examType->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('student.exam-types.destroy', $examType->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $examType->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $examType->id }}"
                                            action="{{ route('student.exam-types.destroy', $examType->id) }}"
                                            method="POST" class="d-none">
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
