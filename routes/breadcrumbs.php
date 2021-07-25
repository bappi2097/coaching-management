<?php

/* -------------------------------------------------------------------------- */
/*                           Officer Breadcrumb Start                         */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('officer.dashboard', function ($trail) {
    $trail->push('Dashboard', route('officer.dashboard'));
});

// Profile
Breadcrumbs::for('officer.profile', function ($trail) {
    $trail->push('Profile', route('officer.profile'));
});

// Dashboard > Teacher
Breadcrumbs::for('officer.teachers', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Teacher', route('officer.teachers.index'));
});

// Dashboard > Teacher > Create
Breadcrumbs::for('officer.teachers.create', function ($trail) {
    $trail->parent('officer.teachers');
    $trail->push('Create', route('officer.teachers.create'));
});

// Dashboard > Teacher > Show
Breadcrumbs::for('officer.teachers.show', function ($trail, $id) {
    $trail->parent('officer.teachers');
    $trail->push('Show', route('officer.teachers.show', $id));
});


// Dashboard > Teacher > Edit
Breadcrumbs::for('officer.teachers.edit', function ($trail, $id) {
    $trail->parent('officer.teachers');
    $trail->push('Edit', route('officer.teachers.edit', $id));
});

// Dashboard > Student
Breadcrumbs::for('officer.students', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Student', route('officer.students.index'));
});

// Dashboard > Student > Create
Breadcrumbs::for('officer.students.create', function ($trail) {
    $trail->parent('officer.students');
    $trail->push('Create', route('officer.students.create'));
});

// Dashboard > Student > Show
Breadcrumbs::for('officer.students.show', function ($trail, $id) {
    $trail->parent('officer.students');
    $trail->push('Show', route('officer.students.show', $id));
});

// Dashboard > Student > Edit
Breadcrumbs::for('officer.students.edit', function ($trail, $id) {
    $trail->parent('officer.students');
    $trail->push('Edit', route('officer.students.edit', $id));
});

// Dashboard > Course
Breadcrumbs::for('officer.courses', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Course', route('officer.courses.index'));
});

// Dashboard > Course > Create
Breadcrumbs::for('officer.courses.create', function ($trail) {
    $trail->parent('officer.courses');
    $trail->push('Create', route('officer.courses.create'));
});

// Dashboard > Course > Show
Breadcrumbs::for('officer.courses.show', function ($trail, $id) {
    $trail->parent('officer.courses');
    $trail->push('Show', route('officer.courses.show', $id));
});

// Dashboard > Course > Edit
Breadcrumbs::for('officer.courses.edit', function ($trail, $id) {
    $trail->parent('officer.courses');
    $trail->push('Edit', route('officer.courses.edit', $id));
});


// Dashboard > Enroll Course
Breadcrumbs::for('officer.enroll-courses', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Enroll Course', route('officer.enroll-courses.index'));
});

// Dashboard > Enroll Course > Create
Breadcrumbs::for('officer.enroll-courses.create', function ($trail) {
    $trail->parent('officer.enroll-courses');
    $trail->push('Create', route('officer.enroll-courses.create'));
});

// Dashboard > Enroll Course > Show
Breadcrumbs::for('officer.enroll-courses.show', function ($trail, $student) {
    $trail->parent('officer.enroll-courses');
    $trail->push('Show', route('officer.enroll-courses.show', $student));
});

// Dashboard > Enroll Course > Edit
Breadcrumbs::for('officer.enroll-courses.edit', function ($trail, $student) {
    $trail->parent('officer.enroll-courses');
    $trail->push('Edit', route('officer.enroll-courses.edit', $student));
});

// Dashboard > Exam Type
Breadcrumbs::for('officer.exam-types', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Exam Type', route('officer.exam-types.index'));
});

// Dashboard > Exam Type > Create
Breadcrumbs::for('officer.exam-types.create', function ($trail) {
    $trail->parent('officer.exam-types');
    $trail->push('Create', route('officer.exam-types.create'));
});

