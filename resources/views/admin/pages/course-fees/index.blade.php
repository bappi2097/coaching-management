@extends("admin.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('officer.course-fees'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course Fee</h3>
                    <a href="{{ route('officer.course-fees.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                            <tr class="bg-light">
                                <th class="border-top-0">User</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Coourse</th>
                                <th class="border-top-0">Transaction</th>
                                <th class="border-top-0">Payment</th>
                                <th class="border-top-0">Month</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseFees as $courseFee)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10 rounded-circle">
                                                @empty($courseFee->student->image)
                                                    <a href="{{ route('officer.course-fees.show', $courseFee->student->id) }}"
                                                        class="btn p-2 text-center rounded-circle btn-{{ randomColor($courseFee->student->id) }}"
                                                        style="width: 40px;">
                                                        {{ substr($courseFee->student->fullName(), 0, 2) }}
                                                    </a>
                                                @else
                                                    <a class=""
                                                        href="{{ route('officer.course-fees.show', $courseFee->student->id) }}">
                                                        <img src="{{ asset($courseFee->student->image()) }}" alt="users"
                                                            class="rounded-circle" width="40" />
                                                    </a>
                                                @endempty
                                            </div>
                                            {{ $courseFee->student->fullName() }}
                                        </div>
                                    </td>
                                    <td>{{ $courseFee->student->email }}</td>
                                    <td>{{ $courseFee->course->title }}</td>
                                    <td>{{ $courseFee->transaction_id }}</td>
                                    <td>{{ $courseFee->payment_amount }} / {{ $courseFee->course->course_fee }}</td>

                                    <td>{{ date('M Y', strtotime($courseFee->payment_date)) }}</td>
                                    <td class="d-flex justify-content-around">

                                        <a href="{{ route('officer.course-fees.show', $courseFee->id) }}"
                                            class="btn btn-sm btn-success text-white" title="show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('officer.course-fees.edit', $courseFee->id) }}"
                                            class="btn btn-sm btn-info text-white" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('officer.course-fees.destroy', $courseFee->id) }}"
                                            class="btn btn-sm btn-danger text-white" title="destroy"
                                            onclick="event.preventDefault(); document.getElementById('destroy-item{{ $courseFee->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="destroy-item{{ $courseFee->id }}"
                                            action="{{ route('officer.course-fees.destroy', $courseFee->id) }}"
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
