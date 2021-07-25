@extends("admin.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('officer.courses.show', $course->id))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-3">Course</h3>
                    <a href="{{ route('officer.courses.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="card card-profile">
                    <img src="{{ asset($course->image) }}" alt="Image placeholder" class="card-img-top">
                    <div class="card-body mt-7 pt-0">
                        <div class="text-center">
                            <h5 class="h3">{{ '' }}</span></h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $course->title }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
