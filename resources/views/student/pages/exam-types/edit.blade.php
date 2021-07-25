@extends('student.layouts.app')
@section('breadcrumbs', Breadcrumbs::render('student.exam-types.edit', $examType->id))
@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('dashboard/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                    class="card-img-top">
                <div class="card-body mt-3 pt-0">
                    <div class="text-center">
                        <h5 class="h3">Name: {{ $examType->name }}</span></h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location-pin mr-2"></i>Slug: {{ $examType->slug }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course</h3>
                    <a href="{{ route('student.exam-types.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('student.exam-types.update', $examType->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group @error('name') has-danger @enderror">
                            <label for="name" class="form-control-label">Title</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                                name="name" value="{{ $examType->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('slug') has-danger @enderror">
                            <label for="slug" class="form-control-label">Slug</label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" id="slug"
                                name="slug" value="{{ $examType->slug }}" required>
                            @error('slug')
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
