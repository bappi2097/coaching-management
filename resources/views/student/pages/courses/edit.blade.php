@extends('student.layouts.app')
@section('breadcrumbs', Breadcrumbs::render('student.courses.edit', $course->id))
@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset($course->image) }}" alt="Image placeholder" class="card-img-top">
                <div class="card-body mt-3 pt-0">
                    <div class="text-center">
                        <h5 class="h3">{{ $course->title }}</span></h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ $course->description }}
                        </div>
                        <h4 class="h3">Course Fee: {{ $course->course_fee }} Tk.</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course</h3>
                    <a href="{{ route('student.courses.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('student.courses.update', $course->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group @error('title') has-danger @enderror">
                            <label for="title" class="form-control-label">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" id="title"
                                name="title" value="{{ $course->title }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('description') has-danger @enderror">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                id="description" name="description" required> {{ $course->description }} </textarea>
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
                                    aria-label="Amount" name="course_fee" value="{{ $course->course_fee }}">
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
                                <input type="checkbox" name="is_active" {{ $course->is_active ? 'checked' : '' }}>
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

@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