// Dashboard > Exam Type > Show
Breadcrumbs::for('officer.exam-types.show', function ($trail, $id) {
    $trail->parent('officer.exam-types');
    $trail->push('Show', route('officer.exam-types.show', $id));
});

// Dashboard > Exam Type > Edit
Breadcrumbs::for('officer.exam-types.edit', function ($trail, $id) {
    $trail->parent('officer.exam-types');
    $trail->push('Edit', route('officer.exam-types.edit', $id));
});

// Dashboard > Exam
Breadcrumbs::for('officer.exams', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Exam', route('officer.exams.index'));
});

// Dashboard > Exam > Create
Breadcrumbs::for('officer.exams.create', function ($trail) {
    $trail->parent('officer.exams');
    $trail->push('Create', route('officer.exams.create'));
});

// Dashboard > Exam > Show
Breadcrumbs::for('officer.exams.show', function ($trail, $id) {
    $trail->parent('officer.exams');
    $trail->push('Show', route('officer.exams.show', $id));
});

// Dashboard > Exam > Edit
Breadcrumbs::for('officer.exams.edit', function ($trail, $id) {
    $trail->parent('officer.exams');
    $trail->push('Edit', route('officer.exams.edit', $id));
});


// Dashboard > Result
Breadcrumbs::for('officer.results', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Result', route('officer.results.index'));
});

// Dashboard > Result > Create
Breadcrumbs::for('officer.results.create', function ($trail) {
    $trail->parent('officer.results');
    $trail->push('Create', route('officer.results.create'));
});

// Dashboard > Result > Show
Breadcrumbs::for('officer.results.show', function ($trail, $id) {
    $trail->parent('officer.results');
    $trail->push('Show', route('officer.results.show', $id));
});

// Dashboard > Result > Edit
Breadcrumbs::for('officer.results.edit', function ($trail, $id) {
    $trail->parent('officer.results');
    $trail->push('Edit', route('officer.results.edit', $id));
});

// Dashboard > Attendence
Breadcrumbs::for('officer.attendences', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Attendence', route('officer.attendences.index'));
});


// Dashboard > Course Fee
Breadcrumbs::for('officer.course-fees', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Course Fee', route('officer.course-fees.index'));
});

// Dashboard > Course Fee > Create
Breadcrumbs::for('officer.course-fees.create', function ($trail) {
    $trail->parent('officer.course-fees');
    $trail->push('Create', route('officer.course-fees.create'));
});

// Dashboard > Course Fee > Show
Breadcrumbs::for('officer.course-fees.show', function ($trail, $id) {
    $trail->parent('officer.course-fees');
    $trail->push('Show', route('officer.course-fees.show', $id));
});

// Dashboard > Course Fee > Edit
Breadcrumbs::for('officer.course-fees.edit', function ($trail, $id) {
    $trail->parent('officer.course-fees');
    $trail->push('Edit', route('officer.course-fees.edit', $id));
});


/* -------------------------------------------------------------------------- */
/*                           Teacher Breadcrumb Start                         */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('teacher.dashboard', function ($trail) {
    $trail->push('Dashboard', route('teacher.dashboard'));
});

// Profile
Breadcrumbs::for('teacher.profile', function ($trail) {
    $trail->push('Profile', route('teacher.profile'));
});

// Dashboard > Teacher
Breadcrumbs::for('teacher.teachers', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Teacher', route('teacher.teachers.index'));
});

// Dashboard > Teacher > Create
Breadcrumbs::for('teacher.teachers.create', function ($trail) {
    $trail->parent('teacher.teachers');
    $trail->push('Create', route('teacher.teachers.create'));
});

// Dashboard > Teacher > Show
Breadcrumbs::for('teacher.teachers.show', function ($trail, $id) {
    $trail->parent('teacher.teachers');
    $trail->push('Show', route('teacher.teachers.show', $id));
});


