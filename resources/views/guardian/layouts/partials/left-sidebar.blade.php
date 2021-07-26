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
                        <a class="nav-link {{ set_active('guardian/dashboard') }}" href="{{ dashboardURL() }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('guardian/enroll-courses') }}"
                            href="{{ route('guardian.enroll-courses.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Enroll Course</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ set_active('guardian/exams') }}"
                            href="{{ route('guardian.exams.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Exams</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('guardian/results') }}"
                            href="{{ route('guardian.results.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Results</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('guardian/attendences') }}"
                            href="{{ route('guardian.attendences.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Attendences</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('guardian/course-fees') }}"
                            href="{{ route('guardian.course-fees.index') }}">
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
