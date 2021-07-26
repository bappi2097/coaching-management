@extends("guardian.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('guardian.results'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Result</h3>
                    {{-- <a href="{{ route('guardian.results.create') }}" class="btn btn-primary">Add Data</a> --}}
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">User</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Exam</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Marks</th>
                                {{-- <th class="border-top-0">Action</th> --}}
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10 rounded-circle">
                                                @empty($result->student->image)
                                                    <span
                                                        class="btn p-2 text-center rounded-circle btn-{{ randomColor($result->student->id) }}"
                                                        style="width: 40px;">
                                                        {{ substr($result->student->fullName(), 0, 2) }}
                                                    </span>
                                                @else
                                                    <span>
                                                        <img src="{{ asset($student->image()) }}" alt="users"
                                                            class="rounded-circle" width="40" />
                                                    </span>
                                                @endempty
                                            </div>
                                            {{ $result->student->fullName() }}
                                        </div>
                                    </td>
                                    <td>{{ $result->student->email }}</td>
                                    <td>{{ $result->exam->examType->name }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($result->exam->exam_date)) }}</td>
                                    <td>{{ $result->marks }}</td>
                                    {{-- <td class="d-flex justify-content-around">
                                        <a href="{{ route('guardian.results.show', $result->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('guardian.results.edit', $result->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('guardian.results.destroy', $result->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $result->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $result->id }}"
                                            action="{{ route('guardian.results.destroy', $result->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
