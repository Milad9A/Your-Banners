<?php

Breadcrumbs::for('admin.auth.company.index', function ($trail) {
    $trail->push(__('labels.backend.access.companies.management'), route('admin.auth.company.index'));
});

Breadcrumbs::for('admin.auth.company.create', function ($trail) {
    $trail->push(__('labels.backend.access.companies.create'), route('admin.auth.company.create'));
});

Breadcrumbs::for('admin.auth.company.edit', function ($trail, $id) {
    $company = \App\Company::findOrFail($id);
    $trail->push(__('labels.backend.access.companies.create'), route('admin.auth.company.edit', compact('company')));
});
