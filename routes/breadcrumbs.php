<?php

/* -------------------------------------------------------------------------- */
/*                           Teacher Breadcrumb Start                           */
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
