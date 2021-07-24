@extends('admin.layouts.app')
@section('breadcrumbs', Breadcrumbs::render('officer.students.edit', $student->id))
@section('content')

    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('dashboard/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                    class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="javascript::void(0);" onclick="document.getElementById('user-image-btn').click();">
                                <img id="user-image" class="rounded-circle" alt="{{ $student->name }}"
                                    src="{{ asset($student->image()) }}" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-7 pt-0">
                    <div class="text-center">
                        <h5 class="h3">{{ $student->fullName() }}</span></h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ $student->email }}
                        </div>
                        <h5 class="h3">Guardian: {{ $student->guardian->fullName() }}</span></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Student Profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('officer.students.update', $student->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type='file' name="image" id="user-image-btn" style="display: none;" onchange="readURL(this);"
                            accept="image/*" />
                        <h6 class="heading-small text-muted mb-4">Teacher information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group @error('first_name') has-danger @enderror">
                                        <label class="form-control-label" for="input-first-name">First name</label>
                                        <input type="text" id="input-first-name"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            placeholder="First name" value="{{ $student->first_name }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group @error('last_name') has-danger @enderror">
                                        <label class="form-control-label" for="input-last-name">Last name</label>
                                        <input type="text" id="input-last-name"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            placeholder="Last name" name="last_name" value="{{ $student->last_name }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group @error('email') has-danger @enderror">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="jhon.doe@mail.com" value="{{ $student->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h3>Guardian Info</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('guardian_first_name') has-danger @enderror">
                                        <label for="guardian_first_name" class="form-control-label">First Name</label>
                                        <input class="form-control @error('guardian_first_name') is-invalid @enderror"
                                            type="text" id="guardian_first_name" name="guardian_first_name"
                                            value="{{ $student->guardian->first_name }}" required>
                                        @error('guardian_first_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('guardian_last_name') has-danger @enderror">
                                        <label for="guardian_last_name" class="form-control-label">Last Name</label>
                                        <input class="form-control @error('guardian_last_name') is-invalid @enderror"
                                            type="text" id="guardian_last_name" name="guardian_last_name"
                                            value="{{ $student->guardian->last_name }}">
                                        @error('guardian_last_name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary">Save</button>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                    </form>
                    <form method="POST" action="{{ route('officer.students.update-password', $student->id) }}">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Change Password</h6>
                        <div class="pl-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group @error('old_password') has-danger @enderror">
                                        <label class="form-control-label" for="input-old-password">Old Password</label>
                                        <input type="password" id="input-old-password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group @error('password') has-danger @enderror">
                                        <label class="form-control-label" for="input-new-password">New Password</label>
                                        <input type="password" id="input-new-password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group @error('password_confirmation') has-danger @enderror">
                                        <label class="form-control-label" for="input-confirm-password">Confirm
                                            Password</label>
                                        <input type="password" id="input-confirm-password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary">Save</button>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
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
