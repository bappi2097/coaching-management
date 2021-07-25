<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="{{ dashboardURL() }}">
                <img src="{{ asset('dashboard/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/dashboard') }}" href="{{ dashboardURL() }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="examples/icons.html">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Icons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#users" data-toggle="collapse" role="button"
                            aria-expanded="{{ dropdownActive('officer/teachers') ? 'true' : 'false' }}"
                            aria-controls="users">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                        <div class="collapse {{ dropdownActive('officer/teachers') || dropdownActive('officer/students') ? 'show' : '' }}"
                            id="users">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('officer.teachers.index') }}"
                                        class="nav-link {{ set_active('officer/teachers') }}">
                                        <i class="ni ni-single-02 text-yellow"></i>
                                        <span class="nav-link-text">Teachers</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('officer.students.index') }}"
                                        class="nav-link {{ set_active('officer/students') }}">
                                        <i class="ni ni-single-02 text-yellow"></i>
                                        <span class="nav-link-text">Students</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/courses') }}"
                            href="{{ route('officer.courses.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Course</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/enroll-courses') }}"
                            href="{{ route('officer.enroll-courses.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Enroll Course</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/exam-types') }}"
                            href="{{ route('officer.exam-types.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exam Types</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/exams') }}"
                            href="{{ route('officer.exams.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exams</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/results') }}"
                            href="{{ route('officer.results.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Results</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('officer/attendences') }}"
                            href="{{ route('officer.attendences.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Attendences</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
            </div>
        </div>
    </div>
</nav>
