@extends('student.layouts.app')
@section('breadcrumbs', Breadcrumbs::render('student.enroll-courses.edit', $student->id))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Enroll Course</h3>
                    <a href="{{ route('student.enroll-courses.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('student.enroll-courses.update', $student->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('user_id') has-danger @enderror">
                                    <label for="user_id" class="form-control-label">Student</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                        name="user_id" value="{{ @old('user_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\User::role('student')->get() as $index => $user)
                                            <option value="{{ $user->id }}" {{ selected($user->id, $student->id) }}>
                                                {{ $index + 1 }} . {{ $user->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('course_id') has-danger @enderror">
                                    <label for="course_id" class="form-control-label">Course Title</label>
                                    <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                                        name="course_id[]" multiple value="{{ @old('course_id') }}" required>
                                        @foreach (\App\Models\Course::get() as $index => $course)
                                            <option value="{{ $course->id }}"
                                                {{ selected($course->id, $student->courses->pluck('id')->all()) }}>
                                                {{ $index + 1 }} . {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