// Dashboard > Teacher > Edit
Breadcrumbs::for('teacher.teachers.edit', function ($trail, $id) {
    $trail->parent('teacher.teachers');
    $trail->push('Edit', route('teacher.teachers.edit', $id));
});

// Dashboard > Student
Breadcrumbs::for('teacher.students', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Student', route('teacher.students.index'));
});

// Dashboard > Student > Create
Breadcrumbs::for('teacher.students.create', function ($trail) {
    $trail->parent('teacher.students');
    $trail->push('Create', route('teacher.students.create'));
});

// Dashboard > Student > Show
Breadcrumbs::for('teacher.students.show', function ($trail, $id) {
    $trail->parent('teacher.students');
    $trail->push('Show', route('teacher.students.show', $id));
});

// Dashboard > Student > Edit
Breadcrumbs::for('teacher.students.edit', function ($trail, $id) {
    $trail->parent('teacher.students');
    $trail->push('Edit', route('teacher.students.edit', $id));
});

// Dashboard > Course
Breadcrumbs::for('teacher.courses', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Course', route('teacher.courses.index'));
});

// Dashboard > Course > Create
Breadcrumbs::for('teacher.courses.create', function ($trail) {
    $trail->parent('teacher.courses');
    $trail->push('Create', route('teacher.courses.create'));
});

// Dashboard > Course > Show
Breadcrumbs::for('teacher.courses.show', function ($trail, $id) {
    $trail->parent('teacher.courses');
    $trail->push('Show', route('teacher.courses.show', $id));
});

// Dashboard > Course > Edit
Breadcrumbs::for('teacher.courses.edit', function ($trail, $id) {
    $trail->parent('teacher.courses');
    $trail->push('Edit', route('teacher.courses.edit', $id));
});


// Dashboard > Enroll Course
Breadcrumbs::for('teacher.enroll-courses', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Enroll Course', route('teacher.enroll-courses.index'));
});

// Dashboard > Enroll Course > Create
Breadcrumbs::for('teacher.enroll-courses.create', function ($trail) {
    $trail->parent('teacher.enroll-courses');
    $trail->push('Create', route('teacher.enroll-courses.create'));
});

// Dashboard > Enroll Course > Show
Breadcrumbs::for('teacher.enroll-courses.show', function ($trail, $student) {
    $trail->parent('teacher.enroll-courses');
    $trail->push('Show', route('teacher.enroll-courses.show', $student));
});

// Dashboard > Enroll Course > Edit
Breadcrumbs::for('teacher.enroll-courses.edit', function ($trail, $student) {
    $trail->parent('teacher.enroll-courses');
    $trail->push('Edit', route('teacher.enroll-courses.edit', $student));
});

// Dashboard > Exam Type
Breadcrumbs::for('teacher.exam-types', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Exam Type', route('teacher.exam-types.index'));
});

// Dashboard > Exam Type > Create
Breadcrumbs::for('teacher.exam-types.create', function ($trail) {
    $trail->parent('teacher.exam-types');
    $trail->push('Create', route('teacher.exam-types.create'));
});

// Dashboard > Exam Type > Show
Breadcrumbs::for('teacher.exam-types.show', function ($trail, $id) {
    $trail->parent('teacher.exam-types');
    $trail->push('Show', route('teacher.exam-types.show', $id));
});

// Dashboard > Exam Type > Edit
Breadcrumbs::for('teacher.exam-types.edit', function ($trail, $id) {
    $trail->parent('teacher.exam-types');
    $trail->push('Edit', route('teacher.exam-types.edit', $id));
});

// Dashboard > Exam
Breadcrumbs::for('teacher.exams', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Exam', route('teacher.exams.index'));
});

// Dashboard > Exam > Create
Breadcrumbs::for('teacher.exams.create', function ($trail) {
    $trail->parent('teacher.exams');
    $trail->push('Create', route('teacher.exams.create'));
});

// Dashboard > Exam > Show
Breadcrumbs::for('teacher.exams.show', function ($trail, $id) {
    $trail->parent('teacher.exams');
    $trail->push('Show', route('teacher.exams.show', $id));
});

