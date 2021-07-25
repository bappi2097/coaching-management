@extends("admin.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('officer.exams'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Student</h3>
                    <a href="{{ route('officer.exams.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">Type</th>
                                <th class="border-top-0">Course</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Marks</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->examType->name }}</td>
                                    <td>{{ $exam->course->title }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($exam->exam_date)) }}</td>
                                    <td>{{ $exam->marks }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('officer.exams.show', $exam->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('officer.exams.edit', $exam->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('officer.exams.destroy', $exam->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $exam->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $exam->id }}"
                                            action="{{ route('officer.exams.destroy', $exam->id) }}" method="POST"
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
