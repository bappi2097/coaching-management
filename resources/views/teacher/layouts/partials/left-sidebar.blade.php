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
                        <a class="nav-link {{ set_active('teacher/dashboard') }}" href="{{ dashboardURL() }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.students.index') }}"
                            class="nav-link {{ set_active('teacher/students') }}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('teacher/exam-types') }}"
                            href="{{ route('teacher.exam-types.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exam Types</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('teacher/exams') }}"
                            href="{{ route('teacher.exams.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exams</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('teacher/results') }}"
                            href="{{ route('teacher.results.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Results</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('teacher/attendences') }}"
                            href="{{ route('teacher.attendences.index') }}">
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
