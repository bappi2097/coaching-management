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
                        <a class="nav-link {{ set_active('student/dashboard') }}" href="{{ dashboardURL() }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('student/exams') }}"
                            href="{{ route('student.exams.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exams</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('student/results') }}"
                            href="{{ route('student.results.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Results</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('student/course-fees') }}"
                            href="{{ route('student.course-fees.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Course Fees</span>
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