// Dashboard > Exam > Edit
Breadcrumbs::for('teacher.exams.edit', function ($trail, $id) {
    $trail->parent('teacher.exams');
    $trail->push('Edit', route('teacher.exams.edit', $id));
});


// Dashboard > Result
Breadcrumbs::for('teacher.results', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Result', route('teacher.results.index'));
});

// Dashboard > Result > Create
Breadcrumbs::for('teacher.results.create', function ($trail) {
    $trail->parent('teacher.results');
    $trail->push('Create', route('teacher.results.create'));
});

// Dashboard > Result > Show
Breadcrumbs::for('teacher.results.show', function ($trail, $id) {
    $trail->parent('teacher.results');
    $trail->push('Show', route('teacher.results.show', $id));
});

// Dashboard > Result > Edit
Breadcrumbs::for('teacher.results.edit', function ($trail, $id) {
    $trail->parent('teacher.results');
    $trail->push('Edit', route('teacher.results.edit', $id));
});

// Dashboard > Attendence
Breadcrumbs::for('teacher.attendences', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Attendence', route('teacher.attendences.index'));
});


// Dashboard > Course Fee
Breadcrumbs::for('teacher.course-fees', function ($trail) {
    $trail->parent('teacher.dashboard');
    $trail->push('Course Fee', route('teacher.course-fees.index'));
});

// Dashboard > Course Fee > Create
Breadcrumbs::for('teacher.course-fees.create', function ($trail) {
    $trail->parent('teacher.course-fees');
    $trail->push('Create', route('teacher.course-fees.create'));
});

// Dashboard > Course Fee > Show
Breadcrumbs::for('teacher.course-fees.show', function ($trail, $id) {
    $trail->parent('teacher.course-fees');
    $trail->push('Show', route('teacher.course-fees.show', $id));
});

// Dashboard > Course Fee > Edit
Breadcrumbs::for('teacher.course-fees.edit', function ($trail, $id) {
    $trail->parent('teacher.course-fees');
    $trail->push('Edit', route('teacher.course-fees.edit', $id));
});


/* -------------------------------------------------------------------------- */
/*                           Student Breadcrumb Start                         */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('student.dashboard', function ($trail) {
    $trail->push('Dashboard', route('student.dashboard'));
});

// Profile
Breadcrumbs::for('student.profile', function ($trail) {
    $trail->push('Profile', route('student.profile'));
});

// Dashboard > Teacher
Breadcrumbs::for('student.teachers', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Teacher', route('student.teachers.index'));
});

// Dashboard > Teacher > Create
Breadcrumbs::for('student.teachers.create', function ($trail) {
    $trail->parent('student.teachers');
    $trail->push('Create', route('student.teachers.create'));
});

// Dashboard > Teacher > Show
Breadcrumbs::for('student.teachers.show', function ($trail, $id) {
    $trail->parent('student.teachers');
    $trail->push('Show', route('student.teachers.show', $id));
});


// Dashboard > Teacher > Edit
Breadcrumbs::for('student.teachers.edit', function ($trail, $id) {
    $trail->parent('student.teachers');
    $trail->push('Edit', route('student.teachers.edit', $id));
});

// Dashboard > Student
Breadcrumbs::for('student.students', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Student', route('student.students.index'));
});

// Dashboard > Student > Create
Breadcrumbs::for('student.students.create', function ($trail) {
    $trail->parent('student.students');
    $trail->push('Create', route('student.students.create'));
});

// Dashboard > Student > Show
Breadcrumbs::for('student.students.show', function ($trail, $id) {
    $trail->parent('student.students');
    $trail->push('Show', route('student.students.show', $id));
});

// Dashboard > Student > Edit
Breadcrumbs::for('student.students.edit', function ($trail, $id) {
    $trail->parent('student.students');
    $trail->push('Edit', route('student.students.edit', $id));
});

// Dashboard > Course
Breadcrumbs::for('student.courses', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Course', route('student.courses.index'));
});

