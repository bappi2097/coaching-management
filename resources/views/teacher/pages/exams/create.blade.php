@extends("teacher.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('teacher.exams.create'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Exam</h3>
                    <a href="{{ route('teacher.exams.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('teacher.exams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('exam_type_id') has-danger @enderror">
                                    <label for="exam_type_id" class="form-control-label">Exam Type</label>
                                    <select class="form-control @error('exam_type_id') is-invalid @enderror"
                                        id="exam_type_id" name="exam_type_id" value="{{ @old('exam_type_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\ExamType::get() as $index => $exam_type)
                                            <option value="{{ $exam_type->id }}">
                                                {{ $index + 1 }} . {{ $exam_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('exam_type_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('course_id') has-danger @enderror">
                                    <label for="course_id" class="form-control-label">Course Title</label>
                                    <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                                        name="course_id" value="{{ @old('course_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\Course::get() as $index => $course)
                                            <option value="{{ $course->id }}">
                                                {{ $index + 1 }} . {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error('marks') has-danger @enderror">
                            <label for="marks" class="form-control-label">Marks</label>
                            <input class="form-control @error('marks') is-invalid @enderror" type="number"
                                value="{{ @old('marks') }}" id="marks" name="marks">
                            @error('marks')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('exam_date') has-danger @enderror">
                            <label for="exma_date" class="form-control-label">Exam Datetime</label>
                            <input class="form-control @error('exam_date') is-invalid @enderror" type="datetime-local"
                                value="{{ @old('exam_date') }}" name="exam_date" id="exma_date">
                            @error('exam_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
