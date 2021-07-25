@extends("teacher.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('teacher.results.create'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Exam</h3>
                    <a href="{{ route('teacher.results.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('teacher.results.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('exam_id') has-danger @enderror">
                                    <label for="exam_id" class="form-control-label">Exam</label>
                                    <select class="form-control @error('exam_id') is-invalid @enderror" id="exam_id"
                                        name="exam_id" value="{{ @old('exam_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\Exam::with(['examType'])->get() as $index => $exam)
                                            <option value="{{ $exam->id }}">
                                                {{ $index + 1 }} . {{ $exam->examType->name }}&nbsp;(
                                                {{ date('F j, Y', strtotime($exam->exam_date)) }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('exam_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('user_id') has-danger @enderror">
                                    <label for="user_id" class="form-control-label">User</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                        name="user_id" value="{{ @old('user_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\User::role('student')->get() as $index => $user)
                                            <option value="{{ $user->id }}">
                                                {{ $index + 1 }} . {{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error('marks') has-danger @enderror">
                            <label for="marks" class="form-control-label">Marks</label>
                            <input class="form-control @error('marks') is-invalid @enderror" type="number"
                                value="{{ @old('marks') ?? 0 }}" id="marks" name="marks">
                            @error('marks')
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