// Dashboard > Course > Create
Breadcrumbs::for('student.courses.create', function ($trail) {
    $trail->parent('student.courses');
    $trail->push('Create', route('student.courses.create'));
});

// Dashboard > Course > Show
Breadcrumbs::for('student.courses.show', function ($trail, $id) {
    $trail->parent('student.courses');
    $trail->push('Show', route('student.courses.show', $id));
});

// Dashboard > Course > Edit
Breadcrumbs::for('student.courses.edit', function ($trail, $id) {
    $trail->parent('student.courses');
    $trail->push('Edit', route('student.courses.edit', $id));
});


// Dashboard > Enroll Course
Breadcrumbs::for('student.enroll-courses', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Enroll Course', route('student.enroll-courses.index'));
});

// Dashboard > Enroll Course > Create
Breadcrumbs::for('student.enroll-courses.create', function ($trail) {
    $trail->parent('student.enroll-courses');
    $trail->push('Create', route('student.enroll-courses.create'));
});

// Dashboard > Enroll Course > Show
Breadcrumbs::for('student.enroll-courses.show', function ($trail, $student) {
    $trail->parent('student.enroll-courses');
    $trail->push('Show', route('student.enroll-courses.show', $student));
});

// Dashboard > Enroll Course > Edit
Breadcrumbs::for('student.enroll-courses.edit', function ($trail, $student) {
    $trail->parent('student.enroll-courses');
    $trail->push('Edit', route('student.enroll-courses.edit', $student));
});

// Dashboard > Exam Type
Breadcrumbs::for('student.exam-types', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Exam Type', route('student.exam-types.index'));
});

// Dashboard > Exam Type > Create
Breadcrumbs::for('student.exam-types.create', function ($trail) {
    $trail->parent('student.exam-types');
    $trail->push('Create', route('student.exam-types.create'));
});

// Dashboard > Exam Type > Show
Breadcrumbs::for('student.exam-types.show', function ($trail, $id) {
    $trail->parent('student.exam-types');
    $trail->push('Show', route('student.exam-types.show', $id));
});

// Dashboard > Exam Type > Edit
Breadcrumbs::for('student.exam-types.edit', function ($trail, $id) {
    $trail->parent('student.exam-types');
    $trail->push('Edit', route('student.exam-types.edit', $id));
});

// Dashboard > Exam
Breadcrumbs::for('student.exams', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Exam', route('student.exams.index'));
});

// Dashboard > Exam > Create
Breadcrumbs::for('student.exams.create', function ($trail) {
    $trail->parent('student.exams');
    $trail->push('Create', route('student.exams.create'));
});

// Dashboard > Exam > Show
Breadcrumbs::for('student.exams.show', function ($trail, $id) {
    $trail->parent('student.exams');
    $trail->push('Show', route('student.exams.show', $id));
});

// Dashboard > Exam > Edit
Breadcrumbs::for('student.exams.edit', function ($trail, $id) {
    $trail->parent('student.exams');
    $trail->push('Edit', route('student.exams.edit', $id));
});


// Dashboard > Result
Breadcrumbs::for('student.results', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Result', route('student.results.index'));
});

// Dashboard > Result > Create
Breadcrumbs::for('student.results.create', function ($trail) {
    $trail->parent('student.results');
    $trail->push('Create', route('student.results.create'));
});

// Dashboard > Result > Show
Breadcrumbs::for('student.results.show', function ($trail, $id) {
    $trail->parent('student.results');
    $trail->push('Show', route('student.results.show', $id));
});

// Dashboard > Result > Edit
Breadcrumbs::for('student.results.edit', function ($trail, $id) {
    $trail->parent('student.results');
    $trail->push('Edit', route('student.results.edit', $id));
});

// Dashboard > Attendence
Breadcrumbs::for('student.attendences', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Attendence', route('student.attendences.index'));
});


