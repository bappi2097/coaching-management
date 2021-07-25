@extends("admin.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('officer.teachers.create'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Teacher</h3>
                    <a href="{{ route('officer.teachers.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('officer.teachers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('first_name') has-danger @enderror">
                                    <label for="first_name" class="form-control-label">First Name</label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                        id="first_name" name="first_name" value="{{ @old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('last_name') has-danger @enderror">
                                    <label for="last_name" class="form-control-label">Last Name</label>
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                        id="last_name" name="last_name" value="{{ @old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error('email') has-danger @enderror">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                                name="email" value="{{ @old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 custom-file @error('image') has-danger @enderror">
                            <label for="image" class="custom-file-label">Image</label>
                            <input class="custom-file-input @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('password') has-danger @enderror">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        id="password" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('password_confirmation') has-danger @enderror">
                                    <label for="password_confirmation" class="form-control-label">Confirm Password</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                        type="password" id="password_confirmation" name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error('assign_course') has-danger @enderror">
                            <label class="form-control-label" for="assign_course">Assign Course</label>
                            <select type="assign_course" id="assign_course"
                                class="form-control @error('assign_course') is-invalid @enderror" name="assign_course[]"
                                multiple>
                                @foreach (\App\Models\Course::all() as $index => $course)
                                    <option value="{{ $course->id }}">
                                        {{ $index + 1 }} . {{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('assign_course')
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
