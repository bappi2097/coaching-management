@extends("student.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('student.exam-types.create'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Exam Type</h3>
                    <a href="{{ route('student.exam-types.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('student.exam-types.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group @error('name') has-danger @enderror">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                                name="name" value="{{ @old('name') }}" required>
                            @error('name')
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
