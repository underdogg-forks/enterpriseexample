<?php

Breadcrumbs::register('frontend.relations.relations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.relations.management'), route('frontend.relations.relations.index'));
});

Breadcrumbs::register('admin.relations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.relations.relations.index');
    $breadcrumbs->push(trans('menus.backend.relations.create'), route('admin.relations.create'));
});

Breadcrumbs::register('admin.relations.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('frontend.relations.relations.index');
    $breadcrumbs->push(trans('menus.backend.relations.edit'), route('admin.relations.edit', $id));
});
