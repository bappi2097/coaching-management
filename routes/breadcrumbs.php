<?php

/* -------------------------------------------------------------------------- */
/*                           Officer Breadcrumb Start                           */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('officer.dashboard', function ($trail) {
    $trail->push('Dashboard', route('officer.dashboard'));
});

// Profile
Breadcrumbs::for('officer.profile', function ($trail) {
    $trail->push('Profile', route('officer.profile'));
});

// // Dashboard > Officer
// Breadcrumbs::for('officer.officer', function ($trail) {
//     $trail->parent('officer.dashboard');
//     $trail->push('Officer', route('officer.users.officer.index'));
// });

// // Dashboard > Officer > Create
// Breadcrumbs::for('officer.officer.create', function ($trail) {
//     $trail->parent('officer.dashboard');
//     $trail->push('Create', route('officer.users.officer.create'));
// });

// // Dashboard > Officer > Show
// Breadcrumbs::for('officer.officer.show', function ($trail, $id) {
//     $trail->parent('officer.dashboard');
//     $trail->push('Show', route('officer.users.officer.show', $id));
// });


// // Dashboard > Officer > Edit
// Breadcrumbs::for('officer.officer.edit', function ($trail, $id) {
//     $trail->parent('officer.dashboard');
//     $trail->push('Edit', route('officer.users.officer.edit', $id));
// });
