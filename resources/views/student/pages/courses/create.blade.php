@extends("student.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('student.courses.create'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course</h3>
                    <a href="{{ route('student.courses.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('student.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group @error('title') has-danger @enderror">
                            <label for="title" class="form-control-label">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" id="title"
                                name="title" value="{{ @old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('description') has-danger @enderror">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                id="description" name="description" required> {{ @old('description') }} </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('course_fee') has-danger @enderror">
                            <label for="course_fee" class="form-control-label">Course Fee</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control @error('course_fee') is-invalid @enderror"
                                    aria-label="Amount" name="course_fee" value="{{ @old('course_fee') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                                @error('course_fee')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <div class="mb-3 custom-file @error('image') has-danger @enderror">
                                <label for="image" class="custom-file-label">Image</label>
                                <input class="custom-file-input @error('image') is-invalid @enderror" type="file" id="image"
                                    name="image" accept="image/*">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('is_active') has-danger @enderror">
                            <label class="custom-toggle">
                                <input type="checkbox" name="is_active" checked>
                                <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                    data-label-on="Yes"></span>
                            </label>
                            @error('is_active')
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
