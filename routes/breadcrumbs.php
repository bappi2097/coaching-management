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
    $trail->parent('officer.dashboard');
    $trail->push('Create', route('officer.teachers.create'));
});

// Dashboard > Teacher > Show
Breadcrumbs::for('officer.teachers.show', function ($trail, $id) {
    $trail->parent('officer.dashboard');
    $trail->push('Show', route('officer.teachers.show', $id));
});


// Dashboard > Teacher > Edit
Breadcrumbs::for('officer.teachers.edit', function ($trail, $id) {
    $trail->parent('officer.dashboard');
    $trail->push('Edit', route('officer.teachers.edit', $id));
});

// Dashboard > Student
Breadcrumbs::for('officer.students', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Student', route('officer.students.index'));
});

// Dashboard > Student > Create
Breadcrumbs::for('officer.students.create', function ($trail) {
    $trail->parent('officer.dashboard');
    $trail->push('Create', route('officer.students.create'));
});

// Dashboard > Student > Show
Breadcrumbs::for('officer.students.show', function ($trail, $id) {
    $trail->parent('officer.dashboard');
    $trail->push('Show', route('officer.students.show', $id));
});


// Dashboard > Student > Edit
Breadcrumbs::for('officer.students.edit', function ($trail, $id) {
    $trail->parent('officer.dashboard');
    $trail->push('Edit', route('officer.students.edit', $id));
});
