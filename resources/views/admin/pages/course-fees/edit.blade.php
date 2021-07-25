@extends('admin.layouts.app')
@section('breadcrumbs', Breadcrumbs::render('officer.course-fees.edit', $courseFee->student->id))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course Fees</h3>
                    <a href="{{ route('officer.course-fees.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('officer.course-fees.update', $courseFee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('user_id') has-danger @enderror">
                                    <label for="user_id" class="form-control-label">Full Name</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                        name="user_id" value="{{ @old('user_id') }}" required>
                                        <option selected>--Select--</option>
                                        @foreach (\App\Models\User::role('student')->get() as $index => $user)
                                            <option value="{{ $user->id }}"
                                                {{ selected($user->id, $courseFee->user_id) }}>
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
                                        name="course_id" value="{{ @old('course_id') }}" required>
                                        @foreach (\App\Models\Course::get() as $index => $course)
                                            <option value="{{ $course->id }}"
                                                {{ selected($course->id, $courseFee->course_id) }}>
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
                        <div class="form-group @error('payment_amount') has-danger @enderror">
                            <label for="payment_amount" class="form-control-label">Course Fee</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control @error('payment_amount') is-invalid @enderror"
                                    aria-label="Amount" name="payment_amount"
                                    value="{{ @old('payment_amount') ?? $courseFee->payment_amount }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                                @error('payment_amount')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('transaction_id') has-danger @enderror">
                            <label for="transaction_id" class="form-control-label">Transaction Id</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('transaction_id') is-invalid @enderror"
                                    name="transaction_id"
                                    value="{{ @old('transaction_id') ?? $courseFee->transaction_id }}">
                                @error('transaction_id')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('payment_date') has-danger @enderror">
                            <label for="payment_date" class="form-control-label">Date</label>
                            <input class="form-control @error('payment_date') is-invalid @enderror" type="datetime-local"
                                value="{{ @old('payment_date') ?? date('Y-m-d\TH:i:s', strtotime($courseFee->payment_date)) }}"
                                name="payment_date" id="payment_date">
                            @error('payment_date')
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
