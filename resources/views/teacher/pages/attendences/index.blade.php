@extends("teacher.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('teacher.attendences'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Attendences</h3>
                    <form action="{{ route('teacher.attendences.index') }}">
                        <div class="form-group">
                            <label for="course_id" class="form-conrol-label">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option selected>--Select--</option>
                                @foreach (auth()->user()->assignCourses as $index => $assignCourse)
                                    <option {{ empty($data) ? '' : selected($data['course_id'], $assignCourse->id) }}
                                        value="{{ $assignCourse->id }}">
                                        {{ $index + 1 }} . {{ $assignCourse->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group @error('attendence_date') has-danger @enderror">
                            <label for="attendence_date" class="form-control-label">Date</label>
                            <input class="form-control @error('attendence_date') is-invalid @enderror" type="datetime-local"
                                value="{{ empty($data) ? @old('attendence_date') : date('Y-m-d\TH:i:s', strtotime($data['attendence_date'])) }}"
                                name="attendence_date" id="attendence_date">
                            @error('attendence_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Next</button>
                    </form>
                    {{-- <a href="{{ route('teacher.attendences.create') }}" class="btn btn-primary">Add Data</a> --}}
                </div>
                <form action="{{ route('teacher.attendences.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ empty($data) ? '' : $data['course_id'] }}">
                    <input type="hidden" name="attendence_date"
                        value="{{ empty($data) ? '' : $data['attendence_date'] }}">
                    <div class="table-responsive py-4">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr class="bg-light">
                                    <th class="border-top-0 d-flex align-items-center justify-items-center">
                                        <div>
                                            <input type="checkbox" id="customCheck" name="customCheck">
                                        </div>
                                        &nbsp;&nbsp;&nbsp;Check All
                                    </th>
                                    <th class="border-top-0">SL</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($course))
                                    @foreach ($course->users as $index => $student)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="present" name="present[{{ $student->id }}]"
                                                    {{ selected($student->id, $attedence_ids, 'checked') }}>
                                            </td>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->fullName() }}</td>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <button class="btn btn-primary m-3 float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var customCheck = $("#customCheck");
            var listCheckItems = $(".present");
            customCheck.on("click", function() {
                var isMasterChecked = $(this).is(":checked");
                listCheckItems.prop("checked", isMasterChecked);
                getSelectedItems();
            });
            listCheckItems.on("change", function() {
                var totalItems = listCheckItems.length;
                var checkedItems = listCheckItems.filter(":checked").length;
                if (totalItems == checkedItems) {
                    customCheck.prop("indeterminate", false);
                    customCheck.prop("checked", true);
                } else if (checkedItems > 0 && checkedItems < totalItems) {
                    customCheck.prop("indeterminate", true);
                } else {
                    customCheck.prop("indeterminate", false);
                    customCheck.prop("checked", false);
                }
                getSelectedItems();
            });

            function getSelectedItems() {
                var getCheckedValues = [];
                getCheckedValues = [];
                listCheckItems.filter(":checked").each(function() {
                    getCheckedValues.push($(this).val());
                });
                $("#selected-values").html(JSON.stringify(getCheckedValues));
            }
        });
    </script>
@endpush