// Dashboard > Course Fee
Breadcrumbs::for('student.course-fees', function ($trail) {
    $trail->parent('student.dashboard');
    $trail->push('Course Fee', route('student.course-fees.index'));
});

// Dashboard > Course Fee > Create
Breadcrumbs::for('student.course-fees.create', function ($trail) {
    $trail->parent('student.course-fees');
    $trail->push('Create', route('student.course-fees.create'));
});

// Dashboard > Course Fee > Show
Breadcrumbs::for('student.course-fees.show', function ($trail, $id) {
    $trail->parent('student.course-fees');
    $trail->push('Show', route('student.course-fees.show', $id));
});

// Dashboard > Course Fee > Edit
Breadcrumbs::for('student.course-fees.edit', function ($trail, $id) {
    $trail->parent('student.course-fees');
    $trail->push('Edit', route('student.course-fees.edit', $id));
});


/* -------------------------------------------------------------------------- */
/*                           Guardian Breadcrumb Start                         */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('guardian.dashboard', function ($trail) {
    $trail->push('Dashboard', route('guardian.dashboard'));
});

// Profile
Breadcrumbs::for('guardian.profile', function ($trail) {
    $trail->push('Profile', route('guardian.profile'));
});

// Dashboard > Teacher
Breadcrumbs::for('guardian.teachers', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Teacher', route('guardian.teachers.index'));
});

// Dashboard > Teacher > Create
Breadcrumbs::for('guardian.teachers.create', function ($trail) {
    $trail->parent('guardian.teachers');
    $trail->push('Create', route('guardian.teachers.create'));
});

// Dashboard > Teacher > Show
Breadcrumbs::for('guardian.teachers.show', function ($trail, $id) {
    $trail->parent('guardian.teachers');
    $trail->push('Show', route('guardian.teachers.show', $id));
});


// Dashboard > Teacher > Edit
Breadcrumbs::for('guardian.teachers.edit', function ($trail, $id) {
    $trail->parent('guardian.teachers');
    $trail->push('Edit', route('guardian.teachers.edit', $id));
});

// Dashboard > Student
Breadcrumbs::for('guardian.students', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Student', route('guardian.students.index'));
});

// Dashboard > Student > Create
Breadcrumbs::for('guardian.students.create', function ($trail) {
    $trail->parent('guardian.students');
    $trail->push('Create', route('guardian.students.create'));
});

// Dashboard > Student > Show
Breadcrumbs::for('guardian.students.show', function ($trail, $id) {
    $trail->parent('guardian.students');
    $trail->push('Show', route('guardian.students.show', $id));
});

// Dashboard > Student > Edit
Breadcrumbs::for('guardian.students.edit', function ($trail, $id) {
    $trail->parent('guardian.students');
    $trail->push('Edit', route('guardian.students.edit', $id));
});

// Dashboard > Course
Breadcrumbs::for('guardian.courses', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Course', route('guardian.courses.index'));
});

// Dashboard > Course > Create
Breadcrumbs::for('guardian.courses.create', function ($trail) {
    $trail->parent('guardian.courses');
    $trail->push('Create', route('guardian.courses.create'));
});

// Dashboard > Course > Show
Breadcrumbs::for('guardian.courses.show', function ($trail, $id) {
    $trail->parent('guardian.courses');
    $trail->push('Show', route('guardian.courses.show', $id));
});

// Dashboard > Course > Edit
Breadcrumbs::for('guardian.courses.edit', function ($trail, $id) {
    $trail->parent('guardian.courses');
    $trail->push('Edit', route('guardian.courses.edit', $id));
});


// Dashboard > Enroll Course
Breadcrumbs::for('guardian.enroll-courses', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Enroll Course', route('guardian.enroll-courses.index'));
});

// Dashboard > Enroll Course > Create
Breadcrumbs::for('guardian.enroll-courses.create', function ($trail) {
    $trail->parent('guardian.enroll-courses');
    $trail->push('Create', route('guardian.enroll-courses.create'));
});

// Dashboard > Enroll Course > Show
Breadcrumbs::for('guardian.enroll-courses.show', function ($trail, $student) {
    $trail->parent('guardian.enroll-courses');
    $trail->push('Show', route('guardian.enroll-courses.show', $student));
});

// Dashboard > Enroll Course > Edit
Breadcrumbs::for('guardian.enroll-courses.edit', function ($trail, $student) {
    $trail->parent('guardian.enroll-courses');
    $trail->push('Edit', route('guardian.enroll-courses.edit', $student));
});

// Dashboard > Exam Type
Breadcrumbs::for('guardian.exam-types', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Exam Type', route('guardian.exam-types.index'));
});

// Dashboard > Exam Type > Create
Breadcrumbs::for('guardian.exam-types.create', function ($trail) {
    $trail->parent('guardian.exam-types');
    $trail->push('Create', route('guardian.exam-types.create'));
});

// Dashboard > Exam Type > Show
Breadcrumbs::for('guardian.exam-types.show', function ($trail, $id) {
    $trail->parent('guardian.exam-types');
    $trail->push('Show', route('guardian.exam-types.show', $id));
});

// Dashboard > Exam Type > Edit
Breadcrumbs::for('guardian.exam-types.edit', function ($trail, $id) {
    $trail->parent('guardian.exam-types');
    $trail->push('Edit', route('guardian.exam-types.edit', $id));
});

// Dashboard > Exam
Breadcrumbs::for('guardian.exams', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Exam', route('guardian.exams.index'));
});

// Dashboard > Exam > Create
Breadcrumbs::for('guardian.exams.create', function ($trail) {
    $trail->parent('guardian.exams');
    $trail->push('Create', route('guardian.exams.create'));
});

// Dashboard > Exam > Show
Breadcrumbs::for('guardian.exams.show', function ($trail, $id) {
    $trail->parent('guardian.exams');
    $trail->push('Show', route('guardian.exams.show', $id));
});

// Dashboard > Exam > Edit
Breadcrumbs::for('guardian.exams.edit', function ($trail, $id) {
    $trail->parent('guardian.exams');
    $trail->push('Edit', route('guardian.exams.edit', $id));
});


// Dashboard > Result
Breadcrumbs::for('guardian.results', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Result', route('guardian.results.index'));
});

// Dashboard > Result > Create
Breadcrumbs::for('guardian.results.create', function ($trail) {
    $trail->parent('guardian.results');
    $trail->push('Create', route('guardian.results.create'));
});

// Dashboard > Result > Show
Breadcrumbs::for('guardian.results.show', function ($trail, $id) {
    $trail->parent('guardian.results');
    $trail->push('Show', route('guardian.results.show', $id));
});

// Dashboard > Result > Edit
Breadcrumbs::for('guardian.results.edit', function ($trail, $id) {
    $trail->parent('guardian.results');
    $trail->push('Edit', route('guardian.results.edit', $id));
});

// Dashboard > Attendence
Breadcrumbs::for('guardian.attendences', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Attendence', route('guardian.attendences.index'));
});


// Dashboard > Course Fee
Breadcrumbs::for('guardian.course-fees', function ($trail) {
    $trail->parent('guardian.dashboard');
    $trail->push('Course Fee', route('guardian.course-fees.index'));
});

// Dashboard > Course Fee > Create
Breadcrumbs::for('guardian.course-fees.create', function ($trail) {
    $trail->parent('guardian.course-fees');
    $trail->push('Create', route('guardian.course-fees.create'));
});

// Dashboard > Course Fee > Show
Breadcrumbs::for('guardian.course-fees.show', function ($trail, $id) {
    $trail->parent('guardian.course-fees');
    $trail->push('Show', route('guardian.course-fees.show', $id));
});

// Dashboard > Course Fee > Edit
Breadcrumbs::for('guardian.course-fees.edit', function ($trail, $id) {
    $trail->parent('guardian.course-fees');
    $trail->push('Edit', route('guardian.course-fees.edit', $id));
});
